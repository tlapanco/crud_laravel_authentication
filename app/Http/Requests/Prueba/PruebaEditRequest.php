<?php

namespace App\Http\Requests\Prueba;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PruebaEditRequest extends FormRequest
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
            'name' => ['required', 'max:60', 'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/', Rule::unique('prueba','name')->withoutTrashed()->ignore($this->item)],
            'gender' => 'required',
            'role' => 'required',
            'description' => 'required|string'
        ];
    }
}
