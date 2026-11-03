<?php

namespace Modules\News\Services;

use DOMDocument;
use DOMElement;
use DOMNode;

/**
 * Allow-list HTML sanitizer for AI generated article bodies.
 * Only simple structural tags are kept; every attribute is removed.
 */
class AiNewsHtmlSanitizer
{
    private const ALLOWED = [
        'p', 'h2', 'h3', 'ul', 'ol', 'li', 'strong', 'em', 'br',
        'table', 'thead', 'tbody', 'tr', 'th', 'td', 'blockquote',
    ];

    public function containsHtml(string $value): bool
    {
        return (bool) preg_match('/<\/?(p|h2|h3|ul|ol|li|table|blockquote)\b/i', $value);
    }

    /**
     * Plain text paragraphs (blank line separated) are converted to <p> tags,
     * HTML input is reduced to the allow-list.
     */
    public function toSafeHtml(string $value): string
    {
        $value = trim($value);
        if ($value === '') {
            return '';
        }

        if (! $this->containsHtml($value)) {
            return collect(preg_split('/\R{2,}/u', $value) ?: [])
                ->map(static fn ($paragraph) => trim($paragraph))
                ->filter()
                ->map(static fn ($paragraph) => '<p>' . e($paragraph) . '</p>')
                ->implode("\n");
        }

        return $this->sanitize($value);
    }

    public function sanitize(string $html): string
    {
        $previous = libxml_use_internal_errors(true);
        $document = new DOMDocument('1.0', 'UTF-8');
        $document->loadHTML(
            '<?xml encoding="UTF-8"><div id="ai-root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $root = $document->getElementById('ai-root');
        if (! $root) {
            return e(strip_tags($html));
        }

        $this->clean($root);

        $output = '';
        foreach ($root->childNodes as $child) {
            $output .= $document->saveHTML($child);
        }

        return trim($output);
    }

    private function clean(DOMNode $node): void
    {
        foreach (iterator_to_array($node->childNodes) as $child) {
            if ($child instanceof DOMElement) {
                $this->clean($child);

                $tag = strtolower($child->tagName);
                if (in_array($tag, ['script', 'style', 'iframe', 'object', 'embed'], true)) {
                    $node->removeChild($child);
                    continue;
                }

                if (! in_array($tag, self::ALLOWED, true)) {
                    // Unwrap unknown tags but keep their (already cleaned) content.
                    while ($child->firstChild) {
                        $node->insertBefore($child->firstChild, $child);
                    }
                    $node->removeChild($child);
                    continue;
                }

                foreach (iterator_to_array($child->attributes) as $attribute) {
                    $child->removeAttributeNode($attribute);
                }
            } elseif ($child->nodeType === XML_COMMENT_NODE) {
                $node->removeChild($child);
            }
        }
    }
}
