<?php

namespace Modules\Setting\Http\DataTables;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ActivityTrackingDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('created_at_formatted', function ($row) {
                $dt = Carbon::parse($row->created_at);
                return '<div class="fw-semibold">' . $dt->format('d M Y, h:i A') . '</div>'
                    . '<small class="text-muted">' . $dt->diffForHumans() . '</small>';
            })
            ->addColumn('causer_info', function ($row) {
                $causer = $row->causer;
                if (!$causer) {
                    $attempted = $row->properties['attempted_email'] ?? null;
                    if ($attempted) {
                        return '<span class="text-muted"><i class="fas fa-user-secret me-1"></i>Guest (' . e($attempted) . ')</span>';
                    }
                    return '<span class="text-muted"><i class="fas fa-robot me-1"></i>System / Console</span>';
                }

                $avatarUrl = !empty($causer->profile_image)
                    ? asset('storage/' . $causer->profile_image)
                    : asset('backend/assets/dist/img/avatar.png');

                $roles = method_exists($causer, 'getRoleNames') ? $causer->getRoleNames()->implode(', ') : '';
                $roleBadge = $roles ? '<span class="badge bg-secondary rounded-pill ms-1" style="font-size: 10px;">' . e($roles) . '</span>' : '';

                return '<div class="d-flex align-items-center">'
                    . '<img src="' . $avatarUrl . '" class="rounded-circle me-2" width="32" height="32" style="object-fit:cover;" onerror="this.src=\'data:image/svg+xml;utf8,<svg xmlns=\\\'http://www.w3.org/2000/svg\\\' width=\\\'32\\\' height=\\\'32\\\' viewBox=\\\'0 0 32 32\\\'><rect width=\\\'32\\\' height=\\\'32\\\' fill=\\\'%23dee2e6\\\'/><text x=\\\'16\\\' y=\\\'20\\\' font-size=\\\'12\\\' text-anchor=\\\'middle\\\' fill=\\\'%236c757d\\\'>?</text></svg>\'">'
                    . '<div>'
                    . '<div class="fw-semibold">' . e($causer->full_name ?? $causer->user_name ?? 'User #' . $causer->id) . $roleBadge . '</div>'
                    . '<small class="text-muted">' . e($causer->email ?? '') . '</small>'
                    . '</div></div>';
            })
            ->addColumn('event_badge', function ($row) {
                $event = strtolower($row->event ?? $row->description ?? 'action');
                $badgeClass = match ($event) {
                    'created' => 'bg-success',
                    'updated' => 'bg-warning text-dark',
                    'deleted' => 'bg-danger',
                    'login' => 'bg-info text-dark',
                    'logout' => 'bg-secondary',
                    'failed_login' => 'bg-dark',
                    'published' => 'bg-success',
                    default => 'bg-primary',
                };

                $icon = match ($event) {
                    'created' => 'fa-plus-circle',
                    'updated' => 'fa-edit',
                    'deleted' => 'fa-trash-alt',
                    'login' => 'fa-sign-in-alt',
                    'logout' => 'fa-sign-out-alt',
                    'failed_login' => 'fa-exclamation-triangle',
                    default => 'fa-history',
                };

                return '<span class="badge ' . $badgeClass . ' rounded-pill px-2 py-1">'
                    . '<i class="fas ' . $icon . ' me-1"></i>' . ucfirst(str_replace('_', ' ', $event))
                    . '</span>';
            })
            ->addColumn('subject_info', function ($row) {
                $logName = $row->log_name ? '<span class="badge bg-light text-dark border me-1">' . e($row->log_name) . '</span>' : '';
                $subject = $row->subject;

                if (!$subject && !$row->subject_type) {
                    return $logName . '<span class="text-muted">' . e($row->description) . '</span>';
                }

                $subjectTitle = '';
                $link = '';

                if ($subject) {
                    if (isset($subject->title)) {
                        $subjectTitle = $subject->title;
                    } elseif (isset($subject->full_name)) {
                        $subjectTitle = $subject->full_name;
                    } elseif (isset($subject->name)) {
                        $subjectTitle = $subject->name;
                    } elseif (isset($subject->category_name)) {
                        $subjectTitle = $subject->category_name;
                    } elseif (isset($subject->platform)) {
                        $subjectTitle = ucfirst($subject->platform);
                    } elseif (isset($subject->event)) {
                        $subjectTitle = ucfirst(str_replace('_', ' ', $subject->event));
                    } elseif (isset($subject->headline)) {
                        $subjectTitle = $subject->headline;
                    } elseif (isset($subject->cat_name)) {
                        $subjectTitle = $subject->cat_name . ' (Pos #' . ($subject->position_no ?? '-') . ')';
                    } elseif (isset($subject->link_url)) {
                        $subjectTitle = $subject->link_url;
                    }

                    // Link generation if available
                    if ($row->subject_type === 'App\Models\NewsMst') {
                        $link = route('news.edit', ['news' => $subject->id]);
                    } elseif ($row->subject_type === 'App\Models\User') {
                        $link = route('role.user.list');
                    }
                }

                $displayText = $subjectTitle ? e(mb_strimwidth($subjectTitle, 0, 45, '...')) : ('#' . $row->subject_id);

                if ($link) {
                    return $logName . '<a href="' . $link . '" target="_blank" class="fw-semibold text-primary" title="' . e($subjectTitle) . '">'
                        . $displayText . ' <i class="fas fa-external-link-alt ms-1" style="font-size:10px;"></i></a>';
                }

                return $logName . '<span class="fw-semibold">' . $displayText . '</span>';
            })
            ->addColumn('ip_info', function ($row) {
                $ip = $row->properties['ip'] ?? '-';
                $ua = $row->properties['user_agent'] ?? '';
                $shortUa = $ua ? mb_strimwidth($ua, 0, 30, '...') : '';
                return '<div><code>' . e($ip) . '</code></div>'
                    . ($shortUa ? '<small class="text-muted" title="' . e($ua) . '">' . e($shortUa) . '</small>' : '');
            })
            ->addColumn('action_button', function ($row) {
                return '<button type="button" class="btn btn-outline-primary btn-sm rounded-pill view-activity-details" data-id="' . $row->id . '">'
                    . '<i class="fas fa-eye me-1"></i>' . localize('details')
                    . '</button>';
            })
            ->rawColumns(['created_at_formatted', 'causer_info', 'event_badge', 'subject_info', 'ip_info', 'action_button']);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Activity $model): QueryBuilder
    {
        $userId   = $this->request->get('user_id');
        $event    = $this->request->get('event');
        $logName  = $this->request->get('log_name');
        $fromDate = $this->request->get('from_date');
        $toDate   = $this->request->get('to_date');

        return $model->newQuery()
            ->with(['causer', 'subject'])
            ->when($userId, function ($query) use ($userId) {
                return $query->where('causer_id', $userId);
            })
            ->when($event, function ($query) use ($event) {
                return $query->where('event', $event);
            })
            ->when($logName, function ($query) use ($logName) {
                return $query->where('log_name', $logName);
            })
            ->when($fromDate, function ($query) use ($fromDate) {
                return $query->whereDate('created_at', '>=', $fromDate);
            })
            ->when($toDate, function ($query) use ($toDate) {
                return $query->whereDate('created_at', '<=', $toDate);
            })
            ->latest('id');
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('activity-tracking-table')
            ->setTableAttribute('class', 'table table-hover table-bordered align-middle')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->language([
                'processing' => '<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
            ])
            ->selectStyleSingle()
            ->lengthMenu([[10, 25, 50, 100], [10, 25, 50, 100]])
            ->dom("<'row mb-3'<'col-md-6'l><'col-md-6'f>>rt<'bottom'<'row'<'col-md-6'i><'col-md-6'p>>><'clear'>")
            ->parameters([
                'order' => [[1, 'desc']],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title(localize('sl'))
                ->width(40)
                ->addClass('text-center')
                ->searchable(false)
                ->orderable(false),
            Column::computed('created_at_formatted', localize('date_time'))
                ->data('created_at_formatted')
                ->orderable(false)
                ->searchable(false),
            Column::computed('causer_info', localize('user'))
                ->data('causer_info')
                ->orderable(false)
                ->searchable(false),
            Column::computed('event_badge', localize('action'))
                ->data('event_badge')
                ->orderable(false)
                ->searchable(false),
            Column::computed('subject_info', localize('subject'))
                ->data('subject_info')
                ->orderable(false)
                ->searchable(false),
            Column::computed('ip_info', localize('ip'))
                ->data('ip_info')
                ->orderable(false)
                ->searchable(false),
            Column::computed('action_button', localize('action'))
                ->data('action_button')
                ->width(80)
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false),
        ];
    }
}
