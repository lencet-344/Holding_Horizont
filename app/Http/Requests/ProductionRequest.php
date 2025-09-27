<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductionRequest extends FormRequest
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
            'quality' => 'required|string|max:250',
            'date_production' => 'required|date',
            'description' => 'required|string',

            'harvest_id' => 'required|exists:harvests,id',
            'crop_id' => 'required|exists:crops,id',
            'area_id' => 'required|exists:areas,id',
            'crop_type_id' => 'required|exists:crop_types,id',
            'preparation_id' => 'required|exists:preparations,id',
            'sowing_id' => 'required|exists:sowings,id',
        ];
    }

    public function messages(): array
    {
        return [
            'quality.required' => 'El campo calidad es obligatorio.',
            'quality.string' => 'La calidad debe ser una cadena de texto.',
            'quality.max' => 'La calidad no puede tener más de 250 caracteres.',

            'date_production.required' => 'El campo fecha de producción es obligatorio.',
            'date_production.date' => 'La fecha de producción debe ser una fecha válida.',

            'description.required' => 'El campo descripción es obligatorio.',
            'description.string' => 'La descripción debe ser una cadena de texto.',

            'harvest_id.required' => 'El campo cosecha es obligatorio.',
            'harvest_id.exists' => 'La cosecha seleccionada no es válida.',

            'crop_id.required' => 'El campo cultivo es obligatorio.',
            'crop_id.exists' => 'El cultivo seleccionado no es válido.',

            'area_id.required' => 'El campo área es obligatorio.',
            'area_id.exists' => 'El área seleccionada no es válida.',

            'crop_type_id.required' => 'El campo tipo de cultivo es obligatorio.',
            'crop_type_id.exists' => 'El tipo de cultivo seleccionado no es válido.',

            'preparation_id.required' => 'El campo preparación es obligatorio.',
            'preparation_id.exists' => 'La preparación seleccionada no es válida.',

            'sowing_id.required' => 'El campo siembra es obligatorio.',
            'sowing_id.exists' => 'La siembra seleccionada no es válida.',
        ];
    }
}
