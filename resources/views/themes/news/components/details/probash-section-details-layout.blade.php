@php
    $showComments = $showComments ?? false;
    $routePrefix = trim($routePrefix ?? '', '/');
    $breadcrumbTitle = $breadcrumbTitle ?? '';
    $badgeTitle = $badgeTitle ?? $breadcrumbTitle;
    $badgeBorderClass = $badgeBorderClass ?? 'border-red-700';
    $navigationTitle = $navigationTitle ?? localize('next_article');
    $recentTitle = $recentTitle ?? localize('recent_post');
    $recentLimit = $recentLimit ?? 8;

    $detailUrl = function (string $slug) use ($routePrefix): string {
        return __url($routePrefix . '/' . ltrim($slug, '/'));
    };

    $resolveImage = function ($item, string $fallback = '/assets/thumbnail-image.jpg'): string {
        if (empty($item) || empty($item->thumbnail_image)) {
            return asset($fallback);
        }

        if (str_starts_with($item->thumbnail_image, 'http://') || str_starts_with($item->thumbnail_image, 'https://')) {
            return $item->thumbnail_image;
        }

        return get_image_url($fallback, $item->thumbnail_image);
    };

    $poster = $resolveImage($videoNews, '/assets/news-details-view.png');

    $renderType = '';
    $src = '';

    if (!empty($videoNews->video)) {
        $renderType = 'video';
        $src = asset('storage/' . $videoNews->video);
    } elseif (!empty($videoNews->video_url)) {
        $videoData = manageVideoUrl($videoNews->video_url);
        $src = $videoData['src'] ?? '';
        $renderType = $videoData['type'] ?? '';

        if (!empty($videoData['thumb'])) {
            $poster = $videoData['thumb'];
        }
    }
@endphp

<section class="container mt-2">
    <div class="bg-neutral-100 dark:text-white dark:bg-neutral-800 flex items-center p-2 gap-3">
        <ul class="flex gap-1 items-center">
            <li>
                <a class="text-neutral-600 dark:text-white transition_3 capitalize whitespace-nowrap" href="{{ __url('/') }}">
                    {{ localize('home') }}
                </a>
            </li>
            <svg width="12" height="14" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 1L1 15" stroke="oklch(70.8% 0 0)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <li class="text-brand-primary capitalize line-clamp-1">{{ $breadcrumbTitle }}</li>
        </ul>
    </div>
</section>

