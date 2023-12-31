<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesRequest extends FormRequest
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
            'name' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'address' => ['required'],
            'payment_method' => 'required',
            'trx_id' => $this->input('payment_method') == '2' ? 'required|string' : 'nullable',
            "total_amount" => 'required'
        ];
    }
}
