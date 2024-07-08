<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string' ,
            'category_id' => 'required|exists:categories,id' ,
            'brand_id' => 'required|exists:brands,id' ,
            'slug' => 'required|unique:products,slug' ,
            'description' => 'required' ,
            'image' => 'required|image|mimes:png,svg,jpg,jpeg' ,
            'price' => 'required|integer' ,
            'quantity' => 'required|integer' ,
        ];
    }
    public function failedValidation(Validator $Validator)
    {
        throw new HttpResponseException(response()->json([
            'data' => $Validator->errors()
        ])) ;

    }
}