<section class="container mt-3 pb-8 grid grid-cols-1 xl:grid-cols-12 gap-4">
    <section class="xl:col-span-8 space-y-4">
        <div class="rounded-md border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4 md:p-5">
            <div class="inline-flex items-center gap-2 border-2 {{ $badgeBorderClass }} bg-neutral-900 py-1.5 px-4">
                <span class="text-xs font-semibold text-white">{{ $badgeTitle }}</span>
            </div>

            <h1 class="dark:text-white text-2xl lg:text-3xl mt-3 font-semibold leading-tight">
                {{ $videoNews->title }}
            </h1>

            <div class="flex md:items-center justify-between flex-col md:flex-row gap-4 mt-3">
                <div class="dark:text-white capitalize flex flex-wrap items-center gap-1 text-sm">
                    <span>{{ views_format($videoNews->total_view) }}&nbsp;{{ localize('view') }}</span>
                    <span>{{ $videoNews->postByUser->full_name ?? localize('unknown') }}</span>
                    <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                    </svg>
                    <span>{{ news_publish_date_format($videoNews->publish_date) }}</span>
                </div>

                @include('themes.news.components.common.social-section')
            </div>
        </div>

        <div class="rounded-md border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-3 md:p-4">
            @if ($renderType === 'video')
                <div x-data="{ showVideo: false }" class="relative aspect-video">
                    <div x-show="!showVideo" class="absolute inset-0 cursor-pointer z-20" @click="showVideo = true; $refs.videoEl.play()">
                        <img src="{{ $poster }}" alt="Video Poster" class="w-full h-full object-cover shadow-md">
                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="white">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                    </div>

                    <video x-ref="videoEl" x-show="showVideo" controls class="absolute top-0 left-0 w-full h-full z-10" poster="{{ $poster }}">
                        <source src="{{ $src }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @elseif ($renderType === 'iframe')
                <div x-data="{ showPlayer: false }" class="relative aspect-video">
                    <template x-if="!showPlayer">
                        <div class="absolute inset-0 cursor-pointer" @click="showPlayer = true">
                            <img src="{{ $poster }}" alt="Video Thumbnail" class="w-full h-full object-cover shadow-md">
                            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                                <svg width="60" height="60" viewBox="0 0 24 24" fill="white">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                    </template>

                    <template x-if="showPlayer">
                        <iframe
                            class="absolute top-0 left-0 w-full h-full"
                            src="{{ $src }}{{ Str::contains($src, '?') ? '&' : '?' }}autoplay=1"
                            title="Video Player"
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen>
                        </iframe>
                    </template>
                </div>
            @else
                <img src="{{ $poster }}" alt="Video Thumbnail" class="w-full object-cover">
            @endif

            @if (!empty($videoNews->image_title))
                <p class="text-sm text-gray-500 dark:text-gray-400 italic text-center mt-2">
                    {{ $videoNews->image_title }}
                </p>
            @endif
        </div>

        <div class="rounded-md border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4">
            <div class="prose-content dark:text-white">
                {!! $videoNews->details !!}
            </div>
        </div>

        <div class="rounded-md border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4">
            <h2 class="text-lg font-semibold text-brand-primary mb-3">{{ $navigationTitle }}</h2>

            <div class="grid md:grid-cols-2 gap-4">
                <div class="space-y-3">
                    <h3 class="text-sm font-semibold uppercase text-neutral-500 dark:text-neutral-300">{{ localize('previous_article') }}</h3>
                    @forelse ($previousNews as $previous)
                        <a href="{{ $detailUrl($previous->encode_title) }}" class="grid grid-cols-3 gap-2 items-center">
                            <figure class="h-16 overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ $resolveImage($previous) }}" alt="{{ $previous->title }}" />
                            </figure>
                            <p class="col-span-2 line-clamp-2 text-neutral-700 dark:text-neutral-100 hover:text-brand-primary dark:hover:text-brand-primary transition_3">
                                {{ $previous->title }}
                            </p>
                        </a>
                    @empty
                        <p class="text-sm text-neutral-500 dark:text-neutral-300">{{ localize('no_data_found') }}</p>
                    @endforelse
                </div>

                <div class="space-y-3">
                    <h3 class="text-sm font-semibold uppercase text-neutral-500 dark:text-neutral-300">{{ localize('next_article') }}</h3>
                    @forelse ($nextNews as $next)
                        <a href="{{ $detailUrl($next->encode_title) }}" class="grid grid-cols-3 gap-2 items-center">
                            <figure class="h-16 overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ $resolveImage($next) }}" alt="{{ $next->title }}" />
                            </figure>
                            <p class="col-span-2 line-clamp-2 text-neutral-700 dark:text-neutral-100 hover:text-brand-primary dark:hover:text-brand-primary transition_3">
                                {{ $next->title }}
                            </p>
                        </a>
                    @empty
                        <p class="text-sm text-neutral-500 dark:text-neutral-300">{{ localize('no_data_found') }}</p>
                    @endforelse
                </div>
            </div>
        </div>

        @if ($showComments)
            <input type="hidden" form="comment-form" name="news_comment_type" value="video_news">

            @if (app_setting()->web_user_can_comment == 1)
                @include('themes.news.components.details.comment-section')
            @endif
        @endif
    </section>

    <section class="xl:col-span-4 space-y-4">
        <div class="rounded-md border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 overflow-hidden">
            <div class="px-3 py-2 bg-neutral-900 text-white text-sm font-semibold uppercase">{{ $recentTitle }}</div>
            <div class="p-3 space-y-3">
                @forelse ($recentPosts->take($recentLimit) as $recentPost)
                    <a href="{{ $detailUrl($recentPost->encode_title) }}" class="grid grid-cols-3 gap-2 items-center border-b border-neutral-200 dark:border-neutral-700 pb-3 last:border-b-0 last:pb-0">
                        <figure class="h-16 overflow-hidden">
                            <img class="w-full h-full object-cover" src="{{ $resolveImage($recentPost) }}" alt="{{ $recentPost->title }}" />
                        </figure>
                        <div class="col-span-2">
                            <h3 class="line-clamp-2 text-sm text-neutral-700 dark:text-neutral-100 hover:text-brand-primary dark:hover:text-brand-primary transition_3">
                                {{ $recentPost->title }}
                            </h3>
                            <p class="text-xs text-neutral-500 dark:text-neutral-300 mt-1">
                                {{ news_publish_date_format($recentPost->publish_date) }}
                            </p>
                        </div>
                    </a>
                @empty
                    <p class="text-sm text-neutral-500 dark:text-neutral-300">No News Available</p>
                @endforelse
            </div>
        </div>

        <div class="space-y-6 xl:sticky xl:top-16">
            @include('themes.news.components.common.popular-post')
            @include('themes.news.components.common.recommended-top-week-post')
            @if ($votingPoll)
                @include('themes.news.components.common.voting-poll')
            @endif
        </div>
    </section>
</section>
