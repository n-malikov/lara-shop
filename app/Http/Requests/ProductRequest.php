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
        $rules = [
            'code' => 'required|min:3|max:255|unique:products,code', // products - таблица, code - столбец
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:5',
            'price' => 'required|numeric|min:1',
        ];

        // дописываем к правилу только при обновлении
        if ($this->route()->named('products.update')) {
            // проверяем уникальность у всех кроме текущего id
            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'min' => 'Поле :attribute должно содержать не менее :min символов',
            'unique' => 'С таким значением уже есть',
            'numeric' => 'Должно быть числом',
            'code.required' => 'Поле «код» обязательно для заполнения',
            'code.min' => 'Поле «код» должно содержать не менее :min символов',
            'name.min' => 'Поле «название» должно содержать не менее :min символов',
            'description.min' => 'Поле «описание» должно содержать не менее :min символов',
        ];
    }
}
