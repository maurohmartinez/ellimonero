<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'welcome_message'   => 'required|max:100|min:10',
            'success_message'   => 'required|max:100|min:10',
            'error_message'     => 'required|max:100|min:10',
            'email_message'     => 'required',
            'token'             => 'required|max:10|min:5|unique:qrs',
            'price_discount'    => 'sometimes|nullable|integer|lt:price',
            'price_min'         => 'sometimes|nullable|integer',
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
