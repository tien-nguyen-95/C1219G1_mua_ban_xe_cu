<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandFormRequest extends FormRequest
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
            //
            'name' => 'required | min:3 | max:50 | unique:brands,name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Hãy nhập tên',
            'name.min' =>'Tối thiểu 3 ký tự',
            'name.max' =>'Tối đa 50 ký tự',
            'name.unique' =>'Tên đã tồn tại'
        ];
    }
}
