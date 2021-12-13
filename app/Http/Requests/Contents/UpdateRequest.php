<?php

namespace App\Http\Requests\Contents;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'type' => ['nullable', Rule::in(['skills', 'interests', 'experiences'])],
            'title' => 'nullable',
            'body' => 'nullable',
        ];
    }
}
