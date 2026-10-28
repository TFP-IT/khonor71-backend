<?php

namespace Modules\News\Http\Requests;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class BreakingNewsRequest extends FormRequest
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
        return [
            'language_id'   => 'required|exists:languages,id,value,bn',
            'breaking_news' => 'required|string',
            'url'           => 'nullable|string|max:500',
            'start_time'    => 'nullable|date',
            'end_time'      => 'nullable|date|after_or_equal:start_time',
            'priority'      => 'nullable|integer',
            'status'        => 'nullable|in:0,1',
        ];
    }


    public function attributes()
    {
        return [
            'language_id'   => 'language',
            'breaking_news' => 'breaking headline',
            'url'           => 'article URL',
            'start_time'    => 'start date/time',
            'end_time'      => 'end date/time',
            'priority'      => 'priority',
            'status'        => 'status',
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
