<!DOCTYPE html>
@php
    $direction = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
@endphp
<html lang="en" dir="{{ $direction }}" class="@if (mode()) dark @endif">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="{{ app_setting()->favicon }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="google-site-verification" content="F_Q9nuMHlFCzzIgz2Ow-5bJM2ZVqoAYYIIVDwbsjOTI" />

    {!! SEOTools::generate() !!}

    <!-- Link Swiper's CSS -->
    @php
        $swiperCssUrl = \App\Helpers\ThemeHelper::asset('plugins/swiper/css/swiper-bundle.min.css');
    @endphp
    <link rel="stylesheet" href="{{ $swiperCssUrl }}" media="print" onload="this.media='all'" />
    <noscript><link rel="stylesheet" href="{{ $swiperCssUrl }}" /></noscript>

    {{-- Load Google Fonts --}}
    @foreach ($loadedFonts as $font)
        <link href="{{ $font->source_url }}&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
        <noscript><link href="{{ $font->source_url }}&display=swap" rel="stylesheet"></noscript>
    @endforeach

    {{-- Set CSS Variables --}}
    <style>
        :root {
            @if ($principalFont)
                --font-principal: {!! $principalFont->font_family !!};
            @endif

            @if ($alternateFont)
                --font-alternate: {!! $alternateFont->font_family !!};
            @endif

            @if ($supplementaryFont)
                --font-supplementary: {!! $supplementaryFont->font_family !!};
            @endif
        }

        body {
            font-family: var(--font-principal) !important;
        }

        h1,
        h2,
        h3,
        h4,
        a {
            font-family: var(--font-alternate) !important;
        }

        p {
            font-family: var(--font-supplementary) !important;
        }

        .line-height-25 {
            line-height: 2.5rem !important;
        }
    </style>

    <!-- Tailwind css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('plugins-css')
    @stack('custom-css')

    <!-- Google Analytics (GA4) -->
    @if (app()->environment('production') && isset($metaInfo->google_analytics) && $metaInfo->google_analytics)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $metaInfo->google_analytics }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ $metaInfo->google_analytics }}');
        </script>
    @endif


    {{-- ── Script Manager: Head Scripts ─────────────────────────────────── --}}
    @php
        $scriptSettings = \Modules\Setting\Entities\Setting::find(121);
        $sm = $scriptSettings ? json_decode($scriptSettings->details) : null;
    @endphp
    @if($sm)
        {{-- Google Search Console verification --}}
        @if(!empty($sm->search_console_meta))
            {!! $sm->search_console_meta !!}
        @endif

        {{-- Google Analytics 4 (GA4) --}}
        @if(!empty($sm->ga4_id))
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ $sm->ga4_id }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', '{{ $sm->ga4_id }}');
            </script>
        @endif

        {{-- Google Tag Manager (GTM) - Head snippet --}}
        @if(!empty($sm->gtm_id))
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','{{ $sm->gtm_id }}');</script>
        @endif

        {{-- Meta (Facebook) Pixel --}}
        @if(!empty($sm->meta_pixel_id))
            <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $sm->meta_pixel_id }}');
            fbq('track', 'PageView');
            </script>
            <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ $sm->meta_pixel_id }}&ev=PageView&noscript=1"/></noscript>
        @endif

        {{-- Hotjar --}}
        @if(!empty($sm->hotjar_id))
            <script>
                (function(h,o,t,j,a,r){
                    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                    h._hjSettings={hjid:{{ $sm->hotjar_id }},hjsv:6};
                    a=o.getElementsByTagName('head')[0];
                    r=o.createElement('script');r.async=1;
                    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                    a.appendChild(r);
                })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
            </script>
        @endif

        {{-- Custom Head Scripts --}}
        @if(!empty($sm->custom_head_scripts))
            {!! $sm->custom_head_scripts !!}
        @endif
    @endif
    {{-- ── / Script Manager Head ──────────────────────────────────────── --}}
</head>
<input type="hidden" name="language" id="language" value="{{ app()->getLocale() }}">
<input type="hidden" name="direction" id="direction" value="{{ $direction }}">

