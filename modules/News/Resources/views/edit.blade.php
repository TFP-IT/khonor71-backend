@extends('backend.layouts.app')
@section('title', localize_uc('update_post'))
@push('css')
    <link href="{{ asset('backend/assets/plugins/Bootstrap-5-Tag-Input/tagsinput.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('backend.layouts.common.message')
    <div class="card mb-4">
        <div class="card-header border-bottom-0 pb-0">
            <ul class="nav nav-tabs card-header-tabs" id="newsEditTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-semibold" id="edit-form-tab" data-bs-toggle="tab" data-bs-target="#edit-form-pane" type="button" role="tab" aria-controls="edit-form-pane" aria-selected="true">
                        <i class="fas fa-edit me-1"></i> {{ localize_uc('update_post') }}
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-semibold" id="history-tab" data-bs-toggle="tab" data-bs-target="#history-pane" type="button" role="tab" aria-controls="history-pane" aria-selected="false">
                        <i class="fas fa-history me-1"></i> History (পরিবর্তন ইতিহাস)
                        @if(isset($activities) && count($activities) > 0)
                            <span class="badge bg-secondary rounded-pill ms-1">{{ count($activities) }}</span>
                        @endif
                    </button>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="newsEditTabContent">
                <div class="tab-pane fade show active" id="edit-form-pane" role="tabpanel" aria-labelledby="edit-form-tab">
                    <div class="table_customize">
                        <form action="{{ route('news.update', ['news' => $newsMst->id]) }}" class="needs-validation" data="showCallBackUpdateData" id="newsDetailsForm"
                            novalidate="" method="POST" enctype="multipart/form-data" data-redirect-url="{{ route('news.index') }}">
                            @csrf
                            @method('patch')

                            @include('news::form')

                            <div class="row row ps-4 pe-4">
                                <div class="col-md-12 mt-3 text-start">
                                    <button type="reset" class="btn btn-danger" title="{{ localize('reset') }}">
                                        <i class="fa fa-undo-alt"></i>
                                    </button>
                                    <button type="submit" class="btn btn-success">
                                        {{ localize('update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="history-pane" role="tabpanel" aria-labelledby="history-tab">
                    @include('news::post.history', ['activities' => $activities ?? collect()])
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="image_up" value="{{ route('page.ckeditor_upload', ['_token' => csrf_token()]) }}">

    <x-common-modal modalId="report_modal" :modalTitle="localize('Reporter')" modalDialog="modal-md">
        <form action="{{ route('news.storeReport') }}" method="post" class="needs-validation" data="showCallBackData"
            novalidate="">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-12 col-xl-12">
                            <label for="name" class="col-form-label fw-semibold">{{ localize_uc('name') }} <span
                                    class="text-danger">*</span> </label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="{{ localize_uc('enter_reporter_name') }}" value="{{ old('name') }}"
                                required>
                            <div class="invalid-feedback error text-danger m-2">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-12 col-xl-12">
                            <label for="designation" class="col-form-label fw-semibold">{{ localize_uc('designation') }}
                                <span class="text-danger">*</span> </label>
                            <input type="text" name="designation" id="designation"
                                class="form-control @error('designation') is-invalid @enderror"
                                placeholder="{{ localize_uc('enter_designation') }}" value="{{ old('designation') }}"
                                required>
                            <div class="invalid-feedback error text-danger m-2">
                                @error('designation')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-12 col-xl-12">
                            <label for="photo" class="col-form-label fw-semibold">
                                {{ localize_uc('photo') }}
                            </label>
                            <input type="file" name="photo" id="photo"
                                class="form-control @error('photo') is-invalid @enderror"
                                placeholder="{{ localize_uc('enter_photo') }}" value="{{ old('photo') }}"
                                accept="image/*" />
                            <div class="invalid-feedback error text-danger m-2">
                                @error('photo')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row gap-3 py-3">
                <button type="reset" class="btn btn-danger w-25" title="{{ localize('Reset') }}">
                    <i class="fa fa-undo-alt"></i>
                </button>
                <button type="submit" class="btn btn-success w-75"
                    id="blogFormActionBtn">{{ localize('Create') }}</button>
            </div>
        </form>
    </x-common-modal>

@endsection

@push('js')
    <script src="{{ asset('backend/assets/plugins/Bootstrap-5-Tag-Input/tagsinput.js') }}"></script>
    <script src="{{ module_asset('News/js/news.js') }}"></script>
@endpush
