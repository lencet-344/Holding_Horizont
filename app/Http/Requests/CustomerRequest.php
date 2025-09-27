<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'age' => 'required|integer|min:0',
            'gender' => 'required|string|max:50',
            'email' => 'nullable|email|unique:customers,email',
            'telephone' => 'required|integer|unique:customers,telephone',
            'sale_id' => 'required|exists:sales,id',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 150 caracteres.',

            'last_name.required' => 'El apellido es requerido.',
            'last_name.string' => 'El apellido debe ser una cadena de texto.',
            'last_name.max' => 'El apellido no debe exceder los 150 caracteres.',

            'age.required' => 'La edad es requerida.',
            'age.integer' => 'La edad debe ser un número entero.',
            'age.min' => 'La edad no puede ser negativa.',

            'gender.required' => 'El género es requerido.',
            'gender.string' => 'El género debe ser una cadena de texto.',
            'gender.max' => 'El género no debe exceder los 50 caracteres.',

            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            
            'telephone.required' => 'El teléfono es requerido.',
            'telephone.integer' => 'El teléfono debe ser un número entero.',
            'telephone.unique' => 'El teléfono ya está en uso.',

            'sale_id.required' => 'La venta es requerida.',
            'sale_id.exists' => 'La venta seleccionada no existe.',
        ];
    }
}