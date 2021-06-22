<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
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
        return ['product_name' => "required", 'product_quantity' => "required", 'product_price' => "required"];
    }

    public function getProductDTO()
    {
        return ['product_name' => $this->input('product_name'),
            'product_quantity' => $this->input('product_quantity'),
            'product_price' => $this->input('product_price')
        ];
    }
}
