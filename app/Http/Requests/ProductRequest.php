<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name'=>'required',
            'price'=>'required',
            'type'=>'required',
            'width'=>'required',
            'height'=>'required',
        ];

    }
    public function messages()
    {
        return [
            'name.required'=>'Поле \'Наименование\' обязательно для заполенения',
            'price.required'=>'Поле \'Цена\' обязательно для заполенения',
            'type.required'=>'Выберите тип товара',
            'width.required'=>'Укажите ширину товара',
            'height.required'=>'Укажите ширину товара',
            'email.unique'=>'Такая почта уже зарегистирорована'

        ];

    }
}
