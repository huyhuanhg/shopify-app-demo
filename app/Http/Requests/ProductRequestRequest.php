<?php

namespace App\Http\Requests;

use App\Rules\CheckProductIdValidRule;

class ProductRequestRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', new CheckProductIdValidRule()],
            'icon_id' => 'required|numeric|min:1|max:4'
        ];
    }

    /**
     * return response message
     * @return array
     */
    public function messages(): array
    {
        return [
            'product_id.required' => 'Product id không hợp lệ!',
            'icon_id.required' => 'Icon id không trống!',
            'icon_id.numeric' => 'Icon id không hợp lệ!',
            'icon_id.min' => 'Icon id không hợp lệ!',
            'icon_id.max' => 'Icon id không hợp lệ!',
        ];
    }
}
