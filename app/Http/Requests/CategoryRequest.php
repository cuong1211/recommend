<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
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
        $arr = explode('@', $this->route()->getActionName());
        $action = $arr[1];
        switch ($action) {
            case 'store': {
                    return [
                        'name' => 'required|unique:categories|max:255',
                        'slug' => 'required|unique:categories|max:10',
                    ];
                }
            case 'update': {
                    return [
                        'name' => 'required|max:255|unique:categories,name,' . $this->category,
                        'slug' => 'required|max:10|unique:categories,slug,' . $this->category,
                    ];
                }
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên mặt hàng không được để trống',
            'name.unique' => 'Tên mặt hàng đã tồn tại',
            'name.max' => 'Tên mặt hàng không được quá 255 ký tự',
            'slug.required' => 'Tên viết tắt không được để trống',
            'slug.unique' => 'Tên viết tắt đã tồn tại',
            'slug.max' => 'Tên viết tắt không được quá 10 ký tự',
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        $errors = $validator->errors()->all();
        throw new HttpResponseException(
            response()->json(
                [
                    'type' => res_type('error'),
                    'title' => res_title('validate_error'),
                    'content' => $errors,
                ],
            )
        );
    }
}
