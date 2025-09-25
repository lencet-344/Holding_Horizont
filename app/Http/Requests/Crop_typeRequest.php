<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Crop_typeRequest extends FormRequest
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
            "name" => "required|string|max:100",
            "description" => "required|string",
            "preparation_id" => "required|integer|exists:preparations,id",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "El campo nombre es obligatorio.",
            "name.string" => "El campo nombre debe ser una cadena de texto.",
            "name.max" => "El campo nombre no debe exceder los 100 caracteres.",

            "description.required" => "El campo descripción es obligatorio.",
            "description.string" => "El campo descripción debe ser una cadena de texto.",

            "preparation_id.required" => "El campo preparación es obligatorio.",
            "preparation_id.integer" => "El campo preparación debe ser un número entero.",
            "preparation_id.exists" => "La preparación seleccionada no existe.",
        ];
    }
}