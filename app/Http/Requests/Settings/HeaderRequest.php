<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class HeaderRequest extends FormRequest
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
            'elements.description' => 'sometimes|required',
            'elements.value' => 'sometimes|required'
        ];
    }
}
