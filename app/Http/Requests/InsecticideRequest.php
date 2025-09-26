<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsecticideRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type_insecticide' => 'required|string|max:255',
            'active_ingredient' => 'required|string|max:255',
            'recomended_dose' => 'required|string|max:255',
            'measure' => 'required|string|max:255',
            'technical_sheel' => 'required|string|max:255',
            'preparation_id' => 'required|exists:preparations,id',
        ];
}

    public function messages()
    {
        return [
            
            'name required' => 'El campo nombre es obligatorio.',
            'name string' => 'El campo nombre debe ser una cadena de texto.',
            'name max' => 'El campo nombre no debe exceder los 255 caracteres.',

            'type_insecticide required' => 'El campo tipo de insecticida es obligatorio.',
            'type_insecticide string' => 'El campo tipo de insecticida debe ser una cadena de texto.',
            'type_insecticide max' => 'El campo tipo de insecticida no debe exceder los 255 caracteres.',

            'active_ingredient required' => 'El campo ingrediente activo es obligatorio.',
            'active_ingredient string' => 'El campo ingrediente activo debe ser una cadena de texto.',
            'active_ingredient max' => 'El campo ingrediente activo no debe exceder los 255 caracteres.',

            'recomended_dose required' => 'El campo dosis recomendada es obligatorio.',
            'recomended_dose string' => 'El campo dosis recomendada debe ser una cadena de texto.',
            'recomended_dose max' => 'El campo dosis recomendada no debe exceder los 255 caracteres.',

            'measure required' => 'El campo medida es obligatorio.',
            'measure string' => 'El campo medida debe ser una cadena de texto.',
            'measure max' => 'El campo medida no debe exceder los 255 caracteres.',

            'technical_sheel required' => 'El campo ficha técnica es obligatorio.',
            'technical_sheel string' => 'El campo ficha técnica debe ser una cadena de texto.',
            'technical_sheel max' => 'El campo ficha técnica no debe exceder los 255 caracteres.',

            'preparation_id required' => 'El campo preparación es obligatorio.',
            'preparation_id exists' => 'La preparación seleccionada no es válida.',
        ];
    }
}