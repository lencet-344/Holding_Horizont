<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Agronomic_expenseRequest extends FormRequest
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
            'expense_type' => 'required|string|max:255',
            'description' => 'required|string',
            'preparation_id' => 'required|exists:preparations,id',
        ];
    }

    public function messages(): array
    {
        return [
            'expense_type.required' => 'El campo tipo de gasto es obligatorio.',
            'expense_type.string' => 'El tipo de gasto debe ser una cadena de texto.',
            'expense_type.max' => 'El tipo de gasto no debe ser mayor a 255 caracteres.',

            'description.required' => 'El campo descripción es obligatorio.',
            'description.string' => 'La descripción debe ser una cadena de texto.',

            'preparation_id.required' => 'El campo preparación es obligatorio.',
            'preparation_id.exists' => 'La preparación seleccionada no es válida.',
        ];
    }
}