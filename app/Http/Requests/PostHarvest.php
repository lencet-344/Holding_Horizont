<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostHarvest extends FormRequest
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
        'activity' => 'required|string|max:255',
        'date' => 'required|date',
        'cost' => 'required|numeric|min:0',
    ];
}

/**
 * Get custom error messages for validator.
 *
 * @return array
 */
public function messages()
{
    return [
        'activity.required' => 'La actividad es requerida.',
        'activity.string' => 'La actividad debe ser una cadena de texto.',
        'activity.max' => 'La actividad no debe exceder los 255 caracteres.',

        'date.required' => 'La fecha es requerida.',
        'date.date' => 'La fecha debe ser una fecha válida.',

        'cost.required' => 'El costo es requerido.',
        'cost.numeric' => 'El costo debe ser un número.',
        'cost.min' => 'El costo no debe ser negativo.',
    ];
}
}
