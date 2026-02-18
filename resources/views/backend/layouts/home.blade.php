@extends('backend.layouts.app')
@section('title', localize('dashboard'))
@push('css')
    <link href="{{ asset('backend/assets/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/apexcharts/dist/apexcharts.css') }}" rel="stylesheet">
@endpush
@section('content')
    @include('backend.layouts.common.message')
    <form method="GET" action="{{ route('home') }}" class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('filter') }}</h6>
                <a href="{{ route('home') }}" class="btn btn-danger btn-sm">{{ localize('reset') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-3 align-items-end">
                <div class="col-xl-2 col-md-4 col-12">
                    <label class="form-label">{{ localize('date_range') }}</label>
                    <select name="range" class="form-control select-basic-single">
                        <option value="today" @selected(($filters['range'] ?? '30d') === 'today')>{{ localize('today') }}</option>
                        <option value="7d" @selected(($filters['range'] ?? '30d') === '7d')>{{ localize('last_7_days') }}</option>
                        <option value="30d" @selected(($filters['range'] ?? '30d') === '30d')>{{ localize('last_30_days') }}</option>
                        <option value="90d" @selected(($filters['range'] ?? '30d') === '90d')>{{ localize('last_90_days') }}</option>
                        <option value="ytd" @selected(($filters['range'] ?? '30d') === 'ytd')>{{ localize('year_to_date') }}</option>
                        <option value="all" @selected(($filters['range'] ?? '30d') === 'all')>{{ localize('all') }}</option>
                        <option value="custom" @selected(($filters['range'] ?? '30d') === 'custom')>{{ localize('custom_range') }}</option>
                    </select>
                </div>
                <div class="col-xl-2 col-md-4 col-12">
                    <label class="form-label">{{ localize('from_date') }}</label>
                    <input type="text" name="from_date" class="form-control date_picker"
                        value="{{ $filters['from_date'] ?? '' }}" placeholder="{{ localize('from_date') }}" autocomplete="off">
                </div>
                <div class="col-xl-2 col-md-4 col-12">
                    <label class="form-label">{{ localize('to_date') }}</label>
                    <input type="text" name="to_date" class="form-control date_picker"
                        value="{{ $filters['to_date'] ?? '' }}" placeholder="{{ localize('to_date') }}" autocomplete="off">
                </div>
                <div class="col-xl-2 col-md-4 col-12">
                    <label class="form-label">{{ localize('language') }}</label>
                    <select name="language_id" class="form-control select-basic-single" data-allow-clear="true">
                        <option value="">{{ localize('all') }}</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}" @selected(($filters['language_id'] ?? null) == $language->id)>
                                {{ $language->langname ?? $language->name ?? $language->value }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-2 col-md-4 col-12">
                    <label class="form-label">{{ localize('category') }}</label>
                    <select name="category_id" class="form-control select-basic-single" data-allow-clear="true">
                        <option value="">{{ localize('all') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(($filters['category_id'] ?? null) == $category->id)>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-2 col-md-4 col-12">
                    <label class="form-label">{{ localize('reporter') }}</label>
                    <select name="reporter_id" class="form-control select-basic-single" data-allow-clear="true">
                        <option value="">{{ localize('all') }}</option>
                        @foreach ($reporters as $reporter)
                            <option value="{{ $reporter->id }}" @selected(($filters['reporter_id'] ?? null) == $reporter->id)>
                                {{ $reporter->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success">{{ localize('filter') }}</button>
                </div>
            </div>
        </div>
    </form>

    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-primary fs-2"><i class="fas fa-newspaper"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('total_posts') }}</div>
                        <div class="fs-18 fw-bold">{{ number_format($totalPosts) }}</div>
                        <small class="text-muted">{{ localize('publish') }}: {{ number_format($publishedPosts) }} | {{ localize('unpublish') }}: {{ number_format($draftPosts) }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-info fs-2"><i class="fas fa-eye"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('total_views') }}</div>
                        <div class="fs-18 fw-bold">{{ number_format($totalViews) }}</div>
                        <small class="text-muted">{{ localize('avg_views') }}: {{ $avgViews }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-success fs-2"><i class="fas fa-comments"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('comments') }}</div>
                        <div class="fs-18 fw-bold">{{ number_format($totalComments) }}</div>
                        <small class="text-muted">{{ localize('pending_comments') }}: {{ number_format($pendingComments) }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-warning fs-2"><i class="fas fa-user-plus"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('subscribers') }}</div>
                        <div class="fs-18 fw-bold">{{ number_format($newSubscribers) }}</div>
                        <small class="text-muted">{{ localize('total') }}: {{ number_format($totalSubscribers) }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-danger fs-2"><i class="fas fa-video"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('video_news') }}</div>
                        <div class="fs-18 fw-bold">{{ number_format($totalVideos) }}</div>
                        <small class="text-muted">{{ localize('total_views') }}: {{ number_format($totalVideoViews) }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-secondary fs-2"><i class="fas fa-bolt"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('story_manage') }}</div>
                        <div class="fs-18 fw-bold">{{ number_format($totalStories) }}</div>
                        <small class="text-muted">{{ localize('total_views') }}: {{ number_format($totalStoryViews) }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-muted fs-2"><i class="fas fa-clock"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('scheduled_posts') }}</div>
                        <div class="fs-18 fw-bold">{{ number_format($scheduledPosts) }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-primary fs-2"><i class="fas fa-users"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('total_users') }}</div>
                        <div class="fs-18 fw-bold">{{ number_format($totalUsers) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-header">
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('posts_trend') }}</h6>
                </div>
                <div class="card-body">
                    <div id="trendChart" style="height: 320px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header">
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('top_categories') }}</h6>
                </div>
                <div class="card-body">
                    <div id="categoryChart" style="height: 320px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('view_analysis') }}</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-lg-4">
                    <div class="card h-100 border-0 bg-light">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="text-info fs-2"><i class="fas fa-eye"></i></div>
                                <div>
                                    <div class="text-muted">{{ localize('total_views') }}</div>
                                    <div class="fs-18 fw-bold">{{ number_format($totalViews) }}</div>
                                    <small class="text-muted">{{ localize('avg_views') }}: {{ $avgViews }}</small>
                                </div>
                            </div>
                            <div class="mt-4">
                                <small class="text-muted">{{ localize('date_wise_views') }}</small>
                                <div id="viewTrendChart" style="height: 180px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('area_wise_views') }}</h6>
                            <ul class="nav nav-tabs mt-3" id="areaViewTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="country-tab" data-bs-toggle="tab"
                                        data-bs-target="#country-tab-pane" type="button" role="tab"
                                        aria-controls="country-tab-pane" aria-selected="true">
                                        {{ localize('country_wise_views') }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="division-tab" data-bs-toggle="tab"
                                        data-bs-target="#division-tab-pane" type="button" role="tab"
                                        aria-controls="division-tab-pane" aria-selected="false">
                                        {{ localize('division_wise_views') }}
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="country-tab-pane" role="tabpanel"
                                    aria-labelledby="country-tab">
                                    <div id="countryViewChart" style="height: 260px;"></div>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-hover table-bordered align-middle table-sm mb-0">
                                            <thead>
                                                <tr>
                                                    <th>{{ localize('country') }}</th>
                                                    <th class="text-end">{{ localize('total_views') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($countryViews as $countryView)
                                                    <tr>
                                                        <td>{{ $countryView->area }}</td>
                                                        <td class="text-end">{{ number_format($countryView->total_views) }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2" class="text-center">{{ localize('empty_data') }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="division-tab-pane" role="tabpanel"
                                    aria-labelledby="division-tab">
                                    <div class="text-muted small mb-2">{{ localize('bangladesh_only') }}</div>
                                    <div id="divisionViewChart" style="height: 260px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('post_wise_views') }}</h6>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-bordered align-middle table-sm">
                                <thead>
                                    <tr>
                                        <th>{{ localize('title') }}</th>
                                        <th class="text-end">{{ localize('read_hit') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($topPosts as $post)
                                        <tr>
                                            <td>
                                                @if ($appSettings && $post->language)
                                                    <a href="{{ __url(($appSettings->language_id == $post->language->id ? null : $post->language->value . '/') . $post->encode_title) }}"
                                                        target="_blank">
                                                        {!! $post->title !!}
                                                    </a>
                                                @else
                                                    {!! $post->title !!}
                                                @endif
                                            </td>
                                            <td class="text-end">{{ number_format($post->reader_hit ?? 0) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center">{{ localize('empty_data') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-lg-12">
            <div class="card h-100">
                <div class="card-header">
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('latest_drafts') }}</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered align-middle table-sm">
                        <thead>
                            <tr>
                                <th>{{ localize('title') }}</th>
                                <th>{{ localize('reporter') }}</th>
                                <th>{{ localize('post_date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestDrafts as $draft)
                                <tr>
                                    <td>{!! $draft->title !!}</td>
                                    <td>{{ $draft->reporterBy?->name ?? '-' }}</td>
                                    <td>{{ $draft->created_at?->format('Y-m-d') ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">{{ localize('empty_data') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($latestDrafts->hasPages())
                    <div class="card-footer">
                        {{ $latestDrafts->appends($filters)->appends([
                            'latest_posts_page' => request('latest_posts_page'),
                            'popular_posts_page' => request('popular_posts_page'),
                        ])->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('latest_posts') }}</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered align-middle table-sm">
                        <thead>
                            <tr>
                                <th>{{ localize('title') }}</th>
                                <th>{{ localize('category') }}</th>
                                <th class="text-end">{{ localize('read_hit') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestPosts as $post)
                                <tr>
                                    <td>
                                        @if ($appSettings && $post->language)
                                            <a href="{{ __url(($appSettings->language_id == $post->language->id ? null : $post->language->value . '/') . $post->encode_title) }}"
                                                target="_blank">
                                                {!! $post->title !!}
                                            </a>
                                        @else
                                            {!! $post->title !!}
                                        @endif
                                    </td>
                                    <td>{{ $post->category?->category_name ?? '-' }}</td>
                                    <td class="text-end">{{ number_format($post->reader_hit ?? 0) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">{{ localize('empty_data') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($latestPosts->hasPages())
                    <div class="card-footer">
                        {{ $latestPosts->appends($filters)->appends([
                            'latest_drafts_page' => request('latest_drafts_page'),
                            'popular_posts_page' => request('popular_posts_page'),
                        ])->links() }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('popular_posts') }}</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered align-middle table-sm">
                        <thead>
                            <tr>
                                <th>{{ localize('title') }}</th>
                                <th>{{ localize('category') }}</th>
                                <th class="text-end">{{ localize('read_hit') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($popularPosts as $post)
                                <tr>
                                    <td>
                                        @if ($appSettings && $post->language)
                                            <a href="{{ __url(($appSettings->language_id == $post->language->id ? null : $post->language->value . '/') . $post->encode_title) }}"
                                                target="_blank">
                                                {!! $post->title !!}
                                            </a>
                                        @else
                                            {!! $post->title !!}
                                        @endif
                                    </td>
                                    <td>{{ $post->category?->category_name ?? '-' }}</td>
                                    <td class="text-end">{{ number_format($post->reader_hit ?? 0) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">{{ localize('empty_data') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($popularPosts->hasPages())
                    <div class="card-footer">
                        {{ $popularPosts->appends($filters)->appends([
                            'latest_drafts_page' => request('latest_drafts_page'),
                            'latest_posts_page' => request('latest_posts_page'),
                        ])->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('recent_comments') }}</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered align-middle table-sm">
                        <thead>
                            <tr>
                                <th>{{ localize('comments') }}</th>
                                <th>{{ localize('post') }}</th>
                                <th class="text-center">{{ localize('status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentComments as $comment)
                                <tr>
                                    <td>{{ \Illuminate\Support\Str::limit($comment->comment, 80) }}</td>
                                    <td>{{ $comment->newsMst?->title ?? '-' }}</td>
                                    <td class="text-center">
                                        @if ($comment->is_approved)
                                            <span class="badge bg-success">{{ localize('approved') }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ localize('pending') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">{{ localize('empty_data') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('top_reporters') }}</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered align-middle table-sm">
                        <thead>
                            <tr>
                                <th>{{ localize('reporter') }}</th>
                                <th class="text-end">{{ localize('total_posts') }}</th>
                                <th class="text-end">{{ localize('total_views') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($topReporters as $rep)
                                <tr>
                                    <td>{{ $rep->name }}</td>
                                    <td class="text-end">{{ number_format($rep->total_posts) }}</td>
                                    <td class="text-end">{{ number_format($rep->total_views) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">{{ localize('empty_data') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('backend/assets/plugins/apexcharts/dist/apexcharts.js') }}"></script>
    <script>
        const trendLabels = @json($trendLabels);
        const trendPosts = @json($trendPosts);
        const trendViews = @json($trendViews);
        const trendComments = @json($trendComments);

        const trendOptions = {
            series: [{
                    name: "{{ localize('posts') }}",
                    data: trendPosts
                },
                {
                    name: "{{ localize('read_hit') }}",
                    data: trendViews
                },
                {
                    name: "{{ localize('comments') }}",
                    data: trendComments
                }
            ],
            chart: {
                type: 'area',
                height: 320,
                toolbar: { show: false }
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 2 },
            xaxis: { categories: trendLabels },
            colors: ['#1e90ff', '#28a745', '#ffc107'],
            legend: { position: 'top' }
        };
        new ApexCharts(document.querySelector("#trendChart"), trendOptions).render();

        const categoryLabels = @json($categoryChartLabels);
        const categoryViews = @json($categoryChartViews);

        const categoryOptions = {
            series: [{ name: "{{ localize('total_views') }}", data: categoryViews }],
            chart: { type: 'bar', height: 320, toolbar: { show: false } },
            plotOptions: { bar: { horizontal: true, barHeight: '60%' } },
            dataLabels: { enabled: false },
            xaxis: { categories: categoryLabels },
            colors: ['#6f42c1']
        };
        new ApexCharts(document.querySelector("#categoryChart"), categoryOptions).render();

        const viewTrendOptions = {
            series: [{
                name: "{{ localize('total_views') }}",
                data: trendViews
            }],
            chart: { type: 'line', height: 180, toolbar: { show: false }, sparkline: { enabled: true } },
            stroke: { curve: 'smooth', width: 2 },
            colors: ['#17a2b8'],
            tooltip: { enabled: true }
        };
        new ApexCharts(document.querySelector("#viewTrendChart"), viewTrendOptions).render();

        const countryLabels = @json($countryViewLabels);
        const countryValues = @json($countryViewValues);

        const countryOptions = {
            series: [{ name: "{{ localize('total_views') }}", data: countryValues }],
            chart: { type: 'bar', height: 320, toolbar: { show: false } },
            plotOptions: { bar: { horizontal: true, barHeight: '60%' } },
            dataLabels: { enabled: false },
            xaxis: { categories: countryLabels },
            colors: ['#ff6b6b']
        };

        const countryChart = new ApexCharts(document.querySelector("#countryViewChart"), {
            ...countryOptions,
            chart: { type: 'bar', height: 260, toolbar: { show: false } },
            plotOptions: { bar: { horizontal: true, barHeight: '60%' } }
        });
        countryChart.render();

        const divisionLabels = @json($divisionViewLabels);
        const divisionValues = @json($divisionViewValues);

        const divisionChart = new ApexCharts(document.querySelector("#divisionViewChart"), {
            series: [{ name: "{{ localize('total_views') }}", data: divisionValues }],
            chart: { type: 'bar', height: 260, toolbar: { show: false } },
            plotOptions: { bar: { horizontal: true, barHeight: '60%' } },
            dataLabels: { enabled: false },
            xaxis: { categories: divisionLabels },
            colors: ['#4dabf7']
        });
        divisionChart.render();

        const areaTabButtons = document.querySelectorAll('#areaViewTabs button[data-bs-toggle="tab"]');
        areaTabButtons.forEach((button) => {
            button.addEventListener('shown.bs.tab', () => {
                if (countryChart?.resize) countryChart.resize();
                if (divisionChart?.resize) divisionChart.resize();
            });
        });
    </script>
@endpush
