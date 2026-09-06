<!DOCTYPE html>
@php
    $direction = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
    $isMobileClientHint = request()->header('sec-ch-ua-mobile') === '?1';
    $gaTrackingId = null;
    if (app()->environment('production')) {
        $gaTrackingId = $metaInfo->google_analytics ?? 'G-2TEHY5NY81';
    }
@endphp
<html lang="en" dir="{{ $direction }}" class="@if (mode()) dark @endif">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="{{ app_setting()->favicon }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="google-site-verification" content="F_Q9nuMHlFCzzIgz2Ow-5bJM2ZVqoAYYIIVDwbsjOTI" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>

    {!! SEOTools::generate() !!}

    <!-- Link Swiper's CSS -->
    @php
        $swiperCssUrl = \App\Helpers\ThemeHelper::asset('plugins/swiper/css/swiper-bundle.min.css');
    @endphp
    <link rel="stylesheet" href="{{ $swiperCssUrl }}" media="print" onload="this.media='all'" />
    <noscript><link rel="stylesheet" href="{{ $swiperCssUrl }}" /></noscript>

    {{-- Load Google Fonts --}}
    @foreach ($loadedFonts as $font)
        <link href="{{ $font->source_url }}" rel="stylesheet" media="print" onload="this.media='all'">
        <noscript><link href="{{ $font->source_url }}" rel="stylesheet"></noscript>
    @endforeach

    {{-- Set CSS Variables --}}
    <style>
        :root {
            @if ($principalFont)
                --font-principal: {{ $principalFont->font_family }};

            @endif
            @if ($alternateFont)
                --font-alternate: {{ $alternateFont->font_family }};

            @endif
            @if ($supplementaryFont)
                --font-supplementary: {{ $supplementaryFont->font_family }};
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

        .news-ticker-container {
            padding: 15px;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .news-ticker {
            display: flex;
            background: linear-gradient(145deg, #2c2c2c, #1a1a1a);
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25),
                0 4px 10px rgba(0, 0, 0, 0.22),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            overflow: hidden;
            transform: perspective(500px) rotateX(1deg);
            border: 1px solid #404040;
        }

        .ticker-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(145deg, #ff3b30, #d70015);
            padding: 12px 20px;
            position: relative;
            min-width: 120px;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.3);
        }

        .ticker-label:after {
            content: '';
            position: absolute;
            right: -10px;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 10px solid #d70015;
        }

        .breaking-badge {
            font-weight: 800;
            font-size: 16px;
            letter-spacing: 0.5px;
            color: white;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .ticker-date {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.9);
            margin-top: 4px;
            font-weight: 500;
        }

        .ticker-content-container {
            flex: 1;
            overflow: hidden;
            position: relative;
        }

        .ticker-content {
            display: flex;
            animation: ticker-scroll 45s linear infinite;
            white-space: nowrap;
        }

        .ticker-content:hover {
            animation-play-state: paused;
        }

        .ticker-item {
            padding: 14px 20px;
            color: #fff;
            font-weight: 500;
            font-size: 15px;
            white-space: nowrap;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .ticker-item:after {
            content: "•";
            color: #ff3b30;
            margin: 0 20px;
            font-size: 18px;
            vertical-align: middle;
        }

        .ticker-item:last-child:after {
            display: none;
        }

        @keyframes ticker-scroll {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .news-ticker {
                flex-direction: row;
            }

            .ticker-label {
                flex-direction: row;
                justify-content: center;
                padding: 8px 12px;
                min-width: auto;
                flex-shrink: 0;
            }

            .ticker-label:after {
                display: none;
            }

            .ticker-content-container {
                min-width: 0;
            }

            .breaking-badge {
                margin-right: 0;
            }

            .ticker-date {
                margin-top: 0;
            }

            .ticker-item {
                padding: 10px 15px;
                font-size: 14px;
            }
        }

        /* News Container - Remove center alignment and set consistent height */
        .news-container {
            flex: 0 0 66.666%;
            display: grid;
            grid-template-columns: 0.5fr 0.75fr 1fr 1fr;
            padding-left: 0px;
            height: 120px;
        }

        /* Section Base Styles - Set consistent height */
        .news-section {
            padding: 16px;
            position: relative;
            overflow: hidden;
            height: 120px;
            display: flex;
            flex-direction: column;
        }

        .probash-category-section {
            border: 2px solid #B91C1C;
            border-right: none;
            border-top-left-radius: 16px;
            border-bottom-left-radius: 16px;
        }

        .news-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            transition: left 0.5s ease;
        }

        .news-section:hover::before {
            left: 100%;
        }

        /* Probash Janala Section */
        .probash-section {
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 110px;
        }

        .probash-logo {
            height: 90%;
            max-width: 100%;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        }

        /* News Article Section */
        .news-article {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .news-title {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 8px;
            line-height: 1.3;
            flex: 0 0 auto;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            max-height: 32px;
        }

        .news-image {
            flex: 1;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-height: 0;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
            object-position: top;
        }

        .news-section:hover .news-image img {
            transform: scale(1.05);
        }

        /* News Rotator */
        .news-rotator {
            position: relative;
            height: 100%;
            width: 100%;
        }

        .news-item {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease, visibility 0.5s ease;
            display: flex;
            flex-direction: column;
        }

        .news-item.active {
            opacity: 1;
            visibility: visible;
        }

        /* TV Section */
        .tv-section {
            color: white;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 4px;
            padding: 12px;
            height: 120px;
            border: 2px solid #B91C1C;
            border-right: none;
            border-left: none;
            padding: 0 !important;
        }

        .tv-frame {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            height: 100%;
        }

        .tv-frame-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            overflow: visible;
            transition: transform 0.3s ease-in-out;
        }

        .tv-frame-container:hover {
            transform: scale(1.05);
        }

        .tv-frame-bg {
            width: 80%;
            height: auto;
            object-fit: cover;
            position: relative;
            z-index: 10;
        }

        .tv-frame-video {
            position: absolute;
            top: 60%;
            left: 46%;
            transform: translate(-50%, -50%);
            width: 60%;
            height: 65%;
            object-fit: cover;
            border-radius: 2px;
            z-index: 10;
            transition: all 0.3s ease;
        }

        /* TV News Section - Updated styles */
        .tv-news {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding: 8px 0px;
        }

        .tv-news-title {
            font-size: 10px;
            font-weight: bold;
            line-height: 1.2;
            margin-bottom: 4px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            flex: 0 0 auto;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .tv-news-image {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3),
                0 2px 6px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            width: 80%;
            margin: 0 auto;
            min-height: 0;
            background: rgba(0, 0, 0, 0.1);
            padding: 4px;
        }

        .tv-news-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            margin: 0 auto;
            transition: transform 0.3s ease;
        }

        .tv-news-image:hover img {
            transform: scale(1.05);
        }

        .tv-news-image a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        /* Ami Sangbadik Section */
        .sangbadik-section {
            color: white;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 8px;
            align-items: stretch;
            height: 120px;
            border-left: none;
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        .sangbadik-logo {
            width: 95px;
            height: auto;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
            align-self: center;
        }

        .sangbadik-content {
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .sangbadik-title {
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 4px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
            flex: 0 0 auto;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .sangbadik-image {
            flex: 1;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            width: 100%;
            /* height: 72px; */
            margin: 0 auto;
            min-height: 0;
            border-radius: 4px;
        }

        .sangbadik-image img {
            width: 100%;
            /* height: 72px; */
            border-radius: 4px;
            object-fit: cover;
            object-position: top;
            transition: transform 0.3s ease;
        }

        .sangbadik-image img:hover {
            transform: scale(1.05);
        }

        /* Sangbadik News Rotator */
        .sangbadik-news-rotator {
            position: relative;
            height: 100%;
            width: 100%;
        }

        .sangbadik-news-item {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease, visibility 0.5s ease;
            display: flex;
            flex-direction: column;
        }

        .sangbadik-news-item.active {
            opacity: 1;
            visibility: visible;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .news-container {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 1fr 1fr;
                height: auto;
            }

            .news-section {
                height: 120px;
            }
        }

        @media (max-width: 768px) {
            .news-container {
                grid-template-columns: 1fr;
                gap: 16px;
                padding-left: 0;
                height: auto;
            }

            .news-section {
                height: 120px;
            }

            .news-title,
            .sangbadik-title {
                font-size: 9px;
            }

            .news-image,
            .sangbadik-image {
                height: 40px;
            }

            .news-image img,
            .sangbadik-image img {
                height: 100%;
            }
        }

        /* Additional CSS for thumbnail cycling */
        .thumbnail-rotator {
            position: relative;
            width: 100%;
            height: 90px;
            overflow: hidden;
            border-radius: 4px;
        }

        .thumbnail-image {
            transition: opacity 0.3s ease;
        }

        .thumbnail-image:hover {
            transform: scale(1.05);
        }
    </style>

    <!-- Tailwind css -->
    @vite(['resources/css/app.css'])
    @stack('plugins-css')
    @stack('custom-css')

    <!-- Google Analytics (GA4) -->
    @if ($gaTrackingId)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaTrackingId }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ $gaTrackingId }}');
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

    @include('themes.news.components.common.login')
    <!-- Top Section -->
    @include('themes.news.layouts.header.top-section')


    <!-- top banner section -->
    @if (!($isMobileClientHint ?? false))
    <section class="container hidden xl:flex justify-between items-center">
        <!-- Brand Logo - Takes 1/3 width -->
        <div class="flex-none justify-start">
            @php
                $desktopHeaderLogo = mode() ? app_setting()->footer_logo : app_setting()->logo;
            @endphp
            <a class="flex_center" href="{{ __url('/') }}">
                <img src="{{ $desktopHeaderLogo }}" alt="" class="w-auto"
                    fetchpriority="high"
                    decoding="async"
                    style="height: 4rem; transform: scale(1.35); transform-origin: left center;" />
            </a>
        </div>
        <!-- Ad Banner Section -->
        <figure class="w-[660px] h-20 object-cover overflow-hidden" style="margin-left: 20px">
            @if ($ad = get_advertisements(1, 1))
                {!! $ad->embed_code !!}
            @else
                <img class="w-full h-full object-cover" src="{{ asset('assets/top-header-banner.png') }}"
                    loading="lazy"
                    decoding="async"
                    alt="" />
            @endif
        </figure>
        <div class="probash-section">
            <a href="{{ __url('probashi-janala-news') }}" title="Probashi" style="height: 100px">
                <img src="{{ asset('assets/probash-janala.png') }}" alt="Probash Janala" class="probash-logo"
                    loading="lazy"
                    decoding="async">
            </a>
        </div>
        @if (Auth::guard('webuser')->check())
            <a type="button" href="{{ __url('account/probashi-news') }}" title="সর্বশেষ প্রবাস সংবাদ">
                <img src="{{ asset('assets/ami-sangbadik.png') }}" alt="Ami Sangbadik" class="sangbadik-logo"
                    loading="lazy"
                    decoding="async">
            </button>
        @else
            <button type="button" title="সর্বশেষ প্রবাস সংবাদ" id="openModalForProbashiNews">
                <img src="{{ asset('assets/ami-sangbadik.png') }}" alt="Ami Sangbadik" class="sangbadik-logo"
                    loading="lazy"
                    decoding="async">
            </button>
        @endif
        @php
            $podcast = get_last_podcast();
        @endphp
        @if ($podcast)
            <a href="{{ $podcast['youtube_url'] }}" target="_blank" rel="noopener noreferrer" 
               title="{{ $podcast['title'] }}" 
               class="flex items-center justify-center overflow-hidden hover:shadow-lg transition-shadow duration-300"
               style="height: 100px;">
                <img src="{{ $podcast['thumbnail'] }}" 
                     alt="{{ $podcast['title'] }}" 
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                     loading="lazy"
                     decoding="async">
            </a>
        @endif
        <div class="news-section sangbadik-section">
            <div class="sangbadik-content">
                @php
                    $sangbadikNewsItems = get_probashi_news(5);
                @endphp
                @if ($sangbadikNewsItems->isNotEmpty())
                    <div class="sangbadik-news-rotator">
                        @foreach ($sangbadikNewsItems as $index => $news)
                            <div class="sangbadik-news-item {{ $index === 0 ? 'active' : '' }}"
                                data-news-index="{{ $index }}">
                                @php
                                    /* <div class="sangbadik-title text-neutral-800 text-md font-bold line-clamp-2 dark:text-neutral-50 dark:hover:text-red-300 hover:text-brand-primary transition_3">
                                <a href="{{ __url($news->encode_title) }}">
                                    {{ Str::limit($news->title, 35) }}
                                </a>
                            </div> */
                                @endphp
                                <div class="sangbadik-image">
                                    @if ($news->thumbnails && $news->thumbnails->count() > 0)
                                        <!-- Thumbnail cycling container -->
                                        <div class="thumbnail-rotator" data-thumbnails='@json($news->thumbnails->pluck('thumbnail_path'))'>
                                            <a href="{{ __url($news->encode_title) }}">
                                                @foreach ($news->thumbnails as $thumbIndex => $thumbnail)
                                                    <img src="{{ asset('storage/' . $thumbnail->thumbnail_path) }}"
                                                        alt="Sangbadik News Thumbnail {{ $thumbIndex + 1 }}"
                                                        class="thumbnail-image {{ $thumbIndex === 0 ? 'active' : '' }}"
                                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 90px; border-radius: 4px; object-fit: cover; object-position: top; transition: opacity 0.3s ease; opacity: {{ $thumbIndex === 0 ? '1' : '0' }};">
                                                @endforeach
                                            </a>
                                        </div>
                                    @elseif($news->thumbnail_image)
                                        <a href="{{ __url($news->encode_title) }}">
                                            <img src="{{ asset('storage/' . $news->thumbnail_image) }}"
                                                loading="lazy"
                                                decoding="async"
                                                alt="Sangbadik News">
                                        </a>
                                    @else
                                        <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png"
                                            loading="lazy"
                                            decoding="async"
                                            alt="Default Report">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div
                        class="news-title text-neutral-800 text-md font-bold line-clamp-2 dark:text-neutral-50 dark:hover:text-red-300 hover:text-brand-primary transition_3">
                        No News Available
                    </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    {{-- Menu section --}}
    @if (!($isMobileClientHint ?? false))
        @include('themes.news.layouts.header.top-menu')
    @endif
    @include('themes.news.layouts.header.side-menu')
    @include('themes.news.layouts.header.mobile-menu')

    {{ $slot }}

    <!-- Footer section -->
    @include('themes.news.layouts.footer')

    <!-- Cookies section -->
    @include('themes.news.components.common.cookies')

    <!-- Global Modal -->
    <div id="globalModal"
        class="fixed inset-0 flex items-center justify-center bg-black/75 z-50 opacity-0 pointer-events-none transition-opacity duration-300">
        <div id="globalModalContent">
            <button id="globalModalClose"
                class="p-2 text-white bg-red-600 hover:bg-red-800 rounded-full w-8 h-8 flex items-center justify-center absolute top-4 right-4 transition_3">
                <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
                        fill="currentColor" />
                </svg>
            </button>
            <div id="modalBody"></div>
        </div>
    </div>

    {{-- Btn scroll To Top --}}
    <button id="scrollToTopBtn" type="button" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="hidden bg-red-600 hover:bg-brand-primary rounded-full w-10 h-10 flex justify-center items-center fixed bottom-4 right-2 hover:-translate-y-1 z-50 transition-all duration-300 ease-in">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="#fff"
                d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
        </svg>
    </button>

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
        const probashiLoadMoreUrl = "{{ route('load.more.probashi.news') }}";
        const videoLoadMoreUrl = "{{ route('load.more.video.news') }}";
        const ajaxPollVoteUrl = "{{ route('ajax.poll.vote') }}";
        const ajaxPollResultUrl = "{{ route('ajax.poll.result', ['poll' => '__POLL_ID__']) }}";

        // News Article and Sangbadik News Rotator
        document.addEventListener('DOMContentLoaded', function() {
            // Thumbnail cycling functionality
            function initThumbnailCycling() {
                const thumbnailRotators = document.querySelectorAll('.thumbnail-rotator');

                thumbnailRotators.forEach(rotator => {
                    if (rotator.dataset.cyclingInitialized === '1') {
                        return;
                    }

                    const thumbnailImages = rotator.querySelectorAll('.thumbnail-image');

                    if (thumbnailImages.length > 1) {
                        rotator.dataset.cyclingInitialized = '1';
                        let currentThumbnailIndex = 0;

                        const cycleThumbnails = () => {
                            // Hide current thumbnail
                            thumbnailImages[currentThumbnailIndex].style.opacity = '0';
                            thumbnailImages[currentThumbnailIndex].classList.remove('active');

                            // Move to next thumbnail
                            currentThumbnailIndex = (currentThumbnailIndex + 1) % thumbnailImages
                                .length;

                            // Show next thumbnail
                            thumbnailImages[currentThumbnailIndex].style.opacity = '1';
                            thumbnailImages[currentThumbnailIndex].classList.add('active');
                        };

                        // Keep thumbnail changes moderate to reduce main-thread churn.
                        setInterval(cycleThumbnails, 2500);
                    }
                });
            }

            // Initialize thumbnail cycling
            initThumbnailCycling();
            // News Article Rotator
            const newsRotator = document.querySelector('.news-rotator');
            if (newsRotator) {
                const newsItems = newsRotator.querySelectorAll('.news-item');
                if (newsItems.length > 0) {
                    let currentNewsIndex = 0;

                    function showNextNews() {
                        newsItems[currentNewsIndex].classList.remove('active');
                        currentNewsIndex = (currentNewsIndex + 1) % newsItems.length;
                        newsItems[currentNewsIndex].classList.add('active');
                    }

                    setInterval(showNextNews, 5000);
                    newsItems[0].classList.add('active');
                }
            }

            // Sangbadik News Rotator
            const sangbadikRotator = document.querySelector('.sangbadik-news-rotator');
            if (sangbadikRotator) {
                const sangbadikNewsItems = sangbadikRotator.querySelectorAll('.sangbadik-news-item');
                if (sangbadikNewsItems.length > 0) {
                    let currentSangbadikIndex = 0;

                    function showNextSangbadikNews() {
                        sangbadikNewsItems[currentSangbadikIndex].classList.remove('active');
                        currentSangbadikIndex = (currentSangbadikIndex + 1) % sangbadikNewsItems.length;
                        sangbadikNewsItems[currentSangbadikIndex].classList.add('active');

                        initThumbnailCycling();
                    }

                    setInterval(showNextSangbadikNews, 5000);
                    sangbadikNewsItems[0].classList.add('active');
                }
            }
        });
    </script>

    <script defer src="{{ \App\Helpers\ThemeHelper::asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/website.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/swiper/breaking-news.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/category-tab.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/global-tab.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/dark-light.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/user-profile.js') }}"></script>
    <script>
        window.storyGalleryScriptUrl = "{{ \App\Helpers\ThemeHelper::asset('js/story.js') }}";
    </script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/global-modal.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/mega-menu-inner-tab.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/mobile-side-menu.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/top-menu.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/video-play.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/login-modal.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/user-profile-setting.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/subscribe-form.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/category-view.js') }}"></script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/poll-vote-result.js') }}"></script>
    <script>
        (function () {
            function loadAlpineBundle() {
                if (!document.querySelector('[x-data]')) {
                    return;
                }

                const script = document.createElement('script');
                script.src = "{{ \App\Helpers\ThemeHelper::asset('js/youtube-play-alpinejs.js') }}";
                script.defer = true;
                document.body.appendChild(script);
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', loadAlpineBundle, { once: true });
                return;
            }

            loadAlpineBundle();
        })();
    </script>
    <script defer src="{{ \App\Helpers\ThemeHelper::asset('js/language-switcher-sm.js') }}"></script>
    <script defer src="{{ asset('website/js/copy-url.js') }}"></script>
    <script defer src="{{ asset('website/js/customized-font-size.js?v=5') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('tvFrameVideo');

            if (video && video.dataset.playlist) {
                let playlist = [];
                let newsData = [];
                try {
                    playlist = JSON.parse(video.dataset.playlist);
                    newsData = JSON.parse(video.dataset.newsdata || '[]');
                } catch (error) {
                    return;
                }

                if (!Array.isArray(playlist)) {
                    return;
                }

                playlist = playlist.filter((item) => typeof item === 'string' && item.trim() !== '');
                if (!playlist.length) {
                    return;
                }

                if (!Array.isArray(newsData)) {
                    newsData = [];
                }

                const titleElement = document.querySelector('.tv-news-title');

                let currentVideoIndex = 0;
                let userInteractionListenerAttached = false;
                let consecutiveLoadErrors = 0;
                const maxConsecutiveLoadErrors = Math.max(playlist.length * 2, 3);

                function buildVideoSource(videoPath) {
                    if (videoPath.startsWith('http')) {
                        return videoPath;
                    }

                    return `/storage/${videoPath.replace(/^\/+/, '')}`;
                }

                function updateTitle() {
                    if (!titleElement || !newsData[currentVideoIndex]) {
                        return;
                    }

                    titleElement.textContent = newsData[currentVideoIndex].title;
                    titleElement.setAttribute('href', newsData[currentVideoIndex].url);
                }

                function requestPlayOnUserInteraction() {
                    if (userInteractionListenerAttached) {
                        return;
                    }

                    userInteractionListenerAttached = true;
                    document.addEventListener('click', function() {
                        userInteractionListenerAttached = false;
                        video.play().catch(function() {});
                    }, {
                        once: true
                    });
                }

                function tryPlayCurrentVideo() {
                    video.play().catch(function() {
                        requestPlayOnUserInteraction();
                    });
                }

                function playNextVideo() {
                    currentVideoIndex = (currentVideoIndex + 1) % playlist.length;
                    const videoPath = playlist[currentVideoIndex];
                    video.src = buildVideoSource(videoPath);
                    updateTitle();
                    video.load();
                    tryPlayCurrentVideo();
                }

                // Keep the displayed title in sync with the initially selected media.
                updateTitle();

                // Play next video when current ends.
                video.addEventListener('ended', function() {
                    consecutiveLoadErrors = 0;
                    playNextVideo();
                });

                // Attempt playback whenever the current media has enough data.
                video.addEventListener('loadeddata', function() {
                    consecutiveLoadErrors = 0;
                    tryPlayCurrentVideo();
                });

                // Skip broken video sources, but stop retrying after repeated failures.
                video.addEventListener('error', function() {
                    consecutiveLoadErrors += 1;
                    if (consecutiveLoadErrors > maxConsecutiveLoadErrors) {
                        return;
                    }

                    setTimeout(playNextVideo, 300);
                });
            }
        });
    </script>

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
