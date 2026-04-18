<?php

namespace App\Services;

class PostFetcherService
{
    // Sources supportées
    const SOURCE_INSTAGRAM = 'instagram';
    const SOURCE_TWITTER   = 'twitter';
    const SOURCE_FACEBOOK  = 'facebook';
    const SOURCE_TIKTOK    = 'tiktok';
    const SOURCE_REDDIT    = 'reddit';
    const SOURCE_LINKEDIN  = 'linkedin';

    public function __construct(
        private ApifyClient $client,
    ) {}

    /**
     * Point d'entrée principal.
     * Détecte la source depuis l'URL et récupère un seul post.
     */
    public function fetchOne(string $url): array
    {
        $source = $this->detectSource($url);

        return match ($source) {
            self::SOURCE_INSTAGRAM => $this->fetchInstagramPost($url),
            self::SOURCE_TWITTER   => $this->fetchTwitterPost($url),
            self::SOURCE_FACEBOOK  => $this->fetchFacebookPost($url),
            self::SOURCE_TIKTOK    => $this->fetchTiktokPost($url),
            self::SOURCE_REDDIT    => $this->fetchRedditPost($url),
            self::SOURCE_LINKEDIN  => $this->fetchLinkedinPost($url),
        };
    }

    // -------------------------------------------------------------------------
    // Détection de la source
    // -------------------------------------------------------------------------

    private function detectSource(string $url): string
    {
        $url = strtolower(trim($url));

        if (str_contains($url, 'instagram.com')) {
            return self::SOURCE_INSTAGRAM;
        }

        if (str_contains($url, 'twitter.com') || str_contains($url, 'x.com')) {
            return self::SOURCE_TWITTER;
        }

        if (str_contains($url, 'facebook.com') || str_contains($url, 'fb.com')) {
            return self::SOURCE_FACEBOOK;
        }

        if (str_contains($url, 'tiktok.com')) {
            return self::SOURCE_TIKTOK;
        }

        if (str_contains($url, 'reddit.com')) {
            return self::SOURCE_REDDIT;
        }

        if (str_contains($url, 'linkedin.com')) {
            return self::SOURCE_LINKEDIN;
        }

        throw new \InvalidArgumentException("Source non reconnue pour l'URL : {$url}");
    }

    // -------------------------------------------------------------------------
    // Actors
    // -------------------------------------------------------------------------

    private function fetchInstagramPost(string $url): array
    {
        $raw = $this->client->runActorAndGetFirstItem('apify/instagram-scraper', [
            'directUrls'   => [$url],
            'resultsLimit' => 1,
        ]);

        return [
            'source'    => self::SOURCE_INSTAGRAM,
            'author'    => $raw['ownerUsername'] ?? null,
            'text'      => $raw['caption'] ?? null,
            'likes'     => $raw['likesCount'] ?? null,
            'comments'  => $raw['commentsCount'] ?? null,
            'published' => $raw['timestamp'] ?? null,
            'url'       => $raw['url'] ?? $url,
            'raw'       => $raw,
        ];
    }

    private function fetchTwitterPost(string $url): array
    {
        $raw = $this->client->runActorAndGetFirstItem('apidojo/tweet-scraper', [
            'startUrls' => [$url],
            'maxItems'  => 1,
        ]);

        return [
            'source'    => self::SOURCE_TWITTER,
            'author'    => $raw['author']['userName'] ?? null,
            'text'      => $raw['text'] ?? null,
            'likes'     => $raw['likeCount'] ?? null,
            'comments'  => $raw['replyCount'] ?? null,
            'published' => $raw['createdAt'] ?? null,
            'url'       => $raw['url'] ?? $url,
            'raw'       => $raw,
        ];
    }

    private function fetchFacebookPost(string $url): array
    {
        $raw = $this->client->runActorAndGetFirstItem('apify/facebook-scraper', [
            'startUrls' => [['url' => $url]],
            'maxPosts'  => 1,
        ]);

        return [
            'source'    => self::SOURCE_FACEBOOK,
            'author'    => $raw['pageName'] ?? null,
            'text'      => $raw['text'] ?? null,
            'likes'     => $raw['likes'] ?? null,
            'comments'  => $raw['comments'] ?? null,
            'published' => $raw['time'] ?? null,
            'url'       => $raw['url'] ?? $url,
            'raw'       => $raw,
        ];
    }

    private function fetchTiktokPost(string $url): array
    {
        $raw = $this->client->runActorAndGetFirstItem('clockworks/tiktok-scraper', [
            'postURLs'  => [$url],
            'maxItems'  => 1,
        ]);

        return [
            'source'    => self::SOURCE_TIKTOK,
            'author'    => $raw['authorMeta']['name'] ?? null,
            'text'      => $raw['text'] ?? null,
            'likes'     => $raw['diggCount'] ?? null,
            'comments'  => $raw['commentCount'] ?? null,
            'published' => isset($raw['createTime']) ? date('c', $raw['createTime']) : null,
            'url'       => $raw['webVideoUrl'] ?? $url,
            'raw'       => $raw,
        ];
    }

    private function fetchRedditPost(string $url): array
    {
        $raw = $this->client->runActorAndGetFirstItem('trudax/reddit-scraper', [
            'startUrls' => [['url' => $url]],
            'maxItems'  => 1,
        ]);

        return [
            'source'    => self::SOURCE_REDDIT,
            'author'    => $raw['author'] ?? null,
            'text'      => $raw['title'] . "\n\n" . ($raw['selftext'] ?? ''),
            'likes'     => $raw['score'] ?? null,
            'comments'  => $raw['num_comments'] ?? null,
            'published' => isset($raw['created_utc']) ? date('c', $raw['created_utc']) : null,
            'url'       => $raw['url'] ?? $url,
            'raw'       => $raw,
        ];
    }

    private function fetchLinkedinPost(string $url): array
    {
        $raw = $this->client->runActorAndGetFirstItem('bebity/linkedin-profile-scraper', [
            'profileUrls' => [$url],
            'maxPosts'    => 1,
        ]);

        return [
            'source'    => self::SOURCE_LINKEDIN,
            'author'    => $raw['authorName'] ?? null,
            'text'      => $raw['text'] ?? null,
            'likes'     => $raw['likeCount'] ?? null,
            'comments'  => $raw['commentsCount'] ?? null,
            'published' => $raw['postedAt'] ?? null,
            'url'       => $raw['postUrl'] ?? $url,
            'raw'       => $raw,
        ];
    }
}