<body class="min-h-screen relative"
    @if (!$themeSettings->is_default && $themeSettings->font_family) style="font-family: {{ $themeSettings->font_family }};" @endif>

    @include('themes.magazine.components.common.login')

    {{-- Menu section --}}
    @include('themes.magazine.layouts.header.top-menu')
    @include('themes.magazine.layouts.header.side-menu')
    @include ('themes.magazine.layouts.header.mobile-menu')

    <!-- Top Section -->
    @include('themes.magazine.layouts.header.top-section')

    {{ $slot }}

    <!-- Footer section -->
    @include('themes.magazine.layouts.footer')

    <!-- Cookies section -->
	@include('themes.magazine.components.common.cookies')

    <!-- Global Modal -->
    <div id="globalModal"
        class="fixed inset-0 flex items-center justify-center bg-black/75 z-50 opacity-0 pointer-events-none transition-opacity duration-300">
        <div id="globalModalContent">
            <!-- Close Button -->
            <button id="globalModalClose"
                class="p-2 text-white bg-red-600 hover:bg-red-800 rounded-full w-8 h-8 flex items-center justify-center absolute top-4 right-4 transition_3">
                <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
                        fill="currentColor" />
                </svg>
            </button>

            <!-- Dynamic Content Goes Here -->
            <div id="modalBody"></div>
        </div>
    </div>
    {{-- Btn scroll To Top --}}
    <button id="scrollToTopBtn" type="button" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="hidden bg-cyan-600 hover:bg-cyan-500 rounded-full w-10 h-10 flex justify-center items-center fixed bottom-4 right-2 hover:-translate-y-1 z-50 transition-all duration-300 ease-in">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="#fff"
                d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
        </svg>
    </button>
    {{-- scrollToTopBtn --}}
    <script>
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                scrollToTopBtn.classList.remove('hidden');
            } else {
                scrollToTopBtn.classList.add('hidden');
            }
        });

        const subscribeUrl = "{{ route('subscribe.ajax') }}";
        const categoryLoadMoreUrl = "{{ route('load.more.category.news') }}";
        const videoLoadMoreUrl = "{{ route('load.more.video.news') }}";
        const ajaxPollVoteUrl = "{{ route('ajax.poll.vote') }}";
        const ajaxPollResultUrl = "{{ route('ajax.poll.result', ['poll' => '__POLL_ID__']) }}";
    </script>
    <script defer src="{{ asset(path: 'website/js/jquery-3.7.1.min.js') }}"></script>

    <script defer src="{{ \App\Helpers\ThemeHelper::asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>
    {{-- <script defer src="{{ \App\Helpers\ThemeHelper::asset('plugins/youtube-api/youtube-iframe-api.js') }}"></script> --}}

    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/website.js?v=5') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/global-tab.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/dark-light.js?v=2') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/user-profile.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/user-profile-setting.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/global-modal.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/mega-menu-inner-tab.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/mobile-side-menu.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/top-menu.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/video-play.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/login-modal.js?v=5') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/subscribe-form.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/category-view.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/poll-vote-result.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/youtube-play-alpinejs.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/language-switcher-sm.js') }}"></script>

    <script defer src="{{ asset('website/js/copy-url.js') }}"></script>
    <script defer src="{{ asset('website/js/customized-font-size.js?v=5') }}"></script>

    @stack('plugins-js')
    @stack('custom-js')


    {{-- ── Script Manager: Body Scripts ────────────────────────────────── --}}
    @php
        if (!isset($sm)) {
            $scriptSettings2 = \Modules\Setting\Entities\Setting::find(121);
            $sm = $scriptSettings2 ? json_decode($scriptSettings2->details) : null;
        }
    @endphp
    @if($sm)
        {{-- GTM noscript --}}
        @if(!empty($sm->gtm_id))
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $sm->gtm_id }}"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        @endif

        {{-- Tawk.to live chat --}}
        @if(!empty($sm->tawkto_id))
            <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/{{ $sm->tawkto_id }}';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
            </script>
        @endif

        {{-- Custom Body Scripts --}}
        @if(!empty($sm->custom_body_scripts))
            {!! $sm->custom_body_scripts !!}
        @endif
    @endif
    {{-- ── / Script Manager Body ──────────────────────────────────────── --}}
</body>

</html>
