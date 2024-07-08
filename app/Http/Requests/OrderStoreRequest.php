<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class OrderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        return !Order::query()->where('product_id' , $this->product_id)
            ->where('user_id' , Auth::id())
            ->where('status' , 'in-order')->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id'
        ];
    }
    public function failedValidation(Validator $Validator)
    {
        throw new HttpResponseException(response()->json([
            'data' => $Validator->errors()
        ])) ;

    }
}
