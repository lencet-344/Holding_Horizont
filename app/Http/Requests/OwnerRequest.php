<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'name' => 'required|string|max:200',
            'last_name' => 'required|string|max:200',
            'identification_card' => 'nullable|string|max:20|unique:owners,identification_card',
            'telephone' => 'required|integer|unique:owners,telephone',
            'email' => 'nullable|string|email|max:200|unique:owners,email',
            'address' => 'nullable|string|max:200',
            'owners' => 'required|string|max:200',
        ];
    }

    public function messages(): array 
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no debe exceder los 200 caracteres.',

            'last_name.required' => 'El campo apellido es obligatorio.',
            'last_name.string' => 'El campo apellido debe ser una cadena de texto.',
            'last_name.max' => 'El campo apellido no debe exceder los 200 caracteres.',


            'identification_card.string' => 'El campo cédula debe ser una cadena de texto.',
            'identification_card.max' => 'El campo cédula no debe exceder los 20 caracteres.',
            'identification_card.unique' => 'La cédula ya está en uso.',

            'telephone.required' => 'El campo teléfono es obligatorio.',
            'telephone.integer' => 'El campo teléfono debe ser un número entero.',
            'telephone.unique' => 'El teléfono ya está en uso.',

            'email.string' => 'El campo correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El campo correo electrónico no debe exceder los 200 caracteres.',
            'email.unique' => 'El correo electrónico ya está en uso.',

            'address.string' => 'El campo dirección debe ser una cadena de texto.',
            'address.max' => 'El campo dirección no debe exceder los 200 caracteres.',

            'owners.required' => 'El campo owners es obligatorio.',
            'owners.string' => 'El campo owners debe ser una cadena de texto.',
            'owners.max' => 'El campo owners no debe exceder los 200 caracteres.',
        ];
    }
}