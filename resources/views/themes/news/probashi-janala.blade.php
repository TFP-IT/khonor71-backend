<x-web-layout>
    <div class="hidden lg:block h-8"></div>

    <div class="h-1 md:h-8"></div>
    @if ($probashiJanalaPageTopNews->isNotEmpty())
        @include('themes.news.components.home.top-probashi-janala-news')
    @endif

    <section class="container my-6">
        @if ($probashiNews)
            @include('themes.news.probashi_news_category_news', $probashiNews)
        @endif
    </section>


</x-web-layout>
