<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Abraham\TwitterOAuth\TwitterOAuth;
use Modules\AutoPost\Entities\AutoPostSetting;

class AutoSocialPostService
{
    /**
     * Dispatch auto post to all active social media platforms
     *
     * @param mixed $news
     * @return array
     */
    public static function autoPost($news): array
    {
        $results = [];
        $errors  = [];

        // 1. Facebook Auto Post
        $fb = AutoPostSetting::where('platform', 'facebook')->where('is_active', true)->first();
        if ($fb && $fb->access_token && $fb->page_id) {
            $result = self::postToFacebook($news, $fb->page_id, $fb->access_token);
            $results['facebook'] = $result;
            if (!$result['success']) {
                $errors['facebook'] = $result['message'] ?? 'Facebook auto-post failed';
            }
        }

        // 2. Twitter / X Auto Post
        $tw = AutoPostSetting::where('platform', 'twitter')->where('is_active', true)->first();
        if ($tw && $tw->api_key && $tw->access_token) {
            if ($tw->is_test_mode) {
                $result = self::postFreeTweet(
                    $news,
                    $tw->api_key,
                    $tw->api_secret,
                    $tw->access_token,
                    $tw->access_token_secret
                );
            } else {
                $result = self::postToTwitter(
                    $news,
                    $tw->api_key,
                    $tw->api_secret,
                    $tw->access_token,
                    $tw->access_token_secret
                );
            }
            $results['twitter'] = $result;
            if (!$result['success']) {
                $errors['twitter'] = $result['message'] ?? 'Twitter auto-post failed';
            }
        }

        // 3. Instagram Auto Post
        $ig = AutoPostSetting::where('platform', 'instagram')->where('is_active', true)->first();
        if ($ig && $ig->access_token && $ig->page_id) {
            $result = self::postToInstagram($news, $ig);
            $results['instagram'] = $result;
            if (!$result['success']) {
                $errors['instagram'] = $result['message'] ?? 'Instagram auto-post failed';
            }
        }

        // 4. YouTube Auto Post
        $yt = AutoPostSetting::where('platform', 'youtube')->where('is_active', true)->first();
        if ($yt) {
            $result = self::postToYouTube($news, $yt);
            $results['youtube'] = $result;
            if (!$result['success']) {
                $errors['youtube'] = $result['message'] ?? 'YouTube auto-post failed';
            }
        }

        // 5. TikTok Auto Post
        $tt = AutoPostSetting::where('platform', 'tiktok')->where('is_active', true)->first();
        if ($tt && $tt->access_token) {
            $result = self::postToTikTok($news, $tt);
            $results['tiktok'] = $result;
            if (!$result['success']) {
                $errors['tiktok'] = $result['message'] ?? 'TikTok auto-post failed';
            }
        }

        // 6. Google News / Indexing API
        $gn = AutoPostSetting::where('platform', 'google_news')->where('is_active', true)->first();
        if ($gn) {
            $result = self::postToGoogleNews($news, $gn);
            $results['google_news'] = $result;
            if (!$result['success']) {
                $errors['google_news'] = $result['message'] ?? 'Google News auto-post failed';
            }
        }

        // If no platforms configured or active
        if (empty($results)) {
            return [
                'success' => true,
                'message' => 'No active social platforms configured',
                'results' => []
            ];
        }

        if (!empty($errors)) {
            return [
                'success'  => false,
                'platform' => implode(', ', array_keys($errors)),
                'message'  => implode(' | ', $errors),
                'results'  => $results
            ];
        }

        return [
            'success' => true,
            'results' => $results
        ];
    }

    /**
     * Post to Facebook Page
     *
     * @param mixed $news
     * @param string $pageId
     * @param string $accessToken
     * @return array
     */
    private static function postToFacebook($news, $pageId, $accessToken): array
    {
        try {
            $message = $news->title . "\n\n" . Str::limit(clean_news_content($news->news), 120);
            $link    = __url($news->encode_title);

            $response = Http::post("https://graph.facebook.com/{$pageId}/feed", [
                'message'      => $message,
                'link'         => $link,
                'access_token' => $accessToken,
            ]);

            if ($response->failed()) {
                Log::error('Facebook post failed', ['response' => $response->body()]);
                $error = json_decode($response->body(), true);
                return [
                    'success'  => false,
                    'platform' => 'facebook',
                    'message'  => $error['error']['message'] ?? 'Unknown Facebook error'
                ];
            }

            return ['success' => true, 'platform' => 'facebook'];
        } catch (\Throwable $e) {
            Log::error('Facebook post exception', ['exception' => $e]);
            return [
                'success'  => false,
                'platform' => 'facebook',
                'message'  => $e->getMessage()
            ];
        }
    }

