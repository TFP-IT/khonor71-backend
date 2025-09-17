<x-web-layout>
    <section style="max-width: 1400px; margin: 24px auto 24px auto; padding: 0 15px;">
        <div style="background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <div style="padding: 16px; border-bottom: 1px solid #e1e9f1; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h2 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 16px;">{{ localize_uc('add_new_probashi_news') }}</h2>
                </div>
                <div style="text-align: right; display: flex; gap: 8px;">
                    <a href="{{ route('account.probashi.news') }}" style="padding: 4px 8px; background: #6b7280; color: #fff; border-radius: 4px; text-decoration: none; font-size: 0.875rem; transition: background 0.2s;">
                        ←&nbsp;{{ localize('back_to_list') }}
                    </a>
                </div>
            </div>

            @if ($errors->any())
            <div style="margin-bottom: 16px; padding: 16px; border-radius: 4px; background: #fee2e2; border: 1px solid #f87171; color: #dc2626;">
                <strong style="font-weight: bold;">{{ localize('Whoops! Something went wrong.') }}</strong>
                <ul style="margin-top: 8px; padding-left: 20px; list-style: disc; font-size: 0.875rem;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('success'))
            <div style="margin-bottom: 16px; padding: 16px; border-radius: 4px; background: #d1fae5; border: 1px solid #34d399; color: #047857;">
                <strong style="font-weight: bold;">{{ localize('success') }}!</strong>
                <p style="margin-top: 4px; font-size: 0.875rem;">{{ session('success') }}</p>
            </div>
            @endif

            <form action="{{ route('web.probashi-news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Hidden web_user_id -->
                <input type="hidden" name="web_user_id" value="{{ Auth::guard('webuser')->id() }}">

                <div style="display: grid; grid-template-columns: 1fr; gap: 16px; width: 100%;">
                    <!-- Language -->
                    <div>
                        <label for="language_id" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                            {{ localize_uc('language') }} <span style="color: #ef4444;">*</span>
                        </label>
                        <select name="language_id" id="language_id" style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827;" required>
                            <option value="">{{ localize_uc('select_language') }}</option>
                            @foreach ($languages as $language)
                            <option value="{{ $language->id }}" @selected(old('language_id') == $language->id)>
                                {{ $language->langname }}
                            </option>
                            @endforeach
                        </select>
                        @error('language_id')
                        <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Publish Date -->
                    <div>
                        <label for="publish_date" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                            {{ localize_uc('release_date') }} <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="date" name="publish_date" id="publish_date" value="{{ old('publish_date', date('Y-m-d')) }}"
                               style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827;" required>
                        @error('publish_date')
                        <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Title -->
                <div style="margin-top: 16px;">
                    <label for="title" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                        {{ localize_uc('head_line') }} <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827;"
                           placeholder="{{ localize_uc('enter_head_line') }}" required>
                    @error('title')
                    <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Details -->
                <div style="margin-top: 16px;">
                    <label for="details" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                        {{ localize_uc('details') }} <span style="color: #ef4444;">*</span>
                    </label>
                    <textarea name="details" id="details" style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827; min-height: 150px;"
                              placeholder="{{ localize_uc('enter_details') }}" required>{{ old('details') }}</textarea>
                    @error('details')
                    <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 16px;">
                    <!-- Image -->
                    <div>
                        <label for="image" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                            {{ localize('image') }}
                        </label>
                        <input type="file" name="image" id="image" style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff;"
                               accept="image/*">
                        <img id="output" src="{{ asset('backend/assets/dist/img/signature_signature.jpg') }}"
                             style="margin-top: 8px; width: 100%; height: 256px; object-fit: cover; border-radius: 4px;" alt="Image Preview">
                        @error('image')
                        <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                        @enderror

                        <!-- Image Alt and Title -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 8px;">
                            <div>
                                <label for="image_alt" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                                    {{ localize_uc('image_alt') }}
                                </label>
                                <input type="text" name="image_alt" id="image_alt" value="{{ old('image_alt') }}"
                                       style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827;"
                                       placeholder="{{ localize_uc('image_alt') }}">
                                @error('image_alt')
                                <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="image_title" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                                    {{ localize_uc('image_title') }}
                                </label>
                                <input type="text" name="image_title" id="image_title" value="{{ old('image_title') }}"
                                       style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827;"
                                       placeholder="{{ localize_uc('image_title') }}">
                                @error('image_title')
                                <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Video -->
                    <div>
                        <label for="video" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                            {{ localize('video') }}
                        </label>
                        <input type="file" name="video" id="video" style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff;"
                               accept="video/*">
                        <video id="videoPreview" style="margin-top: 8px; width: 100%; height: 256px; object-fit: cover; border-radius: 4px; border: 1px solid #d1d5db;" controls
                               poster="{{ asset('backend/assets/dist/img/video_thumb.png') }}">
                            <source src="" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <iframe id="videoIframe" style="margin-top: 8px; width: 100%; height: 256px; border-radius: 4px; border: none; display: none;" frameborder="0" allowfullscreen></iframe>
                        @error('video')
                        <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                        @enderror

                        <!-- Video URL -->
                        <div style="margin-top: 8px;">
                            <label for="video_url" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                                {{ localize_uc('or_video_url') }}
                            </label>
                            <input type="text" name="video_url" id="video_url" value="{{ old('video_url') }}"
                                   style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827;"
                                   placeholder="https://www.youtube.com/watch?v=FZDImEiPgMk">
                            @error('video_url')
                            <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr; gap: 16px; margin-top: 16px;">
                    <!-- Custom URL -->
                    <div>
                        <label for="custom_url" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                            {{ localize_uc('custom_url') }}
                        </label>
                        <input type="text" name="custom_url" id="custom_url" value="{{ old('custom_url') }}"
                               style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827;"
                               placeholder="{{ localize_lower('example') }}-{{ localize_lower('url') }}">
                        <p style="margin-top: 4px; font-size: 0.875rem; color: #6b7280;">{{ localize('special_character') }} (e.g. ., @$)
                            {{ localize_lower('not_allowed_in_this_field') }}</p>
                        @error('custom_url')
                        <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Reference -->
                    <div>
                        <label for="reference" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                            {{ localize_uc('reference') }}
                        </label>
                        <input type="text" name="reference" id="reference" value="{{ old('reference') }}"
                               style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827;"
                               placeholder="{{ localize_uc('enter_reference') }}">
                        @error('reference')
                        <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Meta Keywords -->
                    <div>
                        <label for="tags" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                            {{ localize_uc('meta_keyword') }}
                        </label>
                        <input type="text" name="meta_keyword" id="tags" value="{{ old('meta_keyword') }}"
                               style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827;"
                               data-role="tagsinput" placeholder="{{ localize_uc('keyword1') }}, {{ localize_uc('keyword2') }}">
                        @error('meta_keyword')
                        <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Meta Description -->
                <div style="margin-top: 16px;">
                    <label for="meta_description" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">
                        {{ localize_uc('meta_description') }}
                    </label>
                    <textarea name="meta_description" id="meta_description"
                              style="margin-top: 4px; width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; background: #fff; color: #111827; min-height: 100px;"
                              placeholder="{{ localize_uc('meta_description') }}">{{ old('meta_description') }}</textarea>
                    @error('meta_description')
                    <p style="margin-top: 4px; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div style="margin-top: 24px;">
                    <button type="submit" style="padding: 8px 16px; background: #16a34a; color: #fff; border-radius: 4px; border: none; cursor: pointer; transition: background 0.2s;">
                        {{ localize('save') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Hidden input for CKEditor image upload -->
        <input type="hidden" id="image_up" value="{{ route('page.ckeditor_upload', ['_token' => csrf_token()]) }}">

        @push('plugins-css')
        <link href="{{ asset('backend/assets/plugins/Bootstrap-5-Tag-Input/tagsinput.css') }}" rel="stylesheet">
        @endpush

        @push('plugins-js')
        <script src="{{ asset('backend/assets/plugins/Bootstrap-5-Tag-Input/tagsinput.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ module_asset('ProbashiJanala/js/probashijanala.js') }}"></script>
        @endpush

        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Image Preview
                const imageInput = document.getElementById('image');
                const imagePreview = document.getElementById('output');
                imageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Video Preview
                const videoInput = document.getElementById('video');
                const videoPreview = document.getElementById('videoPreview');
                const videoIframe = document.getElementById('videoIframe');
                const videoUrlInput = document.getElementById('video_url');

                videoInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            videoPreview.querySelector('source').src = e.target.result;
                            videoPreview.load();
                            videoPreview.style.display = 'block';
                            videoIframe.style.display = 'none';
                        };
                        reader.readAsDataURL(file);
                    }
                });

                videoUrlInput.addEventListener('input', function() {
                    const url = this.value.trim();
                    if (url) {
                        const embedUrl = url.replace('watch?v=', 'embed/').replace('youtu.be/', 'www.youtube.com/embed/');
                        videoIframe.src = embedUrl;
                        videoIframe.style.display = 'block';
                        videoPreview.style.display = 'none';
                    } else {
                        videoIframe.src = '';
                        videoIframe.style.display = 'none';
                        videoPreview.style.display = 'block';
                    }
                });

                // Initialize CKEditor
                if (typeof CKEDITOR !== 'undefined') {
                    CKEDITOR.replace('details', {
                        filebrowserUploadUrl: document.getElementById('image_up').value,
                        filebrowserUploadMethod: 'form'
                    });
                }
            });
        </script>
        @endpush

        @push('styles')
        <style>
            input, select, textarea, button { transition: background 0.2s, border-color 0.2s, color 0.2s; }
            button:hover { background: #15803d; }
            a[style*="background: #6b7280"]:hover { background: #4b5563; }
            @media (min-width: 768px) {
                div[style*="display: grid; grid-template-columns: 1fr;"]:nth-of-type(1) {
                    grid-template-columns: 1fr 1fr;
                }
                div[style*="display: grid; grid-template-columns: 1fr 1fr;"]:nth-of-type(2) {
                    grid-template-columns: 1fr 1fr;
                }
                div[style*="display: grid; grid-template-columns: 1fr;"]:nth-of-type(3) {
                    grid-template-columns: 1fr 1fr 1fr;
                }
            }
        </style>
        @endpush
    </section>
</x-web-layout>