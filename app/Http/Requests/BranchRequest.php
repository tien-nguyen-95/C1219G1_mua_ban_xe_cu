<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'name' => 'required | min:3 | max:50 | unique:branches,name,'.$this->id.',id',
            'phone' => 'required |regex:/^0([0-9]{9,10})$/ | unique:branches,phone,'.$this->id.',id',
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
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ'
        ];
    }
}