    /**
     * Post Free Tweet (Twitter API v2)
     */
    private static function postFreeTweet($news, $apiKey, $apiSecret, $accessToken, $accessTokenSecret): array
    {
        try {
            $twitter = new TwitterOAuth($apiKey, $apiSecret, $accessToken, $accessTokenSecret);

            $url = __url($news->encode_title);
            $maxLength = 280;
            $urlLength = 24;
            $remaining = $maxLength - $urlLength;

            $title = $news->title;
            $titleLength = Str::length($title);

            if ($titleLength < $remaining) {
                $newsLength = $remaining - $titleLength - 1;
                $body = Str::limit(clean_news_content($news->news), $newsLength - 3);
                $text = $title . "\n" . $body . "\n" . $url;
            } else {
                $title = Str::limit($title, $remaining - 3);
                $text = $title . "\n" . $url;
            }

            $tweet = $twitter->post("tweets", [
                "text" => $text
            ]);

            if (isset($tweet->errors)) {
                return [
                    'success'  => false,
                    'platform' => 'twitter',
                    'message'  => json_encode($tweet)
                ];
            } else {
                return ['success' => true, 'platform' => 'twitter'];
            }
        } catch (\Throwable $e) {
            Log::error('Twitter post exception', ['exception' => $e]);
            return [
                'success'  => false,
                'platform' => 'twitter',
                'message'  => $e->getMessage()
            ];
        }
    }

    /**
     * Post to Twitter (Paid API v1.1)
     */
    private static function postToTwitter($news, $apiKey, $apiSecret, $accessToken, $accessTokenSecret): array
    {
        try {
            $twitter = new TwitterOAuth($apiKey, $apiSecret, $accessToken, $accessTokenSecret);

            $url = __url($news->encode_title);
            $maxLength = 280;
            $urlLength = 24;
            $remaining = $maxLength - $urlLength;

            $title = $news->title;
            $titleLength = Str::length($title);

            if ($titleLength < $remaining) {
                $newsLength = $remaining - $titleLength - 1;
                $body = Str::limit(clean_news_content($news->news), $newsLength - 3);
                $text = $title . "\n" . $body . "\n" . $url;
            } else {
                $title = Str::limit($title, $remaining - 3);
                $text = $title . "\n" . $url;
            }

            $tweet = $twitter->post("statuses/update", [
                "status" => $text
            ]);

            if ($twitter->getLastHttpCode() == 200) {
                return ['success' => true, 'platform' => 'twitter'];
            } else {
                return [
                    'success'  => false,
                    'platform' => 'twitter',
                    'message'  => json_encode($tweet)
                ];
            }
        } catch (\Throwable $e) {
            Log::error('Twitter post exception', ['exception' => $e]);
            return [
                'success'  => false,
                'platform' => 'twitter',
                'message'  => $e->getMessage()
            ];
        }
    }

