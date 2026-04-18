<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApifyClient
{
    private string $token;
    private string $baseUrl = 'https://api.apify.com/v2';

    public function __construct()
    {
        $this->token = config('services.apify.token');
    }

    /**
     * Lance un actor et attend le résultat .
     */
    public function runActorAndGetFirstItem(string $actorId, array $input): array
    {
        // run-sync-get-dataset-items = lance + attend + retourne les items direct
        $response = Http::timeout(60)
            ->post("{$this->baseUrl}/acts/{$actorId}/run-sync-get-dataset-items", [
                'token' => $this->token,
                ...$input,
            ]);

        if ($response->failed()) {
            Log::error('Apify actor failed', [
                'actor'  => $actorId,
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);
            throw new \RuntimeException("L'actor Apify a échoué : " . $response->status());
        }

        $items = $response->json();

        if (empty($items)) {
            throw new \RuntimeException("Aucun résultat retourné par l'actor.");
        }

        // On ne veut qu'un seul post
        return $items[0];
    }
}
