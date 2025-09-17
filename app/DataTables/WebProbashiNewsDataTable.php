<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\ProbashiJanala\Entities\ProbashiNews;
use Illuminate\Support\Facades\Auth;

class WebProbashiNewsDataTable extends DataTable
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
            ->editColumn('language_id', function ($row) {
                return $row->language->langname ?? 'N/A';
            })
            ->editColumn('web_user_id', function ($row) {
                return $row->webUser->name ?? 'N/A';
            })
            ->editColumn('thumbnail_image', function ($row) {
                $image = $row->thumbnail_image ? asset('storage/' . $row->thumbnail_image) : asset('backend/assets/dist/img/nopreview.jpeg');
                return '<img src="' . $image . '" alt="Image" height="100" width="150" style="border: 1px solid #e1e9f1;">';
            })
            ->editColumn('video', function ($row) {
                if ($row->video) {
                    $video_path = asset('storage/' . $row->video);
                    return '<video height="100" width="150" controls style="border: 1px solid #e1e9f1;">
                                <source src="' . $video_path . '" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>';
                } elseif ($row->video_url) {
                    $embedUrl = str_replace("watch?v=", "embed/", $row->video_url);
                    $embedUrl = str_replace("youtu.be/", "www.youtube.com/embed/", $embedUrl);
                    return '<iframe width="150" height="100" src="' . $embedUrl . '" frameborder="0" allowfullscreen></iframe>';
                }
                return '<img src="' . asset('backend/assets/dist/img/video_thumb.png') . '" alt="No video" height="100" width="150" style="border: 1px solid #e1e9f1;">';
            })
            ->editColumn('total_view', function ($row) {
                return number_format($row->total_view);
            })
            ->editColumn('publish_date', function ($row) {
                return \Carbon\Carbon::parse($row->publish_date)->format('Y-m-d');
            })
            ->editColumn('created_at', function ($row) {
                return \Carbon\Carbon::parse($row->created_at)->format('Y-m-d');
            })
            ->addColumn('action', function ($row) {
                $button = '';
                $button .= '<a href="' . route('web.probashi-news.edit', ['probashiNews' => $row->id]) . '" class="btn btn-success-soft btn-sm me-1"><i class="fas fa-edit"></i></a>';
                $button .= '<a href="javascript:void(0)" class="btn btn-danger-soft btn-sm delete-confirm-data-table" data-bs-toggle="tooltip" title="Delete" data-route="' . route('web.probashi-news.destroy', $row->id) . '" data-csrf="' . csrf_token() . '"><i class="fas fa-trash-alt"></i></a>';
                return $button;
            })
            ->rawColumns(['thumbnail_image', 'video', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param ProbashiNews $model
     * @return QueryBuilder
     */
    public function query(ProbashiNews $model): QueryBuilder
    {
        return $model->newQuery()
            ->where('web_user_id', Auth::guard('webuser')->id()) // Fixed guard name
            ->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
{
    return $this->builder()
        ->setTableId('web-probashinews-table')
        ->setTableAttribute('class', 'table table-hover table-bordered align-middle table-sm')
        ->columns($this->getColumns())
        ->ajax(route('web.probashi-news.data')) // Add this line with your specific route
        ->language([
            'processing' => '<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>',
        ])
        ->responsive(true)
        ->selectStyleSingle()
        ->lengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']])
        ->dom("<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>rt<'bottom'<'row'<'col-md-6'i><'col-md-6'p>>><'clear'>")
        ->buttons([
            Button::make('csv')
                ->className('btn btn-secondary btn-sm')
                ->text('<i class="fa fa-file-csv"></i> CSV')
                ->exportOptions(['columns' => [0, 3, 4, 5, 6, 7, 8]]),
            Button::make('excel')
                ->className('btn btn-secondary btn-sm')
                ->text('<i class="fa fa-file-excel"></i> Excel')
                ->exportOptions(['columns' => [0, 3, 4, 5, 6, 7, 8]]),
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
                ->addClass('text-center')
                ->width(50)
                ->searchable(false)
                ->orderable(false),
            Column::make('thumbnail_image')
                ->title(localize('thumbnail_image'))
                ->width(150)
                ->orderable(false),
            Column::make('video')
                ->title(localize('video'))
                ->width(150)
                ->orderable(false),
            Column::make('title')
                ->title(localize('title')),
            Column::make('web_user_id')
                ->title(localize('post_by')),
            Column::make('total_view')
                ->title(localize('views')),
            Column::make('publish_date')
                ->title(localize('release_date')),
            Column::make('created_at')
                ->title(localize('post_date')),
            Column::make('language_id')
                ->title(localize('language'))
                ->searchable(false)
                ->orderable(false),
            Column::make('action')
                ->title(localize('action'))
                ->addClass('text-center')
                ->width(115)
                ->searchable(false)
                ->orderable(false)
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
        return 'WebProbashiNews_' . date('YmdHis');
    }
}