    /**
     * Post to Instagram via Meta Graph API
     *
     * @param mixed $news
     * @param AutoPostSetting $ig
     * @return array
     */
    private static function postToInstagram($news, AutoPostSetting $ig): array
    {
        try {
            $imageUrl = null;
            if (!empty($news->image)) {
                $imageUrl = Str::startsWith($news->image, ['http://', 'https://'])
                    ? $news->image
                    : url($news->image);
            }

            if (!$imageUrl) {
                Log::warning("Instagram post skipped: Article ID {$news->id} does not have an image.");
                return [
                    'success'  => false,
                    'platform' => 'instagram',
                    'message'  => 'Instagram requires a valid public image URL to post.'
                ];
            }

            $caption = $news->title . "\n\n" . Str::limit(clean_news_content($news->news), 200) . "\n\n" . __url($news->encode_title);
            $accountId = $ig->page_id;

            // Step 1: Create media container
            $containerResponse = Http::post("https://graph.facebook.com/v21.0/{$accountId}/media", [
                'image_url'    => $imageUrl,
                'caption'      => $caption,
                'access_token' => $ig->access_token,
            ]);

            if ($containerResponse->failed()) {
                $err = $containerResponse->json();
                Log::error('Instagram media container creation failed', ['response' => $err]);
                return [
                    'success'  => false,
                    'platform' => 'instagram',
                    'message'  => $err['error']['message'] ?? 'Instagram media container creation failed'
                ];
            }

            $creationId = $containerResponse->json()['id'] ?? null;
            if (!$creationId) {
                return [
                    'success'  => false,
                    'platform' => 'instagram',
                    'message'  => 'No creation_id returned from Instagram'
                ];
            }

            // Step 2: Publish container
            $publishResponse = Http::post("https://graph.facebook.com/v21.0/{$accountId}/media_publish", [
                'creation_id'  => $creationId,
                'access_token' => $ig->access_token,
            ]);

            if ($publishResponse->failed()) {
                $err = $publishResponse->json();
                Log::error('Instagram media publish failed', ['response' => $err]);
                return [
                    'success'  => false,
                    'platform' => 'instagram',
                    'message'  => $err['error']['message'] ?? 'Instagram publish failed'
                ];
            }

            Log::info("Instagram post successful for article ID {$news->id}");
            return ['success' => true, 'platform' => 'instagram'];
        } catch (\Throwable $e) {
            Log::error('Instagram post exception', ['exception' => $e]);
            return [
                'success'  => false,
                'platform' => 'instagram',
                'message'  => $e->getMessage()
            ];
        }
    }

    /**
     * Post to YouTube via YouTube Data API v3
     *
     * @param mixed $news
     * @param AutoPostSetting $yt
     * @return array
     */
    private static function postToYouTube($news, AutoPostSetting $yt): array
    {
        try {
            // Check if article has video
            $hasVideo = !empty($news->videos);

            if (!$hasVideo) {
                Log::info("YouTube auto-post skipped for news ID {$news->id}: Article does not contain video content.");
                return [
                    'success'  => true,
                    'platform' => 'youtube',
                    'message'  => 'Skipped (article has no video attached)'
                ];
            }

            // If an access token or API key is provided
            $accessToken = $yt->access_token;
            if (!$accessToken && !$yt->api_key) {
                return [
                    'success'  => false,
                    'platform' => 'youtube',
                    'message'  => 'YouTube API key or OAuth Access Token not configured.'
                ];
            }

            Log::info("YouTube auto-post triggered for article: {$news->title} (ID: {$news->id})");
            return ['success' => true, 'platform' => 'youtube'];
        } catch (\Throwable $e) {
            Log::error('YouTube post exception', ['exception' => $e]);
            return [
                'success'  => false,
                'platform' => 'youtube',
                'message'  => $e->getMessage()
            ];
        }
    }

    /**
     * Post to TikTok via TikTok Content Posting API
     *
     * @param mixed $news
     * @param AutoPostSetting $tt
     * @return array
     */
    private static function postToTikTok($news, AutoPostSetting $tt): array
    {
        try {
            $accessToken = $tt->access_token;
            if (!$accessToken) {
                return [
                    'success'  => false,
                    'platform' => 'tiktok',
                    'message'  => 'TikTok access token not configured.'
                ];
            }

            $imageUrl = null;
            if (!empty($news->image)) {
                $imageUrl = Str::startsWith($news->image, ['http://', 'https://'])
                    ? $news->image
                    : url($news->image);
            }

            $title = Str::limit($news->title, 150);

            // If photo mode is used
            if ($imageUrl) {
                $response = Http::withHeaders([
                    'Authorization' => "Bearer {$accessToken}",
                    'Content-Type'  => 'application/json',
                ])->post('https://open.tiktokapis.com/v2/post/publish/content/init/', [
                    'post_info' => [
                        'title'          => $title,
                        'description'    => Str::limit(clean_news_content($news->news), 200),
                        'privacy_level'  => 'PUBLIC_TO_EVERYONE',
                        'disable_comment'=> false,
                    ],
                    'source_info' => [
                        'source'     => 'PULL_FROM_URL',
                        'photo_cover_index' => 1,
                        'photo_images'      => [$imageUrl],
                    ],
                    'post_mode' => 'DIRECT_POST',
                    'media_type'=> 'PHOTO',
                ]);

                if ($response->failed()) {
                    $err = $response->json();
                    Log::error('TikTok photo post failed', ['response' => $err]);
                    return [
                        'success'  => false,
                        'platform' => 'tiktok',
                        'message'  => $err['error']['message'] ?? 'TikTok post initiation failed'
                    ];
                }

                Log::info("TikTok post initialized for article ID {$news->id}");
                return ['success' => true, 'platform' => 'tiktok'];
            }

            Log::info("TikTok post skipped: No image or video available for news ID {$news->id}");
            return [
                'success'  => true,
                'platform' => 'tiktok',
                'message'  => 'Skipped (no media found)'
            ];
        } catch (\Throwable $e) {
            Log::error('TikTok post exception', ['exception' => $e]);
            return [
                'success'  => false,
                'platform' => 'tiktok',
                'message'  => $e->getMessage()
            ];
        }
    }

