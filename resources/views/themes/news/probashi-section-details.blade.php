<x-web-layout>
    @include('themes.news.components.details.probash-section-details-layout', [
        'breadcrumbTitle' => 'সর্বশেষ প্রবাস সংবাদ',
        'badgeTitle' => 'সর্বশেষ প্রবাস সংবাদ',
        'badgeBorderClass' => 'border-yellow-400',
        'routePrefix' => 'probash-news',
        'navigationTitle' => 'আরও প্রবাস সংবাদ',
        'recentTitle' => 'আরও প্রবাস সংবাদ',
        'showComments' => false,
    ])
</x-web-layout>
