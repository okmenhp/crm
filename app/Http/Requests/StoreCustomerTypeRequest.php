<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerTypeRequest extends FormRequest
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
            //
            'code' => 'required|unique:customer_types',
            'name' => 'required|unique:customer_types',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Các trường có dấu (*) là bắt buộc nhập',
            'code.unique' => 'Mã loại đã tồn tại',
            'name.unique' => 'Tên loại đã tồn tại',
        ];
    }
}
