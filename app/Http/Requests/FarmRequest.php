<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'extensions' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'departament' => 'required|string|max:100',
            'municipaly' => 'required|string|max:100',
            'state' => 'required|string',
            'telephone' => 'required|integer|unique:farms,telephone',
            'address' => 'nullable|string|max:200',

            'owner_id' => 'required|integer|exists:owners,id',
            'property_type_id' => 'required|integer|exists:property_types,id',
        ];
    }

    public function messages(): array 
    {
        return [
            'name.required' => 'El campo nombre es requerido.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no debe exceder los 100 caracteres.',

            'extensions.required' => 'El campo extensión es obligatorio.',
            'extensions.string' => 'El campo extensión debe ser una cadena de texto.',
            'extensions.max' => 'El campo extensión no debe exceder los 100 caracteres.',

            'location.required' => 'El campo ubicación es obligatorio.',
            'location.string' => 'El campo ubicación debe ser una cadena de texto.',
            'location.max' => 'El campo ubicación no debe exceder los 100 caracteres.',

            'departament.required' => 'El campo departamento es obligatorio.',
            'departament.string' => 'El campo departamento debe ser una cadena de texto.',
            'departament.max' => 'El campo departamento no debe exceder los 100 caracteres.',

            'municipaly.required' => 'El campo municipio es obligatorio.',
            'municipaly.string' => 'El campo municipio debe ser una cadena de texto.',
            'municipaly.max' => 'El campo municipio no debe exceder los 100 caracteres.',

            'state.required' => 'El campo estado es obligatorio.',
            'state.string' => 'El campo estado debe ser una cadena de texto.',

            'telephone.required' => 'El campo teléfono es obligatorio.',
            'telephone.integer' => 'El campo teléfono debe ser un número entero.',
            'telephone.unique' => 'El teléfono ya está en uso.',

            'address.string' => 'El campo dirección debe ser una cadena de texto.',
            'address.max' => 'El campo dirección no debe exceder los 200 caracteres.',

            'owner_id.required' => 'El campo propietario es obligatorio.',
            'owner_id.integer' => 'El campo propietario debe ser un número entero.',
            'owner_id.exists' => 'El propietario seleccionado no existe.',

            'property_type_id.required' => 'El campo tipo de propiedad es obligatorio.',
            'property_type_id.integer' => 'El campo tipo de propiedad debe ser un número entero.',
            'property_type_id.exists' => 'El tipo de propiedad seleccionado no existe.',
        ];
    }
}