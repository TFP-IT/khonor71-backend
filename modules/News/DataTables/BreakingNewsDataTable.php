<?php

namespace Modules\News\DataTables;

use App\Models\BreakingNews;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BreakingNewsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('title', function ($row) {
                return e($row->headline);
            })
            ->editColumn('url', function ($row) {
                $url = $row->resolved_url;
                if (!$url) {
                    return '<span class="text-muted">-</span>';
                }
                $displayUrl = Str::limit($url, 35);
                return '<a href="' . e($url) . '" target="_blank" rel="noopener noreferrer" class="text-primary text-break" title="' . e($url) . '">' . e($displayUrl) . ' <i class="fas fa-external-link-alt fa-xs"></i></a>';
            })
            ->editColumn('priority', function ($row) {
                return '<span class="badge bg-light text-dark border px-2 py-1 fs-12">' . (int) $row->priority . '</span>';
            })
            ->addColumn('schedule', function ($row) {
                $html = '<div class="small">';
                $start = $row->start_time ? Carbon::parse($row->start_time)->format('d M Y, h:i A') : localize('immediate');
                $end   = $row->end_time ? Carbon::parse($row->end_time)->format('d M Y, h:i A') : localize('permanent');
                $html .= '<div><span class="text-muted">' . localize('start') . ':</span> ' . e($start) . '</div>';
                $html .= '<div><span class="text-muted">' . localize('end') . ':</span> ' . e($end) . '</div>';

                if ($row->status == 0) {
                    $html .= '<span class="badge bg-secondary text-white mt-1">' . localize('inactive') . '</span>';
                } elseif ($row->start_time && Carbon::parse($row->start_time)->isFuture()) {
                    $html .= '<span class="badge bg-info text-white mt-1">' . localize('scheduled') . '</span>';
                } elseif ($row->end_time && Carbon::parse($row->end_time)->isPast()) {
                    $html .= '<span class="badge bg-warning text-dark mt-1">' . localize('expired') . '</span>';
                } else {
                    $html .= '<span class="badge bg-success text-white mt-1">' . localize('active_now') . '</span>';
                }
                $html .= '</div>';
                return $html;
            })
            ->addColumn('status', function ($row) {
                if (!auth()->user()->can('update_breaking_news')) {
                    return $row->status == 1
                        ? '<span class="badge bg-success">' . localize('active') . '</span>'
                        : '<span class="badge bg-danger">' . localize('inactive') . '</span>';
                }

                if ($row->status == 1) {
                    return '<button type="button" class="btn btn-sm btn-success toggle-breaking-status" data-action="' . route('news.breaking-news.update-status', ['breaking_news' => $row->id]) . '" data-status="0" title="' . localize('deactivate') . '"><i class="fa fa-toggle-on me-1"></i> ' . localize('active') . '</button>';
                } else {
                    return '<button type="button" class="btn btn-sm btn-secondary toggle-breaking-status" data-action="' . route('news.breaking-news.update-status', ['breaking_news' => $row->id]) . '" data-status="1" title="' . localize('activate') . '"><i class="fa fa-toggle-off me-1"></i> ' . localize('inactive') . '</button>';
                }
            })
            ->editColumn('language_id', function ($row) {
                return $row->language->langname ?? '-';
            })
            ->addColumn('action', function ($row) {
                $button = '';

                if (auth()->user()->can('update_breaking_news')) {
                    $button .= '<a href="javascript:void(0);" class="btn btn-info-soft btn-sm m-1 edit-breaking-news-button" title="' . localize("Edit") . '" data-action="' . route('news.breaking-news.update', ['breaking_news' => $row->id]) . '" data-route="' . route('news.breaking-news.edit', ['breaking_news' => $row->id]) . '"><i class="fa fa-edit"></i></a>';
                }

                if (auth()->user()->can('delete_breaking_news')) {
                    $button .= '<a href="javascript:void(0)" class="btn btn-danger-soft btn-sm mt-sm-1 mt-lg-0 delete-button" data-bs-toggle="tooltip" title="' . localize("delete") . '" data-action="' . route('news.breaking-news.destroy', ['breaking_news' => $row->id]) . '" ><i class="fas fa-trash-alt"></i></a>';
                }

                return $button;
            })
            ->rawColumns(['url', 'priority', 'schedule', 'status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param BreakingNews $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BreakingNews $model)
    {
        return $model->newQuery()
            ->with('language')
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('breaking-news-table')
            ->setTableAttribute('class', 'table table-hover table-bordered align-middle table-sm')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->language([
                'processing' => '<div class="lds-spinner">
                <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
            ])
            ->responsive(true)
            ->selectStyleSingle()
            ->lengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']])
            ->dom("<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>rt<'bottom'<'row'<'col-md-6'i><'col-md-6'p>>><'clear'>")
            ->buttons([
                Button::make('csv')
                    ->className('btn btn-secondary buttons-csv buttons-html5 btn-sm prints')
                    ->text('<i class="fa fa-file-csv"></i> CSV')->exportOptions(['columns' => [0, 1, 2, 3, 4, 5, 6]]),
                Button::make('excel')
                    ->className('btn btn-secondary buttons-excel buttons-html5 btn-sm prints')
                    ->text('<i class="fa fa-file-excel"></i> Excel')
                    ->extend('excelHtml5')->exportOptions(['columns' => [0, 1, 2, 3, 4, 5, 6]]),
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title(localize('sl'))
                ->addClass('text-center column-sl')
                ->width(40)
                ->searchable(false)
                ->orderable(false),

            Column::make('title')->title(localize('breaking_post')),
            Column::make('url')->title(localize('article_url') ?: 'Article URL')->orderable(false),
            Column::make('priority')->title(localize('priority') ?: 'Priority')->addClass('text-center')->width(80),
            Column::make('schedule')->title(localize('schedule') ?: 'Schedule')->orderable(false)->searchable(false),
            Column::make('status')->title(localize('status') ?: 'Status')->addClass('text-center')->width(110)->orderable(false)->searchable(false),
            Column::make('language_id')
                ->title(localize('language'))
                ->searchable(false)
                ->orderable(false),
            Column::make('action')
                ->title(localize('action'))->addClass('column-sl text-center')->orderable(false)
                ->searchable(false)
                ->printable(false)
                ->exportable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Breaking_News_' . date('YmdHis');
    }
}
