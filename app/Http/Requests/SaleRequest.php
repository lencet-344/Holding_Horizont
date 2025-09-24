<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'date' => 'required|date',
            'quantity' => 'required|integer',
            'mount' => 'required|numeric',
            'description' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => 'El campo fecha es obligatorio.',
            'date.date' => 'El campo fecha debe ser una fecha válida.',

            'quantity.required' => 'El campo cantidad es obligatorio.',
            'quantity.integer' => 'El campo cantidad debe ser un número entero.',

            'mount.required' => 'El campo monto es obligatorio.',
            'mount.numeric' => 'El campo monto debe ser un número válido.',

            'description.required' => 'El campo descripción es obligatorio.',
            'description.string' => 'El campo descripción debe ser una cadena de texto.',
        ];
    }
}
