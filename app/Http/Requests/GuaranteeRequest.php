<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuaranteeRequest extends FormRequest
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
            'customer_id' => 'required',
            'staff_id' => 'required',
            'product_id' => 'required',
            'issue' => 'required | string | min:3 | max:255',
            'branch_id' => 'required',
            'date_in' => 'required',
            'date_out' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute là bắt buộc',
            'min' => ':attribute tối thiểu :min kí tự',
            'max' => ':attribute tối đa :max kí tự',
            'string' => ':attribute phải là 1 chuỗi kí tự',
            'unique' => ':attribute đã tồn tại'
        ];
    }
    public function attributes()
    {
        return [
            'customer_id' => 'Tên khách hàng',
            'staff_id' => 'Tên nhân viên',
            'product_id' => 'Tên sản phẩm',
            'issue' => 'Mô tả dịch vụ',
            'branch_id' => 'Tên chi nhánh',
            'date_in' => 'Ngày nhận bảo hành',
            'date_out' =>'Ngày trả bảo hành'
        ];
    }
}
