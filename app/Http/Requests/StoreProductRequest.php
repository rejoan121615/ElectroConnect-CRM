<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            "name" => 'required',
            "category_id" => 'required',
            "brand_id" => 'required',
            "supplier_id" => 'required',
            "supplier_product_id" => 'required',
            "price" => 'required',
            "cost_price" => 'required',
            "stock_quantity" => 'required',
            "weight" => 'required',
            "dimension" => 'required',
        ];
    }
}
