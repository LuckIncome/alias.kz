<?php

namespace App\Http\Requests\Reviews;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'elements.author' => 'sometimes|required',
            'elements.quote' => 'sometimes|required',
            'elements.image' => 'required'
        ];
    }
}
