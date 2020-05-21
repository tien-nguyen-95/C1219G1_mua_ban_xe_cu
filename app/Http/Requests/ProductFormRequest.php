<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'code' => 'required| min:1 | max:100 | unique:products,code,'.$this->id.'id',
            'name' => 'required| min:2 | max:50 | unique:products,name,'.$this->id.'id',
            'import_price'=>'required|integer|min:1',
            'export_price'=>'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Vui lòng điền thông tin !',
            'code.min' => 'Vui lòng nhập ít nhất là 1 kí tự !',
            'code.max' => 'Vui lòng nhập dưới 100 kí tự !',
            'code.unique' => 'Mã khách hàng đã tồn tại !',
            'name.required' => 'Vui lòng điền thông tin !',
            'name.min' => 'Vui lòng nhập ít nhất là 2 kí tự !',
            'name.max' => 'Vui lòng nhập dưới 50 kí tự !',
            'name.unique' => 'Tên khách hàng đã tồn tại !',
            'import_price.required' => 'Vui lòng nhập số tiền !',
            'import_price.integer' => 'Số tiền phải là dạng số !',
            'import_price.min' => 'Số tiền phải lớn hơn 0 !',
            'export_price.required' => 'Vui lòng nhập số tiền !',
            'export_price.integer' => 'Số tiền phải là dạng số !',
            'export_price.min' => 'Số tiền phải lớn hơn 0 !'
        ];
    }
}
