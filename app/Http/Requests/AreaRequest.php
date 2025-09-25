<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'description' => 'nullable|string|max:200',

            // Claves foráneas
            'farm_id' => 'required|exists:farms,id',
            'owner_id' => 'required|exists:owners,id',
            'property_type_id' => 'required|exists:property_types,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe ser mayor a 100 caracteres.',

            'location.required' => 'El campo ubicación es obligatorio.',
            'location.string' => 'La ubicación debe ser una cadena de texto.',
            'location.max' => 'La ubicación no debe ser mayor a 100 caracteres.',

            'description.string' => 'La descripción debe ser una cadena de texto.',
            'description.max' => 'La descripción no debe ser mayor a 200 caracteres.',

            'farm_id.required' => 'El campo finca es obligatorio.',
            'farm_id.exists' => 'La finca seleccionada no es válida.',

            'owner_id.required' => 'El campo propietario es obligatorio.',
            'owner_id.exists' => 'El propietario seleccionado no es válido.',

            'property_type_id.required' => 'El campo tipo de propiedad es obligatorio.',
            'property_type_id.exists' => 'El tipo de propiedad seleccionado no es válido.',
        ];
    }
}