<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QrRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check() && backpack_user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'welcome'           => 'sometimes|nullable|max:100|min:10',
            'success'           => 'sometimes|nullable|max:100|min:10',
            'token'             => 'required|max:10|min:5|unique:qrs,token,' . $this->id,
            'starts'            => 'sometimes|nullable|date',
            'ends'              => 'sometimes|nullable|date|after:starts',
            'always_visible'    => 'boolean',
            'active'            => 'boolean',
            'stock'             => 'integer',
            'new'               => 'boolean'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
