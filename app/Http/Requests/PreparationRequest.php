<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreparationRequest extends FormRequest
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
            'type_preparation' => 'required|string|max:255',
            'star_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:star_date',
            'equipment_used' => 'required|string|max:255',
            'labor_hours' => 'required|integer|min:1',
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
            'type_preparation.required' => 'El tipo de preparación es requerido.',
            'type_preparation.string' => 'El tipo de preparación debe ser una cadena de texto.',
            'type_preparation.max' => 'El tipo de preparación no debe exceder los 255 caracteres.',

            'star_date.required' => 'La fecha de inicio es requerida.',
            'star_date.date' => 'La fecha de inicio debe ser una fecha válida.',

            'end_date.required' => 'La fecha de fin es requerida.',
            'end_date.date' => 'La fecha de fin debe ser una fecha válida.',
            'end_date.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',

            'equipment_used.required' => 'El equipo utilizado es requerido.',
            'equipment_used.string' => 'El equipo utilizado debe ser una cadena de texto.',
            'equipment_used.max' => 'El equipo utilizado no debe exceder los 255 caracteres.',

            'labor_hours.required' => 'Las horas de mano de obra son requeridas.',
            'labor_hours.integer' => 'Las horas de mano de obra deben ser un número entero.',
            'labor_hours.min' => 'Las horas de mano de obra deben ser al menos 1.',

            'cost.required' => 'El costo es requerido.',
            'cost.numeric' => 'El costo debe ser un número.',
            'cost.min' => 'El costo no puede ser negativo.',
        ];
    }
}
