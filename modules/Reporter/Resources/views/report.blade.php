@extends('backend.layouts.app')
@section('title', localize('report') . ' - ' . ($reporter->name ?? localize('reporter')))

@section('content')
    @include('backend.layouts.common.validation')
    @include('backend.layouts.common.message')

    @php
        $reporterPhoto = $reporter->photo
            ? asset('storage/' . $reporter->photo)
            : asset('backend/assets/dist/img/signature_signature.jpg');
        $statusClass = $reporter->status == 1 ? 'badge bg-success' : 'badge bg-danger';
        $statusLabel = $reporter->status == 1 ? localize('active') : localize('inactive');
        $activeTab = request('tab', 'reports');
    @endphp

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('reporter') }} {{ localize('report') }}</h6>
                    <small class="text-muted">{{ localize('reporter_id') }}: {{ $reporter->reporter_id ?? '-' }}</small>
                </div>
                <div class="text-end">
                    <a href="{{ route('reporter.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> {{ localize('back') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ $reporterPhoto }}" alt="{{ $reporter->name ?? localize('reporter') }}"
                        class="img-fluid rounded border" style="max-height: 140px;">
                </div>
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <div class="text-muted">{{ localize('full_name') }}</div>
                            <div class="fw-semibold">{{ $reporter->name ?? '-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted">{{ localize('email') }}</div>
                            <div class="fw-semibold">{{ $reporter->email ?? '-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted">{{ localize('mobile') }}</div>
                            <div class="fw-semibold">{{ $reporter->mobile ?? '-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted">{{ localize('department') }}</div>
                            <div class="fw-semibold">{{ $department?->department_name ?? '-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted">{{ localize('designation') }}</div>
                            <div class="fw-semibold">{{ $reporter->designation ?? '-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted">{{ localize('status') }}</div>
                            <span class="{{ $statusClass }}">{{ $statusLabel }}</span>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted">{{ localize('address') }}</div>
                            <div class="fw-semibold">{{ $reporter->address_one ?? '-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted">{{ localize('city') }}</div>
                            <div class="fw-semibold">{{ $reporter->city ?? '-' }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-muted">{{ localize('country') }}</div>
                            <div class="fw-semibold">{{ $reporter->country ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-primary fs-2"><i class="fas fa-newspaper"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('total_reports') }}</div>
                        <div class="fs-18 fw-bold">{{ $totalNews }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-success fs-2"><i class="fas fa-check-circle"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('publish') }}</div>
                        <div class="fs-18 fw-bold">{{ $publishedNews }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-warning fs-2"><i class="fas fa-clock"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('unpublish') }}</div>
                        <div class="fs-18 fw-bold">{{ $unpublishedNews }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-info fs-2"><i class="fas fa-eye"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('read_hit') }}</div>
                        <div class="fs-18 fw-bold">{{ number_format($totalNewsViews) }}</div>
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
                        <div class="fs-18 fw-bold">{{ $totalVideoNews }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-secondary fs-2"><i class="fas fa-play-circle"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('total_views') }}</div>
                        <div class="fs-18 fw-bold">{{ number_format($totalVideoViews) }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="text-muted fs-2"><i class="fas fa-clipboard-list"></i></div>
                    <div>
                        <div class="text-muted">{{ localize('access_log') }}</div>
                        <div class="fs-18 fw-bold">{{ $totalActivities }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ $activeTab === 'reports' ? 'active' : '' }}"
                        href="{{ request()->fullUrlWithQuery(['tab' => 'reports']) }}">
                        <i class="fas fa-newspaper"></i> {{ localize('reports') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $activeTab === 'activity' ? 'active' : '' }}"
                        href="{{ request()->fullUrlWithQuery(['tab' => 'activity']) }}">
                        <i class="fas fa-history"></i> {{ localize('access_log') }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade {{ $activeTab === 'reports' ? 'show active' : '' }}" id="reports-tab">
                    <form method="GET" class="row g-2 align-items-end mb-3">
                        <input type="hidden" name="tab" value="reports">
                        <input type="hidden" name="activity_period" value="{{ $activityPeriod }}">
                        <div class="col-md-3 col-sm-6">
                            <label class="form-label">{{ localize('filter') }}</label>
                            <select name="reports_period" class="form-control select-basic-single">
                                <option value="">{{ localize('all') }}</option>
                                <option value="daily" @selected($reportsPeriod === 'daily')>{{ localize('daily') }}</option>
                                <option value="weekly" @selected($reportsPeriod === 'weekly')>{{ localize('weekly') }}</option>
                                <option value="monthly" @selected($reportsPeriod === 'monthly')>{{ localize('monthly') }}</option>
                                <option value="yearly" @selected($reportsPeriod === 'yearly')>{{ localize('yearly') }}</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <button type="submit" class="btn btn-success">{{ localize('filter') }}</button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ localize('sl') }}</th>
                                    <th>{{ localize('title') }}</th>
                                    <th>{{ localize('category') }}</th>
                                    <th>{{ localize('language') }}</th>
                                    <th>{{ localize('publish_date') }}</th>
                                    <th>{{ localize('status') }}</th>
                                    <th class="text-end">{{ localize('read_hit') }}</th>
                                    <th class="text-center">{{ localize('action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($newsReports as $index => $news)
                                    <tr>
                                        <td class="text-center">{{ $newsReports->firstItem() + $index }}</td>
                                        <td>{!! $news->title !!}</td>
                                        <td>{{ $news->category?->category_name ?? '-' }}</td>
                                        <td>{{ $news->language?->langname ?? '-' }}</td>
                                        <td>{{ $news->publish_date?->format('Y-m-d h:i A') ?? '-' }}</td>
                                        <td>
                                            @if ($news->status == 1)
                                                <span class="badge bg-success">{{ localize('publish') }}</span>
                                            @else
                                                <span class="badge bg-warning">{{ localize('unpublish') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-end">{{ number_format($news->reader_hit ?? 0) }}</td>
                                        <td class="text-center">
                                            @if ($appSettings && $news->language)
                                                <a href="{{ __url(($appSettings->language_id == $news->language->id ? null : $news->language->value . '/') . $news->encode_title) }}"
                                                    class="btn btn-success-soft btn-sm" data-bs-toggle="tooltip"
                                                    title="{{ localize('view') }}" target="_blank">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @endif
                                            @can('update_news')
                                                <a href="{{ route('news.edit', ['news' => $news->id]) }}"
                                                    class="btn btn-success-soft btn-sm" data-bs-toggle="tooltip"
                                                    title="{{ localize('update') }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">{{ localize('empty_data') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($newsReports->hasPages())
                        <div class="mt-3">
                            {{ $newsReports->appends([
                                'tab' => 'reports',
                                'activity_page' => request('activity_page'),
                            ])->links() }}
                        </div>
                    @endif
                </div>

                <div class="tab-pane fade {{ $activeTab === 'activity' ? 'show active' : '' }}" id="activity-tab">
                    <form method="GET" class="row g-2 align-items-end mb-3">
                        <input type="hidden" name="tab" value="activity">
                        <input type="hidden" name="reports_period" value="{{ $reportsPeriod }}">
                        <div class="col-md-3 col-sm-6">
                            <label class="form-label">{{ localize('filter') }}</label>
                            <select name="activity_period" class="form-control select-basic-single">
                                <option value="">{{ localize('all') }}</option>
                                <option value="daily" @selected($activityPeriod === 'daily')>{{ localize('daily') }}</option>
                                <option value="weekly" @selected($activityPeriod === 'weekly')>{{ localize('weekly') }}</option>
                                <option value="monthly" @selected($activityPeriod === 'monthly')>{{ localize('monthly') }}</option>
                                <option value="yearly" @selected($activityPeriod === 'yearly')>{{ localize('yearly') }}</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <button type="submit" class="btn btn-success">{{ localize('filter') }}</button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ localize('sl') }}</th>
                                    <th>{{ localize('date') }}</th>
                                    <th>{{ localize('log_name') }}</th>
                                    <th>{{ localize('description') }}</th>
                                    <th>{{ localize('event') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($activityLogs as $index => $log)
                                    <tr>
                                        <td class="text-center">{{ $activityLogs->firstItem() + $index }}</td>
                                        <td>{{ $log->created_at?->format('Y-m-d H:i:s') ?? '-' }}</td>
                                        <td>{{ $log->log_name ?? '-' }}</td>
                                        <td>{{ $log->description ?? '-' }}</td>
                                        <td>{{ $log->event ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">{{ localize('empty_data') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($activityLogs->hasPages())
                        <div class="mt-3">
                            {{ $activityLogs->appends([
                                'tab' => 'activity',
                                'reports_page' => request('reports_page'),
                            ])->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
