<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SowingRequest extends FormRequest
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
            'crap_type' => 'required|string|max:255',
            'sowing_date' => 'required',
            'area_sown' => 'required|string|min:3|max:255',
            'seed_amount' => 'required|integer',
            'status' => 'required|string|min:5|max:30',
        ];
    }
    /**
         * Get the custom messages for validator errors.
         *mensajes personalizados
         * @return array
         */

        public function messages()
        {
            return [
                'crap_type.required' => 'El tipo de cultivo es requerido.',
                'crap_type.string' => 'El tipo de cultivo debe ser una cadena de texto.',
                'crap_type.max' => 'El tipo de cultivo no debe exceder los 255 caracteres.',


                'sowing_date.required' => 'La fecha de siembra es requerida.',
                'sowing_date.string' => 'La fecha de siembra debe ser una fecha válida.',
                

                'area_sown.required' => 'El área sembrada es requerida.',
                'area_sown.string' => 'El area sembrada debe ser texto.',
                'area_sown.min' => 'El área sembrada debe tener al menos 3 caracteres.',
                'area_sown.max' => 'El área sembrada no debe exceder los 255 caracteres.',

               
                'seed_amount.required' => 'La cantidad de semillas es requerida.',
                'seed_amount.integer' => 'La cantidad de semillas debe ser un número entero.',
                
                'status.required' => 'El estado es requerido.',
                'status.string' => 'El estado debe ser una cadena de texto.',
                'status.min' => 'El estado debe tener al menos 5 caracteres.',
                'status.max' => 'El estado no debe exceder los 30 caracteres.',
            ];
        }
    }

