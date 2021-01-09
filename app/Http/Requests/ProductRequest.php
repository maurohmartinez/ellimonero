<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name'              => 'required|max:50|min:3',
            'description'       => 'sometimes|nullable|max:191',
            'content'           => 'sometimes|nullable|max:3000',
            'type'              => 'required|in:regular,auction',
            'price'             => 'required|integer',
            'price_discount'    => 'sometimes|nullable|integer|lt:price',
            'price_min'         => 'sometimes|nullable|integer',
            'starts'            => [Rule::requiredIf($this->type == 'auction'), 'sometimes', 'nullable', 'date'],
            'ends'              => [Rule::requiredIf($this->type == 'auction'), 'sometimes', 'nullable', 'date', 'after:starts'],
            'images'            => 'required',
            'active'            => 'boolean',
            'stock'             => 'integer|sometimes|nullable',
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
