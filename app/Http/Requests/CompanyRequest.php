<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CompanyRequest extends FormRequest
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
                        'name' => 'required|unique:companies|max:255',
                        'phone' => 'required|unique:companies|max:12',
                        'email' => 'required|max:255|unique:companies',
                        'address' => 'required|max:255',
                    ];
                }
            case 'update': {
                    return [
                        'name' => 'required|max:255|unique:companies,name,' . $this->company,
                        'phone' => 'required|max:12|unique:companies,phone,' . $this->company,
                        'email' => 'required|max:255',
                        'address' => 'required|max:255',
                        
                    ];
                }
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên công ty không được để trống',
            'name.unique' => 'Tên công ty đã tồn tại',
            'name.max' => 'Tên công ty không được quá 255 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.max' => 'Số điện thoại không được quá 12 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.max' => 'Email không được quá 255 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được quá 255 ký tự',
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
