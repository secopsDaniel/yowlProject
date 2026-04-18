<?php

namespace App\Http\Controllers;

use App\Services\PostFetcherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostC extends Controller
{
    public function __construct(
        private PostFetcherService $fetcher,
    ) {}

    public function fetch(Request $request): JsonResponse
    {
        $request->validate([
            'url' => ['required', 'url'],
        ]);

        try {
            $post = $this->fetcher->fetchOne($request->input('url'));
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        } catch (\RuntimeException $e) {
            return response()->json(['error' => $e->getMessage()], 502);
        }

        return response()->json(['data' => $post]);
    }
}
