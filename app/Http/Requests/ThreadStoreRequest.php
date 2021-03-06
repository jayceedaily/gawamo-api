<?php

namespace App\Http\Requests;

use App\Http\Requests\FormRequest;

class ThreadStoreRequest extends FormRequest
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
            'body'      => 'required_without:child_id|string|min:2',
            'child_id'  => 'nullable|exists:threads,id',
        ];
    }
}
