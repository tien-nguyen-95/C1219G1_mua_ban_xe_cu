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
          'title' => 'required| min:3 | max:50 | unique:tags,title',

        ];
    }
    public function messages()
    {
        return [
            'title.required' =>'Hãy nhập tiêu đề',
            'title.min' =>'Tối thiểu 3 ký tự',
            'title.max' =>'Tối đa 50 ký tự',
            'title.unique' =>'Tiêu đề đã tồn tại',

        ];
    }
}
