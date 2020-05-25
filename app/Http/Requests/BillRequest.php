<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
            'status' => 'required',
            'branch_id' => 'required',
            'complete' => 'required',
            'payment_at' => 'required|date_format:Y-m-d',
            'delivered_at' => 'required|date_format:Y-m-d',
            'deposit' => 'required|integer|gt:0',
            'payment' => 'required|integer|gt:0',
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => 'Khách hàng không được để trống',
            'staff_id.required' => 'Nhân viên không được để trống',
            'product_id.required' => 'Sản phẩm không được để trống',
            'status.required' => 'Loại đơn hàng không được để trống',
            'branch_id.required' => 'Chi nhánh không được để trống',
            'complete.required' => 'Tình trạng không được để trống',
            'payment_at.required' => 'Ngày thanh toán không được để trống',
            'payment_at.date_format' => 'Ngày thanh toán sai định dạng',
            'delivered_at.required' => 'Ngày giao hàng không được để trống',
            'delivered_at.date_format' => 'Ngày giao hàng sai định dạng',
            'deposit.required' => 'Tiền đặt cọc không được để trống',
            'deposit.integer' => 'Tiền đặt cọc phải là số và lớn hơn 0',
            'deposit.gt' => 'Tiền đặt cọc phải là số và lớn hơn 0',
            'payment.required' => 'Tổng thanh toán không được để trống',
            'payment.integer' => 'Tổng thanh toán phải là số và lớn hơn 0',
            'payment.gt' => 'Tổng thanh toán phải là số và lớn hơn 0',
        ];
    }
}
