<!-- Top Category News section -->
@php
    $heroPhotoLibrary = $homePageTopNews[0]->news->photoLibrary ?? null;
    $imageBaseHost = '';
    if (!empty($heroPhotoLibrary?->image_base_url) && preg_match('#^https?://[^/]+#', $heroPhotoLibrary->image_base_url, $m)) {
        $imageBaseHost = $m[0];
    }

    $heroLargeImage = !empty($heroPhotoLibrary?->large_image)
        ? ($imageBaseHost ? $imageBaseHost . '/storage/' . ltrim($heroPhotoLibrary->large_image, '/') : asset('storage/' . $heroPhotoLibrary->large_image))
        : asset('/assets/news-details-view.png');

    $heroThumbImage = '';
    if (!empty($heroPhotoLibrary?->image_base_url)) {
        $heroThumbImage = $heroPhotoLibrary->image_base_url;
    } elseif (!empty($heroPhotoLibrary?->thumb_image)) {
        $heroThumbImage = asset('storage/' . $heroPhotoLibrary->thumb_image);
    }

    $heroImageSrc = $heroThumbImage ?: $heroLargeImage;
    $heroImageSrcsetParts = [];
    if (!empty($heroThumbImage)) {
        $heroImageSrcsetParts[] = $heroThumbImage . ' 438w';
    }
    $heroImageSrcsetParts[] = $heroLargeImage . ' 1067w';
    $heroImageSrcset = implode(', ', array_unique($heroImageSrcsetParts));
    $heroImageSizes = '(max-width: 767px) calc(100vw - 24px), (max-width: 1279px) 66vw, 50vw';
