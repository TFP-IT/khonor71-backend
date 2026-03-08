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
                <li class="text-brand-primary capitalize line-clamp-1">সর্বশেষ প্রবাস সংবাদ</li>
            </ul>
        </div>
    </section>

    <section class="container mt-3 pb-8">
        <div class="flex flex-col md:flex-row md:items-center gap-3">
            <div class="inline-flex items-center gap-2 border-2 border-yellow-400 bg-neutral-900 py-1.5 px-4 w-fit whitespace-nowrap">
                <span class="text-xs font-semibold text-white whitespace-nowrap">সর্বশেষ প্রবাস সংবাদ</span>
            </div>
            <div class="w-full flex justify-end">
                <div class="flex items-center gap-2">
                    <form method="GET" action="{{ __url('probashi-news-list') }}" class="flex items-center gap-2">
                        <input
                            type="text"
                            name="q"
                            value="{{ $search ?? '' }}"
                            placeholder="প্রবাস সংবাদ খুঁজুন..."
                            class="w-64 max-w-full border border-neutral-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-brand-primary"
                        />
                        <button
                            type="submit"
                            class="px-3 py-2 rounded-md bg-brand-primary text-white text-sm font-medium hover:opacity-90 transition_3">
                            {{ localize('search') }}
                        </button>
                    </form>
                    <a
                        href="{{ __url('registration') }}"
                        class="px-3 py-2 rounded-md bg-brand-primary text-white text-sm font-medium hover:opacity-90 transition_3 whitespace-nowrap">
                        {{ localize('registration') }}
                    </a>
                </div>
            </div>
        </div>

        <p class="text-sm text-neutral-500 dark:text-neutral-300 mt-3">
            মোট সংবাদ: {{ $probashiNews->total() }}
        </p>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 mt-4">
            @forelse ($probashiNews as $news)
                <article>
                    <a href="{{ __url($news->encode_title) }}" class="block w-full h-52 md:h-44 2xl:h-52 overflow-hidden group">
                        <img
                            class="w-full h-full object-cover group-hover:scale-105 transition_5"
                            src="{{ get_image_url('/assets/news-card-view.png', $news->thumbnail_image) }}"
                            alt="{{ $news->image_alt ?? $news->title }}"
                        />
                    </a>
                    <div class="py-3 space-y-2">
                        <a
                            href="{{ __url($news->encode_title) }}"
                            class="line-clamp-2 text-neutral-800 dark:text-white hover:text-brand-primary dark:hover:text-brand-primary font-bold text-lg leading-6 transition_3">
                            {{ $news->title }}
                        </a>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400 line-clamp-2">
                            {{ \Illuminate\Support\Str::limit(clean_news_content($news->details), 120) }}
                        </p>
                        <div class="text-neutral-500 capitalize flex items-center gap-1 text-sm">
                            <span>{{ news_publish_date_format($news->publish_date) }}</span>
                        </div>
                    </div>
                </article>
            @empty
                <p class="text-sm text-neutral-500 dark:text-neutral-300">
                    {{ localize('no_data_found') }}
                </p>
            @endforelse
        </div>

        @if ($probashiNews->hasPages())
            <div class="mt-6">
                {{ $probashiNews->links('vendor.pagination.archive') }}
            </div>
        @endif
    </section>
</x-web-layout>
