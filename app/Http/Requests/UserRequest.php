<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
                        'name' => 'required|unique:users|max:255',
                        'email' => 'required|max:255|unique:users',
                        'password' => 'required',

                    ];
                }
            case 'update': {
                    return [
                        'name' => 'required|max:255|unique:users,name,' . $this->user,
                        'email' => 'required|max:255',
                    ];
                }
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'name.unique' => 'Tên người dùng đã tồn tại',
            'name.max' => 'Tên người dùng không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.max' => 'Email không được quá 255 ký tự',

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
