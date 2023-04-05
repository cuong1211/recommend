<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
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
                        'name' => 'required|max:255',
                        'email' => 'nullable|email',
                        'address' => 'required',
                        'phone' => 'required|numeric',
                        'note' => 'nullable',
                        'product_id' => 'required',
                        'soluong' => 'nullable|numeric',
                        'total' => 'nullable',
                        'status' => 'nullable',
                    ];
                }
            case 'update': {
                    return [
                        'name' => 'required|max:255',
                        'email' => 'nullable|email',
                        'address' => 'required',
                        'phone' => 'required|numeric',
                        'note' => 'nullable',
                        'product_id' => 'required',
                        'soluong' => 'nullable|numeric',
                        'total' => 'nullable',
                        'status' => 'nullable',
                    ];
                }
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'name.max' => 'Tên đơn hàng quá dài.',
            'email.email' => 'Vui lòng nhấp đúng định dạng email.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'product_id.required' => 'Vui lòng chọn sản phẩm.',
            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.numeric' => 'Số lượng phải là số.',
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
