<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',

            'detail' => 'required',
            'brand_id' => 'required|integer',
            'product_category_id' => 'required|integer',
            'featured' => 'required|integer:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ];
    }
}
