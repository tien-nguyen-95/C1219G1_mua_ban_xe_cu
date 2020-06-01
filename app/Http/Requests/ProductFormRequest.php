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
            'code' => 'required | max:50 | unique:products,code,'.$this->id.'id',
            'model_year' => 'required',
            'title' => 'required',
            'register_year' => 'required',
            'name' => 'required| min:5 | max:255',
            'cc_number' => 'required|integer|min:1|max:1000',
            'branch_id' => 'required',
            'miles' => 'required|integer|min:1|max:1000000',
            'brand_id' => 'required',
            'color' => 'required|string|min:2|max:20',
            'tag_id' => 'required',
            'import_price' => 'required|min:4|max:10',
            'category_id' => 'required',
            'export_price' => 'required|min:4|max:10',
            'staff_id' => 'required',
            'origin' => 'required|string|min:3|max:50'

        ];
    }

    public function messages()
    {
        return [

            'code.required' => 'Vui lòng điền thông tin !',
            'code.max' => 'Vui lòng nhập dưới 20 kí tự !',
            'code.unique' => 'Mã khách hàng đã tồn tại !',

            'model_year.required' => 'Vui lòng chọn thông tin !',
         
            'title.required' => 'Vui lòng điền thông tin !',
            'title.min' => 'Vui lòng nhập ít nhất là 5 kí tự !',
            'title.max' => 'Vui lòng nhập dưới 255 kí tự !',

            'register_year.required' => 'Vui lòng chọn thông tin !',

            'name.required' => 'Vui lòng điền thông tin !',
            'name.min' => 'Vui lòng nhập ít nhất là 5 kí tự !',
            'name.max' => 'Vui lòng nhập dưới 255 kí tự !',

            'cc_number.required' => 'Vui lòng điền thông tin !',
            'cc_number.integer' => 'Vui lòng điền dưới dạng số !',
            'cc_number.min' => 'Vui lòng nhập ít nhất là 1 kí tự !',
            'cc_number.max' => 'Vui lòng nhập dưới 4 kí tự !',

            'branch_id.required' => 'Vui lòng chọn thông tin !',
            
            'miles.required' => 'Vui lòng điền thông tin !',
            'miles.integer' => 'Vui lòng điền dưới dạng số !',
            'miles.min' => 'Vui lòng nhập ít nhất là 1 kí tự !',
            'miles.max' => 'Vui lòng nhập dưới 10 kí tự !',

            'brand_id.required' => 'Vui lòng chọn thông tin !',

            'color.required' => 'Vui lòng điền thông tin !',
            'color.string' => 'Vui lòng điền dưới dạng chữ !',
            'color.min' => 'Vui lòng nhập ít nhất là 2 kí tự !',
            'color.max' => 'Vui lòng nhập dưới 20 kí tự !',

            'tag_id.required' => 'Vui lòng chọn thông tin !',

            'import_price.required' => 'Vui lòng điền thông tin !',
            'import_price.min' => 'Vui lòng nhập ít nhất là 4 kí tự !',
            'import_price.max' => 'Vui lòng nhập dưới 10 kí tự !',

            'category_id.required' => 'Vui lòng chọn thông tin !',

            'export_price.required' => 'Vui lòng điền thông tin !',
            'export_price.min' => 'Vui lòng nhập ít nhất là 4 kí tự !',
            'export_price.max' => 'Vui lòng nhập dưới 10 kí tự !',

            'staff_id.required' => 'Vui lòng chọn thông tin !',

            'origin.required' => 'Vui lòng điền thông tin !',
            'origin.string' => 'Vui lòng điền dưới dạng chữ !',
            'origin.min' => 'Vui lòng nhập ít nhất là 3 kí tự !',
            'origin.max' => 'Vui lòng nhập dưới 50 kí tự !'
        ];
    }
}
