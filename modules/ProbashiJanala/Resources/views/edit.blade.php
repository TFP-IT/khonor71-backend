@extends('backend.layouts.app')
@section('title', localize_uc('update_probashi_news'))
@push('css')
    <link href="{{ asset('backend/assets/plugins/Bootstrap-5-Tag-Input/tagsinput.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('backend.layouts.common.validation')
    @include('backend.layouts.common.message')
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize_uc('update_probashi_news') }}</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table_customize">
                <form action="{{ route('probashijanala.update', $probashiNews->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row ps-4 pe-4">
                        <div class="col-12">
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="row form-group">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <label for="language_id" class="col-form-label fw-semibold">
                                                {{ localize_uc('language') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            
                                            <select name="language_id" id="language_id" class="form-control select-basic-single" required>
                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}" @selected(old('language_id', $probashiNews->language_id ?? get_language_id()) == $language->id)>
                                                        {{ $language->langname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                            @if ($errors->has('language_id'))
                                                <div class="error text-danger m-2">{{ $errors->first('language_id') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-lg-4">
                                    <div class="row form-group">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <label for="web_user_id" class="col-form-label fw-semibold">
                                                {{ localize_uc('web_user') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            
                                            <select name="web_user_id" id="web_user_id" class="form-control select-basic-single" 
                                                data-allow-clear="true" data-placeholder="{{ localize_uc('select_web_user') }}">
                                                <option value=""></option>
                                                @foreach ($webUsers as $webUser)
                                                    <option value="{{ $webUser->id }}" {{ $probashiNews->web_user_id == $webUser->id ? 'selected' : '' }}>
                                                        {{ $webUser->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('web_user_id'))
                                                <div class="error text-danger m-2">{{ $errors->first('web_user_id') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="row form-group">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <label for="publish_date" class="col-form-label fw-semibold">{{ localize_uc('release_date') }}
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="publish_date" id="publish_date"
                                                class="form-control date_picker @error('publish_date') is-invalid @enderror" autocomplete="off" 
                                                value="{{ $probashiNews->publish_date ? $probashiNews->publish_date->format('Y-m-d') : '' }}" required>
                                            
                                            @if ($errors->has('publish_date'))
                                                <div class="error text-danger m-2">{{ $errors->first('publish_date') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row ps-4 pe-4">
                        <div class="col-12">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <label for="title" class="col-form-label fw-semibold">
                                                {{ localize_uc('head_line') }} 
                                                <span class="text-danger">*</span> 
                                            </label>
                                        
                                            <input type="text" name="title" id="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="{{ localize_uc('enter_head_line') }}"
                                                value="{{ $probashiNews->title }}" required>
                                            
                                            @if ($errors->has('title'))
                                                <div class="error text-danger m-2">{{ $errors->first('title') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row ps-4 pe-4">
                        <div class="col-12 mt-2">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <label for="details" class="col-form-label fw-semibold">{{ localize_uc('details') }} <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="details" id="details" class="form-control"
                                                placeholder="{{ localize_uc('enter_details') }}" rows="10" cols="80" required>{{ $probashiNews->details }}</textarea>
                                            
                                            @if ($errors->has('details'))
                                                <div class="error text-danger m-2">{{ $errors->first('details') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row ps-4 pe-4">
                        <div class="col-12 mt-2">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    
                                    <div class="row form-group">  
                                        <div class="col-md-12">
                                            <label for="image" class="col-form-label fw-semibold">
                                                {{ localize('image') }}
                                            </label>

                                            <input type="file" class="form-control" id="image" name="image"
                                                aria-describedby="imageNote" accept="image/*" autocomplete="off">

                                            <div class="position-relative mt-2">
                                                <input type="hidden" id="defaultThumUrl" value="{{ asset('backend/assets/dist/img/signature_signature.jpg') }}">

                                                <img src="{{ $probashiNews->thumbnail_image ? asset('storage/' . $probashiNews->thumbnail_image) : asset('backend/assets/dist/img/signature_signature.jpg') }}" 
                                                    id="output" class="img-thumbnail" style="width: 100% !important; height: 280px !important;">
                                        
                                                @if ($probashiNews->thumbnail_image)
                                                    <a href="javascript:void(0)"
                                                        id="deleteImageBtn"
                                                        class="btn btn-danger btn-sm position-absolute probashinews-thumbnail-delete-btn"
                                                        style="top: 10px; right: 10px; z-index: 100;"
                                                        data-id="{{ $probashiNews->id }}"
                                                        data-route="{{ route('probashijanala.delete.image', $probashiNews->id) }}"
                                                        data-csrf="{{ csrf_token() }}"
                                                        data-bs-toggle="tooltip"
                                                        title="Delete Image">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row mt-2 pe-0">
                                            <div class="col-md-6">
                                                <label for="image_alt" class="col-form-label fw-semibold">
                                                    {{ localize_uc('image_alt') }} 
                                                </label>
                                            
                                                <input type="text" name="image_alt" id="image_alt"
                                                    class="form-control"
                                                    placeholder="{{ localize_uc('image_alt') }}"
                                                    value="{{ $probashiNews->image_alt }}">
                                                
                                                @if ($errors->has('image_alt'))
                                                    <div class="error text-danger m-2">{{ $errors->first('image_alt') }}</div>
                                                @endif
                                            </div>

                                            <div class="col-md-6 pe-0">
                                                <label for="image_title" class="col-form-label fw-semibold">
                                                    {{ localize_uc('image_title') }} 
                                                </label>
                                            
                                                <input type="text" name="image_title" id="image_title"
                                                    class="form-control"
                                                    placeholder="{{ localize_uc('image_title') }}"
                                                    value="{{ $probashiNews->image_title }}">
                                                
                                                @if ($errors->has('image_title'))
                                                    <div class="error text-danger m-2">{{ $errors->first('image_title') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row form-group">

                                        <div class="col-md-12">
                                            <label for="video" class="col-form-label fw-semibold">
                                                {{ localize('video') }}
                                            </label>
                                        
                                            <input type="file" class="form-control" id="video" name="video" accept="video/*" autocomplete="off">
                                        
                                            <div class="position-relative mt-2" id="videoContainer" style="width: 100%; height: auto;">
                                                <input type="hidden" id="defaultPosterUrl" value="{{ asset('backend/assets/dist/img/video_thumb.png') }}">

                                                @if ($probashiNews->video && !$is_iframe)
                                                    <a href="javascript:void(0)"
                                                       id="deleteVideoBtn"
                                                       class="btn btn-danger btn-sm position-absolute probashinews-delete-btn"
                                                       style="top: 10px; right: 10px; z-index: 100;"
                                                       data-id="{{ $probashiNews->id }}"
                                                       data-route="{{ route('probashijanala.delete.video', $probashiNews->id) }}"
                                                       data-csrf="{{ csrf_token() }}"
                                                       data-bs-toggle="tooltip"
                                                       title="Delete Video">
                                                       <i class="fa fa-trash"></i>
                                                    </a>
                                                @endif
                                            
                                                <video
                                                    id="videoPreview"
                                                    class="border rounded {{ $is_iframe ? 'd-none' : '' }}"
                                                    style="width: 100%; height: 280px;"
                                                    controls
                                                    poster="{{ ($video_path && $probashiNews->thumbnail_image) ? asset('storage/' . $probashiNews->thumbnail_image) : asset('backend/assets/dist/img/video_thumb.png') }}"
                                                >
                                                    <source src="{{ $is_iframe ? '' : $video_path }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            
                                                <iframe
                                                    id="videoIframe"
                                                    class="border rounded {{ $is_iframe ? '' : 'd-none' }}"
                                                    style="width: 100%; height: 280px;"
                                                    frameborder="0"
                                                    allowfullscreen
                                                    src="{{ $is_iframe ? $video_path : '' }}"
                                                ></iframe>
                                            </div>

                                        </div>
                                        
                                        <div class="row pe-0">
                                            <div class="col-md-12 pe-0">
                                                <label for="video_url" class="col-form-label fw-semibold">
                                                    {{ localize_uc('or_video_url') }} 
                                                </label>
                                            
                                                <input type="text" name="video_url" id="video_url"
                                                    class="form-control"
                                                    placeholder="https://www.youtube.com/watch?v=FZDImEiPgMk"
                                                    value="{{ $probashiNews->video_url }}">

                                                @if ($errors->has('video_url'))
                                                    <div class="error text-danger m-2">{{ $errors->first('video_url') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>                        
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row ps-4 pe-4">
                        <div class="col-12 mt-2">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="row form-group">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <label for="custom_url"
                                                class="col-form-label fw-semibold">{{ localize_uc('custom_url') }}</label>
                                            <input type="text" id="custom_url" name="custom_url"
                                                class="form-control @error('custom_url') is-invalid @enderror"
                                                placeholder="{{ localize_lower('example') }}-{{ localize_lower('url') }}"
                                                value="{{ $probashiNews->encode_title ?? '' }}">
                                            <span class="text-danger">{{ localize('special_character') }} (e.g .,@$)
                                                {{ localize_lower('not_allowed_in_this_field') }}</span>
                                            <div class="invalid-feedback error text-danger m-2">
                                                @error('custom_url')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row form-group">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <label for="reference" class="col-form-label fw-semibold">{{ localize_uc('reference') }}</label>
                                            
                                            <input type="text" name="reference" id="reference"
                                                class="form-control @error('reference') is-invalid @enderror"
                                                placeholder="{{ localize_uc('enter_reference') }}"
                                                value="{{ $probashiNews->reference ?? '' }}">

                                            @if ($errors->has('reference'))
                                                <div class="error text-danger m-2">{{ $errors->first('reference') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="row form-group">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <label for="meta_keyword" class="col-form-label fw-semibold">
                                                {{ localize_uc('meta_keyword') }} 
                                            </label>

                                            <input type="text" id="tags" name="meta_keyword" class="form-control" data-role="tagsinput" 
                                                placeholder="{{ localize_uc('keyword1') }},{{ localize_uc('keyword2') }}" 
                                                value="{{ $probashiNews->meta_keyword ?? '' }}">
                                            
                                            @if ($errors->has('meta_keyword'))
                                                <div class="error text-danger m-2">{{ $errors->first('meta_keyword') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row ps-4 pe-4">
                        <div class="col-12">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <label for="meta_description" class="col-form-label fw-semibold">
                                                {{ localize_uc('meta_description') }} 
                                            </label>

                                            <textarea name="meta_description" id="meta_description"
                                                class="form-control"
                                                placeholder="{{ localize_uc('meta_description') }}" rows="2">{{ $probashiNews->meta_description ?? '' }}</textarea>

                                            @if ($errors->has('meta_description'))
                                                <div class="error text-danger m-2">{{ $errors->first('meta_description') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row ps-4 pe-4">
                        <div class="col-md-12 mt-3 text-start">
                            <button type="submit" class="btn btn-success">
                                {{ localize('update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <input type="hidden" id="image_up" value="{{ route('page.ckeditor_upload', ['_token' => csrf_token()]) }}">

@endsection

@push('js')
    <script src="{{ module_asset('ProbashiJanala/js/probashijanala.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/Bootstrap-5-Tag-Input/tagsinput.js') }}"></script>
@endpush