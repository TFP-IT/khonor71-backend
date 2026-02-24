<x-web-layout>
    @include('themes.news.components.details.probash-section-details-layout', [
        'breadcrumbTitle' => 'প্রবাস টিভি সংবাদ',
        'badgeTitle' => 'প্রবাস টিভি',
        'badgeBorderClass' => 'border-red-700',
        'routePrefix' => 'probash-tv',
        'navigationTitle' => 'পূর্বের ও পরের ভিডিও সংবাদ',
        'recentTitle' => 'সাম্প্রতিক ভিডিও সংবাদ',
        'showComments' => true,
    ])
</x-web-layout>
