<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|min:3|max:50|unique:customers,name,'.$this->id.',id',
            'phone' => 'required|regex:/^0([0-9]{9})$/',
            'email' => 'required|email|unique:customers,email,'.$this->id.',id',
            'address' => 'required|min:3|max:200'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên khách hàng không được để trống',
            'name.min' => 'Tên khách hàng không ít hơn 3 ký tự và không nhiều hơn 50 ký tự',
            'name.max' => 'Tên khách hàng không ít hơn 3 ký tự và không nhiều hơn 50 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại sai định dạng',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email sai định dạng',
            'email.unique' => 'Email đã tồn tại',
            'address.required' => 'Địa chỉ không được để trống',
            'address.min' => 'Địa chỉ không ít hơn 3 ký tự và không nhiều hơn 200 ký tự',
            'address.max' => 'Địa chỉ không ít hơn 3 ký tự và không nhiều hơn 200 ký tự',
        ];
    }
}
