<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class InProductRequest extends FormRequest
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
                    'product_id' => 'required',
                    'company_id' => 'required',
                    'quantity' => 'required',
                    'total' => 'nullable',
                    ];
                }
            case 'update': {
                return [
                    'product_id' => 'required',
                    'company_id' => 'required',
                    'quantity' => 'required',
                    'total' => 'nullable',
                ];
                }
            default:
                break;
        }
    }
    
    public function messages()
    {
        return [
            'product_id.required' => 'Vui lòng chọn sản phẩm',
            'company_id.required' => 'Vui lòng chọn công ty',
            'quantity.required' => 'Vui lòng nhập số lượng',
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
