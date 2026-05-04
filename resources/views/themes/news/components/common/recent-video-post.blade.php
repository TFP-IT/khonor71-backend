@php
    $recentVideoPosts = ($recentPosts ?? collect())->take(5);
@endphp

@if ($recentVideoPosts->isNotEmpty())
    <section
        class="border p-2 2xl:p-3 rounded-md order-3 dark:bg-neutral-900 dark:divide-neutral-700 dark:border-neutral-800 shadow-sm">
        <div class="@if (!$themeSettings->background_color || mode()) bg-neutral-700 @endif @if (mode()) dark:bg-neutral-800 @endif @if (!$themeSettings->text_color || mode()) text-white @endif p-2 uppercase font-medium"
            style="@if (!mode() && $themeSettings->background_color) background-color: {{ $themeSettings->background_color }}; @endif @if (!mode() && $themeSettings->text_color) color: {{ $themeSettings->text_color }}; @endif">
            {{ localize('recent_post') }}
        </div>

        <div class="space-y-3 mt-3">
            @foreach ($recentVideoPosts as $recentVideoPost)
                <a href="{{ __url($recentVideoPost->encode_title) }}"
                    class="block @if (!$loop->last) pb-3 border-b border-neutral-300 dark:border-neutral-600 @endif">
                    <div class="grid grid-cols-3 gap-2 items-center">
                        <figure class="w-full h-20 overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="{{ get_image_url('/assets/thumbnail-image.jpg', $recentVideoPost->thumbnail_image) }}"
                                alt="{{ $recentVideoPost->image_alt }}" />
                        </figure>
                        <div class="col-span-2">
                            <h2
                                class="line-clamp-2 text-neutral-600 hover:text-brand-primary transition_3 dark:text-neutral-50 dark:hover:text-brand-primary">
                                {{ $recentVideoPost->title }}
                            </h2>
                            <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-1">
                                {{ news_publish_date_format($recentVideoPost->publish_date) }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endif
