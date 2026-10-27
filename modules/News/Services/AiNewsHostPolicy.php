<?php

namespace Modules\News\Services;

use InvalidArgumentException;

class AiNewsHostPolicy
{
    public function assertAllowed(string $url): string
    {
        $parts = parse_url(trim($url));
        $host = strtolower(rtrim((string) ($parts['host'] ?? ''), '.'));

        if (
            ! $parts ||
            strtolower((string) ($parts['scheme'] ?? '')) !== 'https' ||
            $host === '' ||
            isset($parts['user']) ||
            isset($parts['pass']) ||
            (isset($parts['port']) && (int) $parts['port'] !== 443)
        ) {
            throw new InvalidArgumentException('Feed URL must be an HTTPS URL on the default port, without credentials.');
        }

        $allowedHosts = config('ai_news.allowed_feed_hosts', []);
        $hostAllowed = in_array($host, $allowedHosts, true);

        if (! $hostAllowed) {
            throw new InvalidArgumentException('Feed host is not allowlisted in AI_NEWS_ALLOWED_FEED_HOSTS.');
        }

        $addresses = filter_var($host, FILTER_VALIDATE_IP)
            ? [$host]
            : array_values(array_unique(array_merge(
                array_column(@dns_get_record($host, DNS_A) ?: [], 'ip'),
                array_column(@dns_get_record($host, DNS_AAAA) ?: [], 'ipv6')
            )));

        if ($addresses === []) {
            throw new InvalidArgumentException('Feed host did not resolve to a public IP address.');
        }

        foreach ($addresses as $address) {
            if (! filter_var($address, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                throw new InvalidArgumentException('Feed host resolves to a private or reserved IP address.');
            }
        }

        return $url;
    }
}
