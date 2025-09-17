<div data-tab="news_upload" class="tab_content opacity-0 invisible transition-all duration-300 ease-in-out space-y-4">
    <div class="bg-white dark:bg-neutral-800 p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4 dark:text-white">{{ localize_uc('add_new_probashi_news') }}</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700">
                <strong class="font-bold">{{ localize('Whoops! Something went wrong.') }}</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="mb-4 p-4 rounded-lg bg-green-100 border border-green-400 text-green-700">
                <strong class="font-bold">{{ localize('success') }}!</strong>
                <p class="mt-1 text-sm">{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('web.probashi-news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Hidden web_user_id -->
            <input type="hidden" name="web_user_id" value="{{ Auth::guard('webuser')->id() }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Language -->
                <div>
                    <label for="language_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ localize_uc('language') }} <span class="text-red-500">*</span>
                    </label>
                    <select name="language_id" id="language_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white" required>
                        <option value="">{{ localize_uc('select_language') }}</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}" @selected(old('language_id') == $language->id)>
                                {{ $language->langname }}
                            </option>
                        @endforeach
                    </select>
                    @error('language_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Publish Date -->
                <div>
                    <label for="publish_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ localize_uc('release_date') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="publish_date" id="publish_date" value="{{ old('publish_date', date('Y-m-d')) }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white" required>
                    @error('publish_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Title -->
            <div class="mt-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ localize_uc('head_line') }} <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                       placeholder="{{ localize_uc('enter_head_line') }}" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Details -->
            <div class="mt-4">
                <label for="details" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ localize_uc('details') }} <span class="text-red-500">*</span>
                </label>
                <textarea name="details" id="details" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                          placeholder="{{ localize_uc('enter_details') }}" rows="6" required>{{ old('details') }}</textarea>
                @error('details')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <!-- Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ localize('image') }}
                    </label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600"
                           accept="image/*">
                    <img id="output" src="{{ asset('backend/assets/dist/img/signature_signature.jpg') }}"
                         class="mt-2 w-full h-64 object-cover rounded" alt="Image Preview">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <!-- Image Alt and Title -->
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div>
                            <label for="image_alt" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ localize_uc('image_alt') }}
                            </label>
                            <input type="text" name="image_alt" id="image_alt" value="{{ old('image_alt') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                                   placeholder="{{ localize_uc('image_alt') }}">
                            @error('image_alt')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="image_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ localize_uc('image_title') }}
                            </label>
                            <input type="text" name="image_title" id="image_title" value="{{ old('image_title') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                                   placeholder="{{ localize_uc('image_title') }}">
                            @error('image_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Video -->
                <div>
                    <label for="video" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ localize('video') }}
                    </label>
                    <input type="file" name="video" id="video" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600"
                           accept="video/*">
                    <video id="videoPreview" class="mt-2 w-full h-64 object-cover rounded border" controls
                           poster="{{ asset('backend/assets/dist/img/video_thumb.png') }}">
                        <source src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <iframe id="videoIframe" class="mt-2 w-full h-64 rounded border hidden" frameborder="0" allowfullscreen></iframe>
                    @error('video')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <!-- Video URL -->
                    <div class="mt-2">
                        <label for="video_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ localize_uc('or_video_url') }}
                        </label>
                        <input type="text" name="video_url" id="video_url" value="{{ old('video_url') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                               placeholder="https://www.youtube.com/watch?v=FZDImEiPgMk">
                        @error('video_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <!-- Custom URL -->
                <div>
                    <label for="custom_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ localize_uc('custom_url') }}
                    </label>
                    <input type="text" name="custom_url" id="custom_url" value="{{ old('custom_url') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                           placeholder="{{ localize_lower('example') }}-{{ localize_lower('url') }}">
                    <p class="mt-1 text-sm text-gray-500">{{ localize('special_character') }} (e.g. ., @$)
                        {{ localize_lower('not_allowed_in_this_field') }}</p>
                    @error('custom_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Reference -->
                <div>
                    <label for="reference" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ localize_uc('reference') }}
                    </label>
                    <input type="text" name="reference" id="reference" value="{{ old('reference') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                           placeholder="{{ localize_uc('enter_reference') }}">
                    @error('reference')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Keywords -->
                <div>
                    <label for="meta_keyword" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ localize_uc('meta_keyword') }}
                    </label>
                    <input type="text" name="meta_keyword" id="tags" value="{{ old('meta_keyword') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                           data-role="tagsinput" placeholder="{{ localize_uc('keyword1') }}, {{ localize_uc('keyword2') }}">
                    @error('meta_keyword')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Meta Description -->
            <div class="mt-4">
                <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ localize_uc('meta_description') }}
                </label>
                <textarea name="meta_description" id="meta_description"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                          placeholder="{{ localize_uc('meta_description') }}" rows="3">{{ old('meta_description') }}</textarea>
                @error('meta_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
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
</div>