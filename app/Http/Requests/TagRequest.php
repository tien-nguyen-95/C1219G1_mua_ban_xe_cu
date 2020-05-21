<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
          'title' => 'required| min:3 | max:50 | unique:tags,title,'.$this->id,
          'created_at' =>'date_format:d-m-Y H:i:s',
          'deleted_at' =>'date_format:d-m-Y H:i:s'
        ];
    }
    public function messages()
    {
        return [
            'title.required' =>'Hãy nhập tiêu đề',
            'title.min' =>'Tối thiểu 3 ký tự',
            'title.max' =>'Tối đa 50 ký tự',
            'title.unique' =>'Tiêu đề đã tồn tại',
            // 'category_id.required' =>'Hãy nhập danh mục',
            // 'category_id.min' =>'Tối thiểu 3 ký tự',
            // 'category_id.max' =>'Tối đa 50 ký tự',
        ];
    }
}
