<x-web-layout>
    @php
        $combinedDetailUrl = function (?string $slug): string {
            if (empty($slug)) {
                return '#';
            }

            return __url('probash-news-tv/' . ltrim($slug, '/'));
        };

        $resolveCategoryImage = function ($news): string {
            $fallback = asset('/assets/news-card-view.png');

            if (empty($news)) {
                return $fallback;
            }

            if (!empty($news->thumbnail_image)) {
                if (
                    str_starts_with($news->thumbnail_image, 'http://') ||
                    str_starts_with($news->thumbnail_image, 'https://')
                ) {
                    return $news->thumbnail_image;
                }

                return get_image_url('/assets/news-card-view.png', $news->thumbnail_image);
            }

            $photoLibraryImage = optional($news->photoLibrary)->image_base_url;

            if (!empty($photoLibraryImage)) {
                return $photoLibraryImage;
            }

            if (!empty($news->image_base_url)) {
                return $news->image_base_url;
            }

            if (!empty($news->image)) {
                $imagePath = str_starts_with($news->image, 'images/') ? $news->image : 'images/thumb/' . $news->image;

                return get_image_url('/assets/news-card-view.png', $imagePath);
            }

            return $fallback;
        };

        $resolveTvThumb = function ($tvNews): string {
            $fallback = asset('/assets/news-details-view.png');

            if (empty($tvNews) || empty($tvNews->thumbnail_image)) {
                return $fallback;
            }

            if (
                str_starts_with($tvNews->thumbnail_image, 'http://') ||
                str_starts_with($tvNews->thumbnail_image, 'https://')
            ) {
                return $tvNews->thumbnail_image;
            }

            return get_image_url('/assets/news-details-view.png', $tvNews->thumbnail_image);
        };

        $categoryImage = $resolveCategoryImage($rightCategoryNews);

        $tvOverlaySource = null;
        if (!empty($tvVideoNews) && !empty($tvVideoNews->thumbnail_video)) {
            $tvOverlaySource =
                str_starts_with($tvVideoNews->thumbnail_video, 'http://') ||
                str_starts_with($tvVideoNews->thumbnail_video, 'https://')
                    ? $tvVideoNews->thumbnail_video
                    : asset('storage/' . $tvVideoNews->thumbnail_video);
        }

        $tvPoster = $resolveTvThumb($tvVideoNews);
        $tvRenderType = '';
        $tvSource = '';

        if (!empty($tvVideoNews) && !empty($tvVideoNews->video)) {
            $tvRenderType = 'video';
            $tvSource = asset('storage/' . $tvVideoNews->video);
        } elseif (!empty($tvVideoNews) && !empty($tvVideoNews->video_url)) {
            $videoData = manageVideoUrl($tvVideoNews->video_url);
            $tvSource = $videoData['src'] ?? '';
            $tvRenderType = $videoData['type'] ?? '';

            if (!empty($videoData['thumb'])) {
                $tvPoster = $videoData['thumb'];
            }
        }

        $categoryContent = $rightCategoryNews?->details
            ?? $rightCategoryNews?->news
            ?? '<p>No details available.</p>';

        $tvContent = !empty($tvVideoNews?->details) ? $tvVideoNews->details : '<p>No details available.</p>';
    @endphp

    <section class="container mt-2">
        <div class="bg-neutral-100 dark:text-white dark:bg-neutral-800 flex items-center p-2 gap-3">
            <ul class="flex gap-1 items-center">
                <li>
                    <a class="text-neutral-600 dark:text-white transition_3 capitalize whitespace-nowrap"
                        href="{{ __url('/') }}">
                        {{ localize('home') }}
                    </a>
                </li>
                <svg width="12" height="14" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 1L1 15" stroke="oklch(70.8% 0 0)" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <li class="text-brand-primary capitalize line-clamp-1">প্রবাস টিভি ও প্রবাস সংবাদ</li>
            </ul>
        </div>
    </section>

    <section class="container mt-3 pb-8 space-y-4">
        {{-- <div class="grid grid-cols-1 xl:grid-cols-12 gap-4">
            <article class="xl:col-span-8 rounded-md border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-3 md:p-4 {{ $activeType === 'category' ? 'ring-2 ring-yellow-400' : '' }}">
                <div class="inline-flex items-center gap-2 border-2 border-yellow-400 bg-neutral-900 py-1.5 px-4">
                    <span class="text-xs font-semibold text-white">সর্বশেষ প্রবাস সংবাদ</span>
                </div>

                @if (!empty($rightCategoryNews))
                    <a href="{{ $combinedDetailUrl($rightCategoryNews->encode_title) }}" class="block mt-3 overflow-hidden h-64 md:h-80 lg:h-[420px]">
                        <img
                            class="w-full h-full object-cover"
                            src="{{ $categoryImage }}"
                            onerror="this.onerror=null;this.src='{{ asset('/assets/news-card-view.png') }}';"
                            alt="{{ $rightCategoryNews->image_alt ?? $rightCategoryNews->title }}"
                        />
                    </a>

                    <h1 class="text-neutral-800 dark:text-white text-xl md:text-3xl font-bold mt-4 leading-tight">
                        <a href="{{ $combinedDetailUrl($rightCategoryNews->encode_title) }}" class="hover:text-brand-primary dark:hover:text-brand-primary transition_3">
                            {{ $rightCategoryNews->title }}
                        </a>
                    </h1>

                    <p class="text-sm text-neutral-500 dark:text-neutral-300 mt-2">
                        {{ news_publish_date_format($rightCategoryNews->publish_date) }}
                    </p>
                @else
                    <div class="h-64 md:h-80 lg:h-[420px] rounded-md overflow-hidden mt-3">
                        <img class="w-full h-full object-cover" src="{{ asset('/assets/news-card-view.png') }}" alt="No Category News">
                    </div>
                @endif
            </article>

            <article class="xl:col-span-4 rounded-md border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-3 md:p-4 space-y-3 {{ $activeType === 'tv' ? 'ring-2 ring-red-700' : '' }}">
                <div class="inline-flex items-center gap-2 border-2 border-red-700 bg-neutral-900 py-1.5 px-4">
                    <span class="text-xs font-semibold text-white">প্রবাস টিভি সংবাদ</span>
                </div>

                <div class="relative flex items-center justify-center overflow-hidden rounded-md bg-neutral-100 dark:bg-neutral-800">
                    <img src="{{ asset('assets/probash-tv.png') }}" alt="TV Frame" class="w-full h-full object-contain">

                    @if (!empty($tvVideoNews) && !empty($tvOverlaySource))
                        <a href="{{ $combinedDetailUrl($tvVideoNews->encode_title) }}" class="absolute inset-0 flex items-center justify-center">
                            <video
                                class="rounded-sm object-cover"
                                style="width: 75%; height: 65%; transform: translate(-8%, 13%);"
                                autoplay
                                muted
                                loop
                                playsinline
                                preload="metadata">
                                <source src="{{ $tvOverlaySource }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </a>
                    @elseif (!empty($tvVideoNews))
                        <a href="{{ $combinedDetailUrl($tvVideoNews->encode_title) }}" class="absolute inset-0">
                            <img src="{{ $tvPoster }}" alt="TV Thumbnail" class="w-full h-full object-cover">
                        </a>
                    @else
                        <img src="{{ asset('assets/no_news.jpg') }}" alt="Default TV News" class="absolute w-3/5 h-3/5 object-cover rounded-sm">
                    @endif
                </div>

                @if (!empty($tvVideoNews))
                    <h2 class="text-neutral-800 dark:text-white text-lg font-bold leading-6">
                        <a href="{{ $combinedDetailUrl($tvVideoNews->encode_title) }}" class="hover:text-brand-primary dark:hover:text-brand-primary transition_3">
                            {{ $tvVideoNews->title }}
                        </a>
                    </h2>

                    <p class="text-sm text-neutral-500 dark:text-neutral-300">
                        {{ news_publish_date_format($tvVideoNews->publish_date) }}
                    </p>
                @else
                    <p class="text-neutral-700 dark:text-neutral-200 text-sm">No TV News Available</p>
                @endif
            </article>
        </div> --}}

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <section class="rounded-md bg-white dark:bg-neutral-900 p-4">
                <h2 class="text-lg font-semibold text-brand-primary mb-3">প্রবাস সংবাদ বিস্তারিত</h2>

                @if (!empty($rightCategoryNews))
                    <a href="{{ $combinedDetailUrl($rightCategoryNews->encode_title) }}"
                        class="block mb-4 overflow-hidden rounded-md">
                        <img class="w-full h-64 md:h-80 object-cover" src="{{ $categoryImage }}"
                            onerror="this.onerror=null;this.src='{{ asset('/assets/news-card-view.png') }}';"
                            alt="{{ $rightCategoryNews->image_alt ?? $rightCategoryNews->title }}" />
                    </a>

                    <h3 class="text-xl font-semibold text-neutral-800 dark:text-white mb-1">
                        {{ $rightCategoryNews->title }}
                    </h3>
                    <p class="text-sm text-neutral-500 dark:text-neutral-300 mb-3">
                        {{ news_publish_date_format($rightCategoryNews->publish_date) }}
                    </p>
                @endif

                <div class="prose-content dark:text-white">
                    {!! $categoryContent !!}
                </div>
            </section>

            <section class="rounded-md bg-white dark:bg-neutral-900 p-4">
                <h2 class="text-lg font-semibold text-brand-primary">প্রবাস টিভি বিস্তারিত</h2>

                <div
                    class="col-span-3 relative flex items-center justify-center overflow-hidden rounded-md bg-neutral-100 dark:bg-neutral-800">
                    <img src="{{ asset('assets/probash-tv.png') }}" alt="TV Frame" class="w-full h-full object-contain">

                    @if ($tvVideoNews && !empty($tvVideoNews->thumbnail_video))
                        <a href="{{ __url($tvVideoNews->encode_title) }}" class="absolute inset-0 flex items-center justify-center">
                            <video
                                class="rounded-sm object-cover"
                                style="width: 75%; height: 65%; transform: translate(-8%, 13%);"
                                autoplay
                                muted
                                loop
                                playsinline
                                preload="metadata">
                                <source src="{{ asset('storage/' . $tvVideoNews->thumbnail_video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </a>
                    @elseif (!empty($tvVideoNews) && !empty($tvSource) && $tvRenderType === 'video')
                        <video
                            class="absolute rounded-sm object-cover"
                            style="width: 75%; height: 65%; transform: translate(-8%, 13%);"
                            controls
                            autoplay
                            muted
                            playsinline
                            preload="metadata"
                            poster="{{ $tvPoster }}">
                            <source src="{{ $tvSource }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @elseif (!empty($tvVideoNews) && !empty($tvSource) && $tvRenderType === 'iframe')
                        <div x-data="{ showPlayer: false }" class="relative aspect-video">
                            <template x-if="!showPlayer">
                                <div class="absolute inset-0 cursor-pointer" @click="showPlayer = true">
                                    <img src="{{ $tvPoster }}" alt="TV Thumbnail"
                                        class="w-full h-full object-cover shadow-md">
                                    <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                                        <svg width="60" height="60" viewBox="0 0 24 24" fill="white">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </div>
                                </div>
                            </template>

                            <template x-if="showPlayer">
                                <iframe class="absolute top-0 left-0 w-full h-full"
                                    src="{{ $tvSource }}{{ Str::contains($tvSource, '?') ? '&' : '?' }}autoplay=1"
                                    title="Video Player" frameborder="0" allow="autoplay; encrypted-media"
                                    allowfullscreen>
                                </iframe>
                            </template>
                        </div>
                    @elseif (!empty($tvVideoNews))
                        <img src="{{ $tvPoster }}" alt="TV Thumbnail"
                            class="absolute rounded-sm object-cover"
                            style="width: 75%; height: 65%; transform: translate(-8%, 13%);">
                    @endif
                </div>
                <div class="prose-content dark:text-white">
                    {!! $tvContent !!}
                </div>
            </section>

            {{-- <section class="rounded-md bg-white dark:bg-neutral-900 p-4">
                <div class="inline-flex items-center gap-2 border-2 border-yellow-400 bg-neutral-900 py-1.5 px-4">
                    <span class="text-xs font-semibold text-white">সাম্প্রতিক প্রবাস সংবাদ</span>
                </div>

                <div class="mt-3 space-y-3">
                    @forelse ($recentProbashCategoryNews as $recentCategoryNews)
                        @php
                            $recentCategoryImage = $resolveCategoryImage($recentCategoryNews);
                        @endphp
                        <a href="{{ $combinedDetailUrl($recentCategoryNews->encode_title) }}"
                            class="grid grid-cols-3 gap-2 items-start border-b border-neutral-200 dark:border-neutral-700 pb-3 last:border-b-0 last:pb-0">
                            <figure class="h-16 overflow-hidden rounded-sm">
                                <img class="w-full h-full object-cover"
                                    src="{{ $recentCategoryImage }}"
                                    onerror="this.onerror=null;this.src='{{ asset('/assets/news-card-view.png') }}';"
                                    alt="{{ $recentCategoryNews->image_alt ?? $recentCategoryNews->title }}" />
                            </figure>
                            <div class="col-span-2">
                                <h3 class="line-clamp-2 text-sm font-semibold text-neutral-700 dark:text-neutral-100 hover:text-brand-primary dark:hover:text-brand-primary transition_3">
                                    {{ $recentCategoryNews->title }}
                                </h3>
                                <p class="text-xs text-neutral-500 dark:text-neutral-300 mt-1">
                                    {{ news_publish_date_format($recentCategoryNews->publish_date) }}
                                </p>
                            </div>
                        </a>
                    @empty
                        <p class="text-sm text-neutral-500 dark:text-neutral-300">No News Available</p>
                    @endforelse
                </div>
            </section> --}}
        </div>
    </section>
</x-web-layout>
