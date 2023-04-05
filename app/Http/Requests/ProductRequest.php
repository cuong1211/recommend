<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
                        'name' => 'required|unique:products|max:255',
                        'description' => 'nullable',
                        'price' => 'required',
                        'category_id' => 'required',
                        'img' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:20480',
                    ];
                }
            case 'update': {
                    return [
                        'name' => 'required|max:255|unique:products,name,' . $this->product,
                        'description' => 'nullable',
                        'price' => 'required',
                        'category_id' => 'required',
                        'img' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif,svg|max:20480',
                        // dd($this->product)
                    ];
                }
            default:
                break;
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'name.unique' => 'Tên sản phẩm đã được sử dụng.',
            'name.max' => 'Tên sản phẩm quá dài.',
            'price.required' => 'Vui lòng nhập giá sản phẩm.',
            'category_id.required' => 'Vui lòng chọn loại hàng.',
            'img.required' => 'Vui lòng chọn ảnh sản phẩm.',
            'img.image' => 'File phải là đỉnh dạng ảnh.',
            'img.mimes' => 'Ảnh phải thuộc các định dạng sau:webp,jpeg,png,jpg,gif,svg.',
            'img.max' => 'Tên ảnh quá dài.',
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
