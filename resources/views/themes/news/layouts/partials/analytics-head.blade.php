{{-- ── Analytics & third-party tags (head) ─────────────────────────────────
     Performance: only tiny inline stubs run during page load. Each stub queues
     calls (dataLayer / fbq / _hjSettings / Tawk_API), so no events are lost.
     The vendor scripts themselves are injected by the loader below, after the
     first user interaction or 3 s after window load, whichever comes first.
     This keeps them off the critical rendering path (LCP / TBT). --}}
@php
    $scriptSettings = \Illuminate\Support\Facades\Cache::remember('setting_121', 300, fn () => \Modules\Setting\Entities\Setting::find(121));
    $sm = $scriptSettings ? json_decode($scriptSettings->details) : null;

    // De-duplicate GA4 IDs so the same property is never configured twice.
    $gaIds = array_values(array_unique(array_filter([$gaTrackingId ?? null, $sm->ga4_id ?? null])));

    $deferredScripts = [];
    foreach ($gaIds as $gaId) {
        $deferredScripts[] = 'https://www.googletagmanager.com/gtag/js?id=' . urlencode($gaId);
    }
    if (!empty($sm->gtm_id ?? null)) {
        $deferredScripts[] = 'https://www.googletagmanager.com/gtm.js?id=' . urlencode($sm->gtm_id);
    }
    if (!empty($sm->meta_pixel_id ?? null)) {
        $deferredScripts[] = 'https://connect.facebook.net/en_US/fbevents.js';
    }
    if (!empty($sm->hotjar_id ?? null)) {
        $deferredScripts[] = 'https://static.hotjar.com/c/hotjar-' . (int) $sm->hotjar_id . '.js?sv=6';
    }
    if (!empty($sm->tawkto_id ?? null)) {
        // Tawk IDs have the form "propertyId/widgetId"; the slash must stay literal.
        $deferredScripts[] = 'https://embed.tawk.to/' . $sm->tawkto_id;
    }
@endphp

{{-- Inline stubs (queue only, no network) --}}
@if (!empty($gaIds))
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        @foreach ($gaIds as $gaId)
            gtag('config', @json($gaId));
        @endforeach
    </script>
@endif

@if (!empty($sm->gtm_id ?? null))
    <script>
        window.dataLayer = window.dataLayer || [];
        dataLayer.push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
    </script>
@endif

@if (!empty($sm->meta_pixel_id ?? null))
    <script>
        (function (f) {
            if (f.fbq) return;
            var n = f.fbq = function () { n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments); };
            if (!f._fbq) f._fbq = n;
            n.push = n; n.loaded = true; n.version = '2.0'; n.queue = [];
        })(window);
        fbq('init', @json($sm->meta_pixel_id));
        fbq('track', 'PageView');
    </script>
@endif

@if (!empty($sm->hotjar_id ?? null))
    <script>
        (function (h) {
            h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments); };
            h._hjSettings = { hjid: {{ (int) $sm->hotjar_id }}, hjsv: 6 };
        })(window);
    </script>
@endif

@if (!empty($sm->tawkto_id ?? null))
    <script>
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    </script>
@endif

{{-- Loader: injects the deferred vendor scripts on first interaction, or after load + 3 s --}}
@if (!empty($deferredScripts))
    <script>
        (function () {
            var srcs = @json($deferredScripts);
            var loaded = false;
            var opts = { passive: true, once: true };
            var events = ['pointerdown', 'keydown', 'touchstart', 'scroll'];

            function load() {
                if (loaded) return;
                loaded = true;
                events.forEach(function (t) { window.removeEventListener(t, load, opts); });
                srcs.forEach(function (src) {
                    var s = document.createElement('script');
                    s.async = true;
                    s.src = src;
                    if (src.indexOf('tawk.to') !== -1) {
                        s.charset = 'UTF-8';
                        s.setAttribute('crossorigin', '*');
                    }
                    document.head.appendChild(s);
                });
            }

            events.forEach(function (t) { window.addEventListener(t, load, opts); });
            if (document.readyState === 'complete') {
                setTimeout(load, 3000);
            } else {
                window.addEventListener('load', function () { setTimeout(load, 3000); });
            }
        })();
    </script>
@endif

{{-- Google Search Console verification --}}
@if (!empty($sm->search_console_meta ?? null))
    {!! $sm->search_console_meta !!}
@endif

{{-- Custom head scripts (set in admin settings; kept inline as before) --}}
@if (!empty($sm->custom_head_scripts ?? null))
    {!! $sm->custom_head_scripts !!}
@endif
