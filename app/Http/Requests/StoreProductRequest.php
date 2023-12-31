<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required', Rule::unique('products', 'name')],
            'description' => 'required',
            "category_id" => 'required',
            "brand_id" => 'required',
            "supplier_id" => 'required',
            "stock" => 'required',
            "price" => 'required',
            "cost_price" => 'required',
            "weight" => 'required',
            "dimension" => 'required',
            "tags" => 'required',
            "image" => ['required', 'image','mimes:jpg,png,jped','max:1024']
        ];
    }
}
