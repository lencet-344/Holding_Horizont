<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HarvestRequest extends FormRequest
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
            'harvest_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'unit' => 'required|string|max:50',
            'storage_location' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',

            'employee_id' => 'required|exists:employees,id',
            'crop_id' => 'required|exists:crops,id',
            'area_id' => 'required|exists:areas,id',
            'crop_type_id' => 'required|exists:crop_types,id',
            'preparation_id' => 'required|exists:preparations,id',
            'sowing_id' => 'required|exists:sowings,id',
            'post_harvest_id' => 'required|exists:harvests,id',
            'sale_id' => 'required|exists:sales,id',
        ];
    }



public function messages(): array
{
    return [
        'harvest_date.required' => 'La fecha de cosecha es requerida.',
        'harvest_date.date' => 'La fecha de cosecha debe ser una fecha válida.',

        'quantity.required' => 'La cantidad es requerida.',
        'quantity.integer' => 'La cantidad debe ser un número entero.',
        'quantity.min' => 'La cantidad debe ser al menos 1.',

        'unit.required' => 'La unidad es requerida.',
        'unit.string' => 'La unidad debe ser una cadena de texto.',
        'unit.max' => 'La unidad no debe tener más de 50 caracteres.',

        'storage_location.required' => 'La ubicación de almacenamiento es requerida.',
        'storage_location.string' => 'La ubicación de almacenamiento debe ser una cadena de texto.',
        'storage_location.max' => 'La ubicación de almacenamiento no debe tener más de 255 caracteres.',

        'cost.required' => 'El costo es requerido.',
        'cost.numeric' => 'El costo debe ser un número.',
        'cost.min' => 'El costo debe ser al menos 0.',

        'employee_id.required' => 'El empleado es requerido.',
        'employee_id.exists' => 'El empleado seleccionado no es válido.',

        'crop_id.required' => 'El cultivo es requerido.',
        'crop_id.exists' => 'El cultivo seleccionado no es válido.',

        'area_id.required' => 'El área es requerida.',
        'area_id.exists' => 'El área seleccionada no es válida.',

        'crop_type_id.required' => 'El tipo de cultivo es requerido.',
        'crop_type_id.exists' => 'El tipo de cultivo seleccionado no es válido.',

        'preparation_id.required' => 'La preparación es requerida.',
        'preparation_id.exists' => 'La preparación seleccionada no es válida.',

        'sowing_id.required' => 'La siembra es requerida.',
        'sowing_id.exists' => 'La siembra seleccionada no es válida.',

        'post_harvest_id.required' => 'El post-cosecha es requerido.',
        'post_harvest_id.exists' => 'El post-cosecha seleccionado no es válido.',

        'sale_id.required' => 'La venta es requerida.',
        'sale_id.exists' => 'La venta seleccionada no es válida.',
        ];
    }
}