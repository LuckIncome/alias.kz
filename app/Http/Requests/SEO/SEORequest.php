<?php

namespace App\Http\Requests\SEO;

use Illuminate\Foundation\Http\FormRequest;

class SEORequest extends FormRequest
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
            'elements.page' => 'sometimes|required',
            'elements.title' => 'sometimes|required',
            'elements.seo_keywords' => 'sometimes|required',
            'elements.seo_description' => 'sometimes|required',
        ];
    }
}
