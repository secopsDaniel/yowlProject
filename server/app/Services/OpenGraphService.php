<?php
namespace App\Services;

use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Http;

class OpenGraphService
{
    public static function fetchUrl(string $url)
    {
         $response = Http::withHeaders([
         'User-Agent' => 'Mozilla/5.0'
      ])->timeout(15)->get($url);

        if (!$response->successful()) {
            return null;
        }

         $html = $response->body();
         $crawler = new Crawler($html);

        return [
            'title' => self::getMetaData($crawler, 'og:title') ?? $crawler->filter('title')->text(''),
            'description' => self::getMetaData($crawler, 'og:description') ?? self::getMetaData($crawler, 'description') ,
            'image' =>self::getMetaData($crawler, 'og:image') ?? self::getMetaData($crawler, 'image'),
            'url' => $url
        ];
    }

    private static function getMetaData(Crawler $crawler, string $property)
    {
        try {
            $res = $crawler->filter("meta[property='$property']")->attr('content') ?? $crawler->filter("meta[name='$property']")->attr('content') ;
            return $res;
        } catch (\Exception $e) {
            return null;
        }
    }
}
