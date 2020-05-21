<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'name' => 'required | min:3 | max:50 ',
            'user_id' => 'required | unique:staffs,user_id,'.$this->id.',id',
            'phone' => 'required |regex:/^0([0-9]{9,10})$/ | unique:staffs,phone,'.$this->id.',id',
            'address' => 'required | min:3 | max:255'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute là bắt buộc',
            'min' => ':attribute tối thiểu :min kí tự',
            'max' => ':attribute tối đa :max kí tự',
            'string' => ':attribute phải là 1 chuỗi kí tự',
            'unique' => ':attribute đã tồn tại',
            'regex' => ':attribute không đúng định dạng',
        ];
    }

    public function attributes()
    {

        return [
            'name' => 'Tên',
            'user_id' => 'Email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ'
        ];
    }
}
