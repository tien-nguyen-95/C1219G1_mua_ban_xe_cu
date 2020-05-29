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
            'code' => 'required|max:20 | unique:products,code,' . $this->id . 'id',
            // 'inputtitle' => 'required',
            'name' => 'required| min:5 | max:255',
            // 'cc' => 'required|integer|min:1|max:1000',
            'model_year' => 'required',
            'register_year' => 'required',
            'miles' => 'required|integer|min:1|max:1000000',
            'color' => 'required|string|min:2|max:20',
            'origin' => 'required|string|min:3|max:50',
            'import_price' => 'required|min:4|max:10',
            'export_price' => 'required|min:4|max:10',
            'branch_id' => 'required',
            'brand_id' => 'required',
            'tag_id' => 'required',
            'category_id' => 'required',
            'staff_id' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Vui lòng điền thông tin !',
            'code.max' => 'Vui lòng nhập dưới 20 kí tự !',
            'code.unique' => 'Mã khách hàng đã tồn tại !',

         
            // 'inputtitle.required' => 'Vui lòng điền thông tin !',
            // 'inputtitle.min' => 'Vui lòng nhập ít nhất là 5 kí tự !',
            // 'inputtitle.max' => 'Vui lòng nhập dưới 255 kí tự !',


            'name.required' => 'Vui lòng điền thông tin !',
            'name.min' => 'Vui lòng nhập ít nhất là 5 kí tự !',
            'name.max' => 'Vui lòng nhập dưới 255 kí tự !',

            // 'cc.required' => 'Vui lòng điền thông tin !',
            // 'cc.integer' => 'Vui lòng điền dưới dạng số !',
            // 'cc.min' => 'Vui lòng nhập ít nhất là 1 kí tự !',
            // 'cc.max' => 'Vui lòng nhập dưới 4 kí tự !',

            'model_year.required' => 'Vui lòng chọn thông tin !',

            'register_year.required' => 'Vui lòng chọn thông tin !',

            'miles.required' => 'Vui lòng điền thông tin !',
            'miles.integer' => 'Vui lòng điền dưới dạng số !',
            'miles.min' => 'Vui lòng nhập ít nhất là 1 kí tự !',
            'miles.max' => 'Vui lòng nhập dưới 10 kí tự !',

            'color.required' => 'Vui lòng điền thông tin !',
            'color.string' => 'Vui lòng điền dưới dạng chữ !',
            'color.min' => 'Vui lòng nhập ít nhất là 2 kí tự !',
            'color.max' => 'Vui lòng nhập dưới 20 kí tự !',

            'origin.required' => 'Vui lòng điền thông tin !',
            'origin.string' => 'Vui lòng điền dưới dạng chữ !',
            'origin.min' => 'Vui lòng nhập ít nhất là 3 kí tự !',
            'origin.max' => 'Vui lòng nhập dưới 50 kí tự !',

            'import_price.required' => 'Vui lòng điền thông tin !',
            'import_price.min' => 'Vui lòng nhập ít nhất là 4 kí tự !',
            'import_price.max' => 'Vui lòng nhập dưới 10 kí tự !',

            'export_price.required' => 'Vui lòng điền thông tin !',
            'export_price.min' => 'Vui lòng nhập ít nhất là 4 kí tự !',
            'export_price.max' => 'Vui lòng nhập dưới 10 kí tự !',

            'branch_id.required' => 'Vui lòng chọn thông tin !',
            'brand_id.required' => 'Vui lòng chọn thông tin !',
            'tag_id.required' => 'Vui lòng chọn thông tin !',
            'category_id.required' => 'Vui lòng chọn thông tin !',
            'staff_id.required' => 'Vui lòng chọn thông tin !',
        ];
    }
}
