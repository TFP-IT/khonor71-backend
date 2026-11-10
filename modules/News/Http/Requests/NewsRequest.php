<?php

namespace Modules\News\Http\Requests;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Category\Entities\Category;
use Modules\Reporter\Entities\Reporter;

class NewsRequest extends FormRequest
{
    use FormRequestTrait;

    protected function prepareForValidation(): void
    {
        if (!$this->filled('language_id')) {
            $this->merge([
                'language_id' => get_language_id(),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $categoryPositions   = generate_positions(1, 16);
        $homeSliderPositions = generate_positions(1, 7);

        $rules = [
            'language_id'            => ['required', 'integer', Rule::exists('languages', 'id')->where('value', 'bn')],
            'other_page'             => ['required', 'string', Rule::exists(Category::class, 'id')],
            'sub_category_id'        => ['nullable', 'string', Rule::exists(Category::class, 'id')],
            'division_id'            => ['nullable', 'integer', 'exists:divisions,id'],
            'district_id'            => ['nullable', 'integer', 'exists:districts,id'],
            'upazila_id'             => ['nullable', 'integer', 'exists:upazilas,id'],
            'other_position'         => ['nullable', 'integer', 'in:' . implode(',', $categoryPositions)],
            'home_page'              => ['nullable', 'integer', 'in:' . implode(',', $homeSliderPositions)],
            'publish_date'           => ['required', 'string'],
            'publish_time'           => ['nullable', 'string'],
            'publish_type'           => ['nullable', 'in:immediate,schedule'],
            'short_head'             => ['nullable', 'string'],
            'post_date'              => ['nullable', 'date'],
            'head_line'              => ['required', 'string'],
            'details_news'           => ['required', 'string'],
            'image_file'             => ['nullable', 'file', 'image', 'mimes:jpg,jpeg,png,gif,bmp,webp', 'max:5120'],
            'image_alt'              => ['nullable', 'string'],
            'image_title'            => ['nullable', 'string'],
            'caption'                => ['nullable', 'string'],
            'custom_url'             => ['nullable', 'string'],
            'seo_title'              => ['nullable', 'string'],
            'videos'                 => ['nullable', 'string'],
            'reference'              => ['nullable', 'string'],
            'post_tag'               => ['nullable', 'string'],
            'meta_keyword'           => ['nullable', 'string'],
            'meta_description'       => ['nullable', 'string'],
            'latest_confirmed'       => ['nullable', 'string'],
            'reporter_message'       => ['nullable', 'string'],
            'breaking_confirmed'     => ['nullable'],
            'status_confirmed'       => ['nullable'],
            'feature_news'           => ['nullable', 'boolean'],
            'recommanded_news'       => ['nullable', 'boolean'],
            'schemasetup'            => ['nullable'],
            'ref_date'               => ['nullable', 'string', 'date_format:' . get_date_picker_format()],
            'confirm_dynamic_static' => ['nullable'],
            'is_auto_post'           => ['nullable', 'boolean'],
        ];

        if (auth()->user()->user_type_id == 1) {
            $rules['reporter_id'] = ['required', 'integer', Rule::exists(Reporter::class, 'id')];
        } else {
            $rules['reporter_id'] = ['nullable', 'integer', Rule::exists(Reporter::class, 'id')];
        }

        return $rules;
    }

    /**
     * Custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'language_id'            => localize('language') ?: 'Language',
            'other_page'             => localize('category') ?: 'Category',
            'sub_category_id'        => localize('sub_category') ?: 'Sub category',
            'division_id'            => localize('division') ?: 'Division',
            'district_id'            => localize('district') ?: 'District',
            'head_line'              => localize('head_line') ?: 'Headline',
            'details_news'           => localize('details') ?: 'News details',
            'publish_date'           => localize('publication_date') ?: 'Publication date',
            'publish_time'           => localize('publication_time') ?: 'Publication time',
            'reporter_id'            => localize('reporter') ?: 'Reporter',
            'image_file'             => localize('image') ?: 'Image file',
            'caption'                => localize('caption') ?: 'Caption',
            'reference'              => localize('reference') ?: 'Reference',
            'image_alt'              => localize('image_alt') ?: 'Image alt',
            'image_title'            => localize('image_title') ?: 'Image title',
            'custom_url'             => localize('custom_url') ?: 'Custom URL',
            'seo_title'              => localize('seo_title') ?: 'SEO title',
            'videos'                 => localize('video_url') ?: 'Video URL',
            'post_tag'               => localize('post_tag') ?: 'Post tag',
            'meta_keyword'           => localize('meta_keyword') ?: 'Meta keyword',
            'meta_description'       => localize('meta_description') ?: 'Meta description',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}
