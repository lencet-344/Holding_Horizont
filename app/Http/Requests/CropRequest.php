<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CropRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "crop_name" => "required|string|max:100",
            "variety" => "required|string|max:100",
            "planting_date" => "required|date",
            "harvest_date" => "required|date|after_or_equal:planting_date",
            "area_size" => "required|string|max:50",
            "growth_stage" => "required|string|max:100",
            "quantity" => "required|integer|min:1",

            "area_id" => "required|integer|exists:areas,id",
            "crop_type_id" => "required|integer|exists:crop_types,id",
            "preparation_id" => "required|integer|exists:preparations,id",
            "sowing_id" => "required|integer|exists:sowings,id",
        ];
    }

    public function messages(): array
    {
        return [
            "crop_name.required" => "El campo nombre del cultivo es obligatorio.",
            "crop_name.string" => "El campo nombre del cultivo debe ser una cadena de texto.",
            "crop_name.max" => "El campo nombre del cultivo no debe exceder los 100 caracteres.",

            "variety.required" => "El campo variedad es obligatorio.",
            "variety.string" => "El campo variedad debe ser una cadena de texto.",
            "variety.max" => "El campo variedad no debe exceder los 100 caracteres.",

            "planting_date.required" => "El campo fecha de plantación es obligatorio.",
            "planting_date.date" => "El campo fecha de plantación debe ser una fecha válida.",

            "harvest_date.required" => "El campo fecha de cosecha es obligatorio.",
            "harvest_date.date" => "El campo fecha de cosecha debe ser una fecha válida.",
            "harvest_date.after_or_equal" => "La fecha de cosecha no puede ser anterior a la fecha de plantación.",

            "area_size.required" => "El campo tamaño del área es obligatorio.",
            "area_size.string" => "El campo tamaño del área debe ser una cadena de texto.",
            "area_size.max" => "El campo tamaño del área no debe exceder los 50 caracteres.",

            "growth_stage.required" => "El campo etapa de crecimiento es obligatorio.",
            "growth_stage.string" => "El campo etapa de crecimiento debe ser una cadena de texto.",
            "growth_stage.max" => "El campo etapa de crecimiento no debe exceder los 100 caracteres.",

            "quantity.required" => "El campo cantidad es obligatorio.",
            "quantity.integer" => "El campo cantidad debe ser un número entero.",
            "quantity.min" => "El campo cantidad debe ser al menos 1.",

            "area_id.required" => "El campo área es obligatorio.",
            "area_id.integer" => "El campo área debe ser un número entero.",
            "area_id.exists" => "El área seleccionada no existe.",

            "crop_type_id.required" => "El campo tipo de cultivo es obligatorio.",
            "crop_type_id.integer" => "El campo tipo de cultivo debe ser un número entero.",
            "crop_type_id.exists" => "El tipo de cultivo seleccionado no existe.",

            "preparation_id.required" => "El campo preparación es obligatorio.",
            "preparation_id.integer" => "El campo preparación debe ser un número entero.",
            "preparation_id.exists" => "La preparación seleccionada no existe.",

            "sowing_id.required" => "El campo siembra es obligatorio.",
            "sowing_id.integer" => "El campo siembra debe ser un número entero.",
            "sowing_id.exists" => "La siembra seleccionada no existe.",
        ];
    }
}