@endphp
<section class="container grid md:grid-cols-3 xl:grid-cols-4 gap-2 md:gap-4 mt-2 md:mt-3">
    <!-- Left Section -->
    <section class="order-2 md:col-span-3 xl:col-auto xl:order-1">
        @if ($latestNews->isNotEmpty())
            @include('themes.news.components.home.latest-news', [
                'latestNews' => $latestNews->take(4),
            ])
        @endif
    </section>

    <!-- Middle Section -->
    <section class="md:col-span-2 order-1">
        <div class="">
            <a href="{{ __url($homePageTopNews[0]->news->encode_title) }}"
                class="block group overflow-hidden w-full h-52 md:h-80 xl:h-[360px] 2xl:h-[380px] 4xl:h-[460px] object-cover">
                <img class="w-full h-full object-cover group-hover:scale-105 transition_slow" src="{{ $heroImageSrc }}"
                    @if (!empty($heroImageSrcset)) srcset="{{ $heroImageSrcset }}"
                        sizes="{{ $heroImageSizes }}" @endif
                    alt="{{ $homePageTopNews[0]->news->image_alt ?? $homePageTopNews[0]->news->title }}" width="1067"
                    height="585" fetchpriority="high" loading="eager" decoding="async" />
            </a>

            <div class="py-3 space-y-2">
                <div class="h-7 pl-3 pr-6 text-white uppercase flex justify-center items-center clip-hex-right"
                    {!! bgColorStyle($homePageTopNews[0]->category->color_code) !!}>
                    {{ $homePageTopNews[0]->category->category_name }}
                </div>
                <a href="{{ __url($homePageTopNews[0]->news->encode_title) }}"
                    class="text-neutral-800 dark:text-white hover:text-brand-primary dark:hover:text-brand-primary text-2xl lg:text-3xl font-bold my-2 transition_3 line-clamp-2">
                    {{ $homePageTopNews[0]->news->title }}
                </a>
                <p class="text-sm text-neutral-600 dark:text-neutral-400 capitalize line-clamp-2">
                    {{ clean_news_content($homePageTopNews[0]->news->news) }}
                </p>
                <div class="capitalize flex items-center gap-1 text-xs">
                    <span>{{ $homePageTopNews[0]->news->postByUser->full_name ?? localize('unknown') }}</span>
                    <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                    </svg>
                    <span>{{ news_publish_date_format($homePageTopNews[0]->news->publish_date) }}</span>
                    <!-- <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M168.2 384.9c-15-5.4-31.7-3.1-44.6 6.4c-8.2 6-22.3 14.8-39.4 22.7c5.6-14.7 9.9-31.3 11.3-49.4c1-12.9-3.3-25.7-11.8-35.5C60.4 302.8 48 272 48 240c0-79.5 83.3-160 208-160s208 80.5 208 160s-83.3 160-208 160c-31.6 0-61.3-5.5-87.8-15.1zM26.3 423.8c-1.6 2.7-3.3 5.4-5.1 8.1l-.3 .5c-1.6 2.3-3.2 4.6-4.8 6.9c-3.5 4.7-7.3 9.3-11.3 13.5c-4.6 4.6-5.9 11.4-3.4 17.4c2.5 6 8.3 9.9 14.8 9.9c5.1 0 10.2-.3 15.3-.8l.7-.1c4.4-.5 8.8-1.1 13.2-1.9c.8-.1 1.6-.3 2.4-.5c17.8-3.5 34.9-9.5 50.1-16.1c22.9-10 42.4-21.9 54.3-30.6c31.8 11.5 67 17.9 104.1 17.9c141.4 0 256-93.1 256-208S397.4 32 256 32S0 125.1 0 240c0 45.1 17.7 86.8 47.7 120.9c-1.9 24.5-11.4 46.3-21.4 62.9zM144 272a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm144-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm80 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                    </svg>
                    <span>{{ $homePageTopNews[0]->news->comments_count }}</span> -->
                </div>
            </div>
        </div>
    </section>


    {{-- <!-- card 2: Probash category news -->
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 border-2 border-yellow-400 bg-neutral-800 py-1.5"  style="padding-left: 1rem; padding-right: 11rem;">
                    <span class="h-2.5 "></span>
                    <span class="text-sm font-semibold text-white">সর্বশেষ প্রবাস সংবাদ</span>
                </div>
                @if ($rightCategoryNews)
                    @php
                        $rightCategoryImage = asset('/assets/news-card-view.png');
                        $photoLibraryImage = optional($rightCategoryNews->photoLibrary)->image_base_url;

                        if (!empty($photoLibraryImage)) {
                            $rightCategoryImage = $photoLibraryImage;
                        } elseif (!empty($rightCategoryNews->image_base_url)) {
                            $rightCategoryImage = $rightCategoryNews->image_base_url;
                        } elseif (!empty($rightCategoryNews->image)) {
                            $imagePath = str_starts_with($rightCategoryNews->image, 'images/')
                                ? $rightCategoryNews->image
                                : 'images/thumb/' . $rightCategoryNews->image;
                            $rightCategoryImage = get_image_url('/assets/news-card-view.png', $imagePath);
                        }
                    @endphp
                    <a
                        href="{{ __url('probash-news-tv/' . $rightCategoryNews->encode_title) }}"
                        class="block w-full h-52 md:h-[150px] xl:h-36 4xl:h-52 object-cover group overflow-hidden">
                        <img
                            class="w-full h-full object-cover group-hover:scale-105 transition_slow"
                            src="{{ $rightCategoryImage }}"
                            onerror="this.onerror=null;this.src='{{ asset('/assets/news-card-view.png') }}';"
                            alt="{{ $rightCategoryNews->image_alt ?? $rightCategoryNews->title }}"
                        />
                    </a>
                    <div class="py-3 space-y-2">
                        <a
                            href="{{ __url('probash-news-tv/' . $rightCategoryNews->encode_title) }}"
                            class="line-clamp-2 text-neutral-800 dark:text-white hover:text-brand-primary dark:hover:text-brand-primary font-bold text-lg leading-6 transition_3">
                            {{ $rightCategoryNews->title }}
                        </a>
                    </div>
                @else
                    <div class="block w-full h-52 md:h-[150px] xl:h-36 4xl:h-52 overflow-hidden">
                        <img
                            class="w-full h-full object-cover"
                            src="{{ asset('/assets/news-card-view.png') }}"
                            alt="No Category News">
                    </div>
                @endif
            </div> --}}


    <!-- Right News section -->
    <section class="order-3 xl:order-2">
        @php
            $tvNewsItems = get_tv_news(5);
            $tvVideoNews =
                $tvNewsItems->first(function ($news) {
                    return !empty($news->thumbnail_video) || !empty($news->video) || !empty($news->video_url);
                }) ?? $tvNewsItems->first();
            $tvRedirectUrl = !empty($tvVideoNews) ? __url('probash-news-tv/' . $tvVideoNews->encode_title) : '';

            $tvOverlaySource = '';
            $tvSource = '';
            $tvPlayableSource = '';
            $tvRenderType = '';
            $tvPoster = asset('assets/no_news.jpg');

            if (!empty($tvVideoNews)) {
                if (!empty($tvVideoNews->thumbnail_image)) {
                    $tvPoster =
                        str_starts_with($tvVideoNews->thumbnail_image, 'http://') ||
                        str_starts_with($tvVideoNews->thumbnail_image, 'https://')
                            ? $tvVideoNews->thumbnail_image
                            : get_image_url('/assets/no_news.jpg', $tvVideoNews->thumbnail_image);
                }

                if (!empty($tvVideoNews->thumbnail_video)) {
                    $tvOverlaySource =
                        str_starts_with($tvVideoNews->thumbnail_video, 'http://') ||
                        str_starts_with($tvVideoNews->thumbnail_video, 'https://')
                            ? $tvVideoNews->thumbnail_video
                            : asset('storage/' . $tvVideoNews->thumbnail_video);
                }

                if (!empty($tvVideoNews->video)) {
                    $tvRenderType = 'video';
                    $tvSource = asset('storage/' . $tvVideoNews->video);
                } elseif (!empty($tvVideoNews->video_url)) {
                    $videoData = manageVideoUrl($tvVideoNews->video_url);
                    $tvSource = $videoData['src'] ?? '';
                    $tvRenderType = $videoData['type'] ?? '';

                    if (!empty($videoData['thumb'])) {
                        $tvPoster = $videoData['thumb'];
                    }
                }

                // Always prefer the full playable video; fallback to thumbnail preview clip.
                if (!empty($tvSource) && $tvRenderType === 'video') {
                    $tvPlayableSource = $tvSource;
                } elseif (!empty($tvOverlaySource)) {
                    $tvPlayableSource = $tvOverlaySource;
                }
            }

            $categoryNewsItems = get_probash_category_news(1);
            $rightCategoryNews = $categoryNewsItems->first();
        @endphp
        <div class="space-y-1 2xl:space-y-2">
            <!-- card 1: TV Section with News (header style) -->
            <div class="border-2 border-red-700 rounded-2xl p-2 bg-white dark:bg-neutral-900">
                <div class="grid grid-cols-3 ">
                    <div
                        class="col-span-3 relative flex items-center justify-center overflow-hidden rounded-md bg-neutral-100 dark:bg-neutral-800">
                        <img src="{{ asset('assets/probash-tv.png') }}" alt="TV Frame"
                            class="w-full h-full object-contain" loading="lazy" decoding="async" fetchpriority="low">

                        @if (!empty($tvVideoNews) && !empty($tvPlayableSource))
                            <button type="button"
                                class="absolute inset-0 flex items-center justify-center js-tv-play-trigger"
                                aria-label="Play video: {{ $tvVideoNews->title }}">
                                <img src="{{ $tvPoster }}"
                                    alt="{{ $tvVideoNews->image_alt ?? $tvVideoNews->title }}"
                                    class="absolute w-3/4 h-3/4 object-cover rounded-sm" loading="lazy" decoding="async"
                                    fetchpriority="low"
                                    style="width: 75%; height: 60%; transform: translate(-7.5%, 13%);">
                                <span
                                    class="absolute z-10 w-12 h-12 rounded-full bg-black/70 text-white flex items-center justify-center"
                                    style="transform: translate(-7.5%, 13%);">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <path d="M8 5v14l11-7z"></path>
                                    </svg>
                                </span>
                            </button>
                            <video
                                class="absolute w-3/4 h-3/4 object-cover rounded-sm js-tv-inline-player hidden cursor-pointer"
                                style="width: 75%; height: 60%; transform: translate(-7.5%, 13%);" loop playsinline
                                preload="none" poster="{{ $tvPoster }}" data-redirect-url="{{ $tvRedirectUrl }}">
                                <source src="{{ $tvPlayableSource }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @elseif (!empty($tvVideoNews))
                            <a href="{{ $tvRedirectUrl }}"
                                class="absolute inset-0 flex items-center justify-center">
                                <img src="{{ $tvPoster }}"
                                    alt="{{ $tvVideoNews->image_alt ?? $tvVideoNews->title }}"
                                    class="absolute w-3/4 h-3/4 object-cover rounded-sm" loading="lazy" decoding="async"
                                    fetchpriority="low"
                                    style="width: 75%; height: 60%; transform: translate(-7.5%, 13%);">
                            </a>
                        @else
                            <img src="{{ asset('assets/no_news.jpg') }}" alt="Default TV News"
                                class="absolute w-3/4 h-3/4 object-cover rounded-sm" loading="lazy" decoding="async"
                                fetchpriority="low" style="width: 75%; height: 60%; transform: translate(-7.5%, 13%);">
                        @endif
                    </div>

                    <div class="col-span-3 min-w-0 flex flex-col justify-between gap-2">
                        @if ($tvVideoNews)
                            <a href="{{ $tvRedirectUrl }}"
                                class="block w-full min-w-0 text-xs md:text-[11px] xl:text-[10px] 4xl:text-xs text-neutral-800 dark:text-white hover:text-brand-primary dark:hover:text-brand-primary font-bold leading-4 transition_3 whitespace-normal break-words">
                                {{ $tvVideoNews->title }}
                            </a>
                        @else
                            <div class="line-clamp-2 text-xs text-neutral-700 dark:text-neutral-200 font-bold">No News
                                Available</div>
                        @endif
                    </div>
                </div>
            </div>


            <!-- card 2: Probash category news -->
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 border-2 border-yellow-400 bg-neutral-800 py-1.5"
                    style="padding-left: 1rem; padding-right: 11rem;">
                    <span class="h-2.5 "></span>
                    <span class="text-sm font-semibold text-white">সর্বশেষ প্রবাস সংবাদ</span>
                </div>
                @if ($rightCategoryNews)
                    @php
                        $rightCategoryImage = asset('/assets/news-card-view.png');
                        if (!empty($rightCategoryNews->image_base_url)) {
                            $rightCategoryImage = $rightCategoryNews->image_base_url;
                        } elseif (!empty($rightCategoryNews->image)) {
                            $rightCategoryImagePath = str_starts_with($rightCategoryNews->image, 'images/')
                                ? $rightCategoryNews->image
                                : 'images/thumb/' . ltrim($rightCategoryNews->image, '/');
                            $rightCategoryImage = get_image_url('/assets/news-card-view.png', $rightCategoryImagePath);
                        }
                    @endphp
                    <a href="{{ __url($rightCategoryNews->encode_title) }}"
                        class="block w-full h-52 md:h-[150px] xl:h-36 4xl:h-52 object-cover group overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition_slow"
                            src="{{ $rightCategoryImage }}"
                            onerror="this.onerror=null;this.src='{{ asset('/assets/news-card-view.png') }}';"
                            alt="{{ $rightCategoryNews->image_alt ?? $rightCategoryNews->title }}" loading="lazy"
                            decoding="async" fetchpriority="low" />
                    </a>
                    <div class="py-3 space-y-2">
                        <a href="{{ __url($rightCategoryNews->encode_title) }}"
                            class="line-clamp-2 text-neutral-800 dark:text-white hover:text-brand-primary dark:hover:text-brand-primary font-bold text-lg leading-6 transition_3">
                            {{ $rightCategoryNews->title }}
                        </a>
                    </div>
                @else
                    <div class="block w-full h-52 md:h-[150px] xl:h-36 4xl:h-52 overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ asset('/assets/news-card-view.png') }}"
                            loading="lazy" decoding="async" alt="No Category News">
                    </div>
                @endif
            </div>
        </div>
    </section>
</section>

@once
    @push('custom-css')
        @if (!empty($heroImageSrc))
            <link rel="preload" as="image" href="{{ $heroImageSrc }}"
                @if (!empty($heroImageSrcset)) imagesrcset="{{ $heroImageSrcset }}"
                    imagesizes="{{ $heroImageSizes }}" @endif
                fetchpriority="high">
        @endif
    @endpush
    @push('custom-js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.js-tv-play-trigger').forEach(function(trigger) {
                    trigger.addEventListener('click', function() {
                        const wrapper = trigger.parentElement;
                        if (!wrapper) return;

                        const player = wrapper.querySelector('.js-tv-inline-player');
                        if (!player) return;

                        trigger.classList.add('hidden');
                        player.classList.remove('hidden');
                        player.currentTime = 0;
                        player.play().catch(function() {});
                    });
                });

                document.querySelectorAll('.js-tv-inline-player').forEach(function(player) {
                    player.addEventListener('click', function() {
                        const redirectUrl = player.getAttribute('data-redirect-url');
                        if (redirectUrl) {
                            window.location.href = redirectUrl;
                        }
                    });
                });
            });
        </script>
    @endpush
@endonce