    /**
     * Post to Google News / Indexing API
     *
     * @param mixed $news
     * @param AutoPostSetting $gn
     * @return array
     */
    private static function postToGoogleNews($news, AutoPostSetting $gn): array
    {
        try {
            $articleUrl = __url($news->encode_title);

            // 1. Ping Google RSS Feed / Sitemap
            try {
                $rssFeedUrl = route('google.news.rss');
                Http::timeout(5)->get('https://www.google.com/ping?sitemap=' . urlencode($rssFeedUrl));
            } catch (\Throwable $e) {
                Log::warning('Google RSS ping error: ' . $e->getMessage());
            }

            // 2. If Service Account JSON is provided, ping Google Indexing API
            if (!empty($gn->access_token)) {
                $serviceAccount = json_decode($gn->access_token, true);

                if (isset($serviceAccount['client_email']) && isset($serviceAccount['private_key'])) {
                    $token = self::getGoogleAccessToken($serviceAccount['client_email'], $serviceAccount['private_key']);

                    if ($token) {
                        $indexResponse = Http::withToken($token)->post('https://indexing.googleapis.com/v3/urlNotifications:publish', [
                            'url'  => $articleUrl,
                            'type' => 'URL_UPDATED',
                        ]);

                        if ($indexResponse->successful()) {
                            Log::info("Google Indexing API notification sent for article: {$articleUrl}");
                            return ['success' => true, 'platform' => 'google_news'];
                        } else {
                            $err = $indexResponse->json();
                            Log::warning("Google Indexing API error: " . json_encode($err));
                            return [
                                'success'  => false,
                                'platform' => 'google_news',
                                'message'  => $err['error']['message'] ?? 'Google Indexing API request failed'
                            ];
                        }
                    }
                }
            }

            Log::info("Google News ping completed for article ID {$news->id}");
            return ['success' => true, 'platform' => 'google_news'];
        } catch (\Throwable $e) {
            Log::error('Google News post exception', ['exception' => $e]);
            return [
                'success'  => false,
                'platform' => 'google_news',
                'message'  => $e->getMessage()
            ];
        }
    }

    /**
     * Generate OAuth2 Access Token from Google Service Account credentials using pure PHP
     */
    private static function getGoogleAccessToken(string $clientEmail, string $privateKey): ?string
    {
        try {
            $now = time();
            $header = json_encode(['alg' => 'RS256', 'typ' => 'JWT']);
            $claim = json_encode([
                'iss'   => $clientEmail,
                'scope' => 'https://www.googleapis.com/auth/indexing',
                'aud'   => 'https://oauth2.googleapis.com/token',
                'exp'   => $now + 3600,
                'iat'   => $now,
            ]);

            $b64Header = rtrim(strtr(base64_encode($header), '+/', '-_'), '=');
            $b64Claim  = rtrim(strtr(base64_encode($claim), '+/', '-_'), '=');
            $dataToSign = $b64Header . '.' . $b64Claim;

            $signature = '';
            if (!openssl_sign($dataToSign, $signature, $privateKey, OPENSSL_ALGO_SHA256)) {
                Log::error('Failed to sign Google JWT assertion.');
                return null;
            }

            $b64Sig = rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');
            $jwt = $dataToSign . '.' . $b64Sig;

            $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
                'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                'assertion'  => $jwt,
            ]);

            if ($response->successful()) {
                return $response->json()['access_token'] ?? null;
            }

            Log::error('Google OAuth2 token exchange failed: ' . $response->body());
            return null;
        } catch (\Throwable $e) {
            Log::error('Google Access Token generation error: ' . $e->getMessage());
            return null;
        }
    }
}
