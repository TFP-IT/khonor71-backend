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
    <link rel="stylesheet" href="{{ \App\Helpers\ThemeHelper::asset('plugins/swiper/css/swiper-bundle.min.css') }}" />

    {{-- Load Google Fonts --}}
    @foreach ($loadedFonts as $font)
    <link href="{{ $font->source_url }}" rel="stylesheet">
    @endforeach

    {{-- Set CSS Variables --}}
    <style>
        :root {
            @if ($principalFont) --font-principal: {
                ! ! $principalFont->font_family ! !
            }

            ;

            @endif @if ($alternateFont) --font-alternate: {
                ! ! $alternateFont->font_family ! !
            }

            ;

            @endif @if ($supplementaryFont) --font-supplementary: {
                ! ! $supplementaryFont->font_family ! !
            }

            ;
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
                flex-direction: column;
            }

            .ticker-label {
                flex-direction: row;
                justify-content: flex-start;
                padding: 8px 15px;
            }

            .ticker-label:after {
                display: none;
            }

            .breaking-badge {
                margin-right: 10px;
            }

            .ticker-date {
                margin-top: 0;
            }

            .ticker-item {
                padding: 10px 15px;
                font-size: 14px;
            }
        }

        /* TV Frame Video Styles */
        .tv-frame-container {
            position: relative;
            display: inline-block;
        }

        .tv-frame-video {
            position: absolute;
            top: 58%;
            left: 45%;
            transform: translate(-50%, -50%);
            width: 75%;
            /* Adjust based on your TV frame's screen area */
            height: 60%;
            /* Adjust based on your TV frame's screen area */
            object-fit: cover;
            border-radius: 2px;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .tv-frame-container {
            transition: transform 0.3s ease-in-out;
        }

        .tv-frame-container:hover {
            /* smooth hover effect */
            transform: scale(1.05);
        }

        /* Ensure video doesn't show controls on mobile */
        .tv-frame-video::-webkit-media-controls {
            display: none !important;
        }

        .tv-frame-video::-webkit-media-controls-panel {
            display: none !important;
        }

        .tv-frame-video::-webkit-media-controls-play-button {
            display: none !important;
        }

        .tv-frame-video::-webkit-media-controls-start-playback-button {
            display: none !important;
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

</head>
<input type="hidden" name="language" id="language" value="{{ app()->getLocale() }}">
<input type="hidden" name="direction" id="direction" value="{{ $direction }}">

<body class="min-h-screen relative"
    @if (!$themeSettings->is_default && $themeSettings->font_family) style="font-family: {{ $themeSettings->font_family }};" @endif>

    @include('themes.news.components.common.login')
    <!-- Top Section -->
    @include('themes.news.layouts.header.top-section')

    {{--
    <!-- top banner section -->
    <section class="container hidden xl:flex justify-between items-center my-2">
        <!-- Brand Logo -->
        <a class="hidden dark:block w-52 h-10 flex_center " href="{{ __url('/') }}">
    <img src="{{ app_setting()->footer_logo }}" alt="" />
    </a>
    <a class="dark:hidden w-52 h-10 flex_center " href="{{ __url('/') }}">
        <img src="{{ app_setting()->logo }}" alt="" />
    </a>
    <!-- Ad Banner Section -->

    <figure class="w-[660px] h-20 object-cover ">
        @if ($ad = get_advertisements(1, 1))
        {!! $ad->embed_code !!}
        @else
        <img class="w-full h-full object-cover" src="{{ asset('assets/top-header-banner.png') }}"
            alt="" />
        @endif
    </figure>
    </section>
    --}}

    <br>
<section class="container hidden xl:flex justify-between items-center">
    <!-- Brand Logo - Takes 1/3 width -->
    <div class="w-1/3 flex justify-start">
        <div class="flex items-center space-x-2">
            <a class="hidden dark:block flex items-center" href="{{ __url('/') }}">
                <img src="{{ app_setting()->footer_logo }}" alt="Footer Logo" class="h-10 w-auto drop-shadow-lg" />
            </a>
            <a class="dark:hidden flex items-center" href="{{ __url('/') }}">
                <img src="{{ app_setting()->logo }}" alt="Main Logo" class="h-12 w-auto drop-shadow-lg" />
            </a>
        </div>
    </div>


    <!-- News Slots Section - Takes 2/3 width -->
    <div class="w-2/3 flex" style="gap: 30px;">

        <!-- First Segment - Probash Janala -->
        <a href="{{ __url('account/probashi-news') }}" class="flex-1 group transform transition duration-300 hover:-translate-y-1">
            <div class="h-14 flex items-center space-x-2 px-3 bg-gradient-to-r from-red-100 to-red-200 rounded-2xl border border-red-300 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                <img src="{{ asset('assets/n.jpeg') }}"
                    alt="Probash janala"
                    class="w-14 h-12 object-contain flex-shrink-0 drop-shadow-md">
                <div class="flex-1 min-w-0">
                   <marquee class="text-red-700 font-medium text-sm leading-tight">আপনার প্রিয় সংবাদ মাধ্যম</marquee>
                </div>
            </div>
        </a>

        <!-- Second Segment - TV Frame with Video Playlist -->
        <div class="flex-1 transform transition duration-300 hover:-translate-y-1">
            <div class="h-14 flex items-center space-x-3 px-3 bg-gradient-to-r from-blue-100 to-blue-200 rounded-2xl border border-blue-300 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                <!-- Compact TV Frame Container -->
                <div class="relative flex-shrink-0 mr-2">
                    <div class="w-14 h-10 bg-black rounded-md overflow-hidden border border-gray-800 shadow-inner">
                        @php
                        $newsVideos = get_probashi_news(5);
                        $videoList = [];
                        foreach($newsVideos as $news) {
                            if(!empty($news->video)) {
                                $videoList[] = $news->video;
                            }
                        }
                        @endphp

                        @if(!empty($videoList))
                        <video
                            id="tvFrameVideo"
                            class="w-full h-full object-cover"
                            autoplay muted playsinline preload="metadata" loop
                            data-playlist="{{ json_encode($videoList) }}">
                            <source src="{{ asset('storage/'.$videoList[0]) }}" type="video/mp4">
                        </video>
                        @else
                        <video
                            id="tvFrameVideo"
                            class="w-full h-full object-cover"
                            autoplay muted loop playsinline preload="metadata">
                            <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/TearsOfSteel.mp4" type="video/mp4">
                        </video>
                        @endif
                    </div>
                    <!-- Live indicator -->
                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full border border-white animate-ping"></div>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-blue-700 font-semibold text-sm truncate leading-tight">প্রবাস টিভি</p>
                    <p class="text-gray-600 text-xs truncate leading-tight">24/7 সরাসরি সম্প্রচার</p>
                </div>
            </div>
        </div>

        <!-- Third Segment - Latest News -->
        <div class="flex-1 transform transition duration-300 hover:-translate-y-1">
            <div class="h-14 flex items-center space-x-3 px-3 bg-gradient-to-r from-green-100 to-green-200 rounded-2xl border border-green-300 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                @php
                $news = get_probashi_news(1)->first();
                @endphp
                @if ($news)
                <img src="{{ asset('assets/ami-sangbadik.png') }}"
                    alt="News"
                    class="w-9 h-9 object-contain flex-shrink-0 drop-shadow-md">
                <div class="flex-1 min-w-0 ml-2 mr-2">
                    <a href="http://10.10.10.139:8080/%E0%A6%AE%E0%A6%BE%E0%A6%9B%E0%A7%87%E0%A6%B0%E0%A6%98%E0%A7%87%E0%A6%B0%E0%A7%87%E0%A6%B0%E0%A6%AE%E0%A6%BE%E0%A6%9A%E0%A6%BE%E0%A7%9F%E0%A6%9D%E0%A7%81%E0%A6%B2%E0%A6%9B%E0%A7%87%E0%A6%A4%E0%A6%B0%E0%A6%AE%E0%A7%81%E0%A6%9C"><marquee class="text-green-700 font-semibold text-sm truncate leading-tight">{{ Str::limit($news->title, 24) }}</marquee></a>
                    <p class="text-gray-600 text-xs truncate leading-tight">{{ $news->publish_date->format('M d, Y') }}</p>
                </div>
                <img src="{{ asset('assets/n.jpeg') }}"
                    alt="News"
                    class="w-9 h-9 object-contain flex-shrink-0 drop-shadow-md">
                @else
                <img src="{{ asset('assets/default-news-image.png') }}"
                    alt="No News"
                    class="w-9 h-9 object-contain flex-shrink-0 opacity-70">
                <div class="flex-1 min-w-0">
                    <p class="text-gray-500 font-medium text-sm truncate leading-tight">No News Available</p>
                    <p class="text-gray-400 text-xs truncate leading-tight">Check back later</p>
                </div>
                <img src="{{ asset('assets/n.jpeg') }}"
                    alt="No News"
                    class="w-9 h-9 object-contain flex-shrink-0 opacity-70">
                @endif
            </div>
        </div>
    </div>
</section>


    <br>

    {{-- Menu section --}}
    @include('themes.news.layouts.header.top-menu')
    @include('themes.news.layouts.header.side-menu')
    @include ('themes.news.layouts.header.mobile-menu')


    {{ $slot }}

    <!-- Footer section -->
    @include('themes.news.layouts.footer')

    <!-- Cookies section -->
    @include('themes.news.components.common.cookies')

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
        class="hidden bg-red-600 hover:bg-brand-primary rounded-full w-10 h-10 flex justify-center items-center fixed bottom-4 right-2 hover:-translate-y-1 z-50 transition-all duration-300 ease-in">
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
    <script src="{{ asset(path: 'website/js/jquery-3.7.1.min.js') }}"></script>

    <script src="{{ \App\Helpers\ThemeHelper::asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>

    <script src="{{ \App\Helpers\ThemeHelper::asset('js/website.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/swiper/breaking-news.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/category-tab.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/global-tab.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/dark-light.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/user-profile.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/global-modal.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/mega-menu-inner-tab.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/mobile-side-menu.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/top-menu.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/video-play.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/login-modal.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/user-profile-setting.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/subscribe-form.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/category-view.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/poll-vote-result.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/youtube-play-alpinejs.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/language-switcher-sm.js') }}"></script>

    <script src="{{ asset('website/js/copy-url.js') }}"></script>
    <script src="{{ asset('website/js/customized-font-size.js?v=5') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('tvFrameVideo');

            if (video && video.dataset.playlist) {
                const playlist = JSON.parse(video.dataset.playlist);
                let currentVideoIndex = 0;

                // Function to play next video
                function playNextVideo() {
                    currentVideoIndex = (currentVideoIndex + 1) % playlist.length;
                    video.src = playlist[currentVideoIndex];
                    video.load();
                    video.play().catch(e => console.log('Autoplay prevented:', e));
                }

                // Event listener for when video ends
                video.addEventListener('ended', playNextVideo);

                // Handle autoplay restrictions
                video.addEventListener('loadeddata', function() {
                    video.play().catch(e => {
                        console.log('Autoplay prevented:', e);
                        // If autoplay fails, try again after user interaction
                        document.addEventListener('click', function() {
                            video.play().catch(e => console.log('Play failed:', e));
                        }, {
                            once: true
                        });
                    });
                });

                // Optional: Add error handling for failed video loads
                video.addEventListener('error', function() {
                    console.log('Video failed to load, trying next video');
                    playNextVideo();
                });
            }
        });
    </script>

    @stack('plugins-js')
    @stack('custom-js')

</body>

</html>
