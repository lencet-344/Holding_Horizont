<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'identification_card' => 'nullable|string|max:20|unique',
            'telephone' => 'required|integer|unique',
            'email' => 'nullable|string|email|max:50|unique',
            'address' => 'required|string|max:150',
            'hire_date' => 'required|date',
            
        ];
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no debe exceder los 150 caracteres.', 

            'last_name.required' => 'El campo apellido es obligatorio.',
            'last_name.string' => 'El campo apellido debe ser una cadena de texto.',
            'last_name.max' => 'El campo apellido no debe exceder los 150 caracteres.',

            'identification_card.string' => 'El campo cédula debe ser una cadena de texto.',
            'identification_card.max' => 'El campo cédula no debe exceder los 20 caracteres.',
            'identification_card.unique' => 'El campo cédula ya está en uso.',

            'telephone.required' => 'El campo teléfono es obligatorio.',
            'telephone.integer' => 'El campo teléfono debe ser un número entero.',
            'telephone.unique' => 'El campo teléfono ya está en uso.',

            'email.string' => 'El campo correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El campo correo electrónico no debe exceder los 50 caracteres.',
            'email.unique' => 'El campo correo electrónico ya está en uso.',

            'address.required' => 'El campo dirección es obligatorio.',
            'address.string' => 'El campo dirección debe ser una cadena de texto.',
            'address.max' => 'El campo dirección no debe exceder los 150 caracteres.',

            'hire_date.required' => 'El campo fecha de contratación es obligatorio.',
            'hire_date.date' => 'El campo fecha de contratación debe ser una fecha válida.',
        ];
    }
}