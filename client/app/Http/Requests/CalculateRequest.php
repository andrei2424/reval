<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateRequest extends FormRequest
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
            'number1' => [
                'bail',
                'required',
                'numeric',
            ],
            'number2' => [
                'bail',
                'required',
                'numeric',
            ]
        ];
    }

    public function getNumber1()
    {
        return $this->get('number1');
    }

    public function getNumber2()
    {
        return $this->get('number2');
    }
}
