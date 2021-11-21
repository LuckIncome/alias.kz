<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'elements.hide' => 'sometimes|required',
            'elements.name' => 'sometimes|required',
            'elements.text' => 'sometimes|required',
            'elements.image' => 'required',
            'elements.title' => 'sometimes|required',
            'elements.slug' => 'sometimes|required',
            'elements.seo_keywords' => 'sometimes|required',
            'elements.seo_description' => 'sometimes|required',
        ];
    }
}
