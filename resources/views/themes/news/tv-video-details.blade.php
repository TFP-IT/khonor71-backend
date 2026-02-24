<x-web-layout>
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
                <li class="text-brand-primary capitalize line-clamp-1">প্রবাস টিভি সংবাদ</li>
            </ul>
        </div>
    </section>

    <section class="container mt-3 pb-8 grid grid-cols-1 xl:grid-cols-12 gap-4">
        <section class="xl:col-span-8 space-y-4">
            <div class="rounded-md border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4 md:p-5">
                <div class="inline-flex items-center gap-2 border-2 border-red-700 bg-neutral-900 py-1.5 px-4">
                    <span class="text-xs font-semibold text-white">প্রবাস টিভি</span>
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

                    @include ('themes.news.components.common.social-section')
                </div>
            </div>

            @php
                $poster = asset('/assets/news-details-view.png');

                if (!empty($videoNews->thumbnail_image)) {
                    $poster = (str_starts_with($videoNews->thumbnail_image, 'http://') || str_starts_with($videoNews->thumbnail_image, 'https://'))
                        ? $videoNews->thumbnail_image
                        : get_image_url('/assets/news-details-view.png', $videoNews->thumbnail_image);
                }

                $videoSrc = $videoNews->video;
                $videoUrl = $videoNews->video_url;
                $renderType = '';
                $src = '';

                if ($videoSrc) {
                    $renderType = 'video';
                    $src = asset('storage/' . $videoSrc);
                } elseif ($videoUrl) {
                    if (Str::contains($videoUrl, ['youtube.com/watch?v=', 'youtu.be'])) {
                        $videoId = '';

                        if (Str::contains($videoUrl, 'watch?v=')) {
                            $videoId = explode('watch?v=', $videoUrl)[1];
                            $videoId = explode('&', $videoId)[0];
                        } elseif (Str::contains($videoUrl, 'youtu.be/')) {
                            $videoId = explode('youtu.be/', $videoUrl)[1];
                        }

                        $src = 'https://www.youtube.com/embed/' . $videoId . '?enablejsapi=1&controls=1&modestbranding=1&rel=0';
                        $renderType = 'iframe';
                    } elseif (Str::contains($videoUrl, 'youtube.com/embed')) {
                        $src = $videoUrl;
                        $renderType = 'iframe';
                    } elseif (Str::contains($videoUrl, 'vimeo.com')) {
                        $src = $videoUrl;
                        $renderType = 'iframe';
                    } elseif (Str::endsWith($videoUrl, '.mp4')) {
                        $src = $videoUrl;
                        $renderType = 'video';
                    }
                }
            @endphp

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
                <h2 class="text-lg font-semibold text-brand-primary mb-3">পূর্বের ও পরের ভিডিও সংবাদ</h2>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold uppercase text-neutral-500 dark:text-neutral-300">{{ localize('previous_article') }}</h3>
                        @forelse ($previousNews as $previous)
                            @php
                                $previousSrc = !empty($previous->thumbnail_image)
                                    ? get_image_url('/assets/thumbnail-image.jpg', $previous->thumbnail_image)
                                    : asset('/assets/thumbnail-image.jpg');
                            @endphp
                            <a href="{{ __url('probash-tv/' . $previous->encode_title) }}" class="grid grid-cols-3 gap-2 items-center">
                                <figure class="h-16 overflow-hidden">
                                    <img class="w-full h-full object-cover" src="{{ $previousSrc }}" alt="{{ $previous->title }}" />
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
                            @php
                                $nextSrc = !empty($next->thumbnail_image)
                                    ? get_image_url('/assets/thumbnail-image.jpg', $next->thumbnail_image)
                                    : asset('/assets/thumbnail-image.jpg');
                            @endphp
                            <a href="{{ __url('probash-tv/' . $next->encode_title) }}" class="grid grid-cols-3 gap-2 items-center">
                                <figure class="h-16 overflow-hidden">
                                    <img class="w-full h-full object-cover" src="{{ $nextSrc }}" alt="{{ $next->title }}" />
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

            <input type="hidden" form="comment-form" name="news_comment_type" value="video_news">

            @if (app_setting()->web_user_can_comment == 1)
                @include ('themes.news.components.details.comment-section')
            @endif
        </section>

        <section class="xl:col-span-4 space-y-4">
            <div class="rounded-md border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 overflow-hidden">
                <div class="px-3 py-2 bg-neutral-900 text-white text-sm font-semibold uppercase">সাম্প্রতিক ভিডিও সংবাদ</div>
                <div class="p-3 space-y-3">
                    @forelse ($recentPosts->take(8) as $recentPost)
                        @php
                            $recentSrc = asset('/assets/thumbnail-image.jpg');

                            if (!empty($recentPost->thumbnail_image)) {
                                $recentSrc = (str_starts_with($recentPost->thumbnail_image, 'http://') || str_starts_with($recentPost->thumbnail_image, 'https://'))
                                    ? $recentPost->thumbnail_image
                                    : get_image_url('/assets/thumbnail-image.jpg', $recentPost->thumbnail_image);
                            }
                        @endphp
                        <a href="{{ __url('probash-tv/' . $recentPost->encode_title) }}" class="grid grid-cols-3 gap-2 items-center border-b border-neutral-200 dark:border-neutral-700 pb-3 last:border-b-0 last:pb-0">
                            <figure class="h-16 overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ $recentSrc }}" alt="{{ $recentPost->title }}" />
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
</x-web-layout>
