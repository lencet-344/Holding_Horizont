<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Crop extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'planting_date',
        'area_id',
        'crop_type_id',
        'expected_yield',
    ];

    /**
     * Relación: Un Cultivo pertenece a un Tipo de Cultivo.
     * Usamos el nombre 'Crop_type' que identificamos en tu sistema.
     */
    public function crop_type_name(): BelongsTo
    {
        // Asegura que se usa el modelo con el nombre correcto de tu sistema
        return $this->belongsTo(Crop_type::class, 'crop_type_id');
    }

    /**
     * Relación: Un Cultivo pertenece a un Área (Finca/Lote).
     */
    public function area_name(): BelongsTo
    {
        // 'area_id' es la clave foránea en la tabla 'crops'
        return $this->belongsTo(Area::class, 'area_id');
    }

    // Puedes añadir más relaciones si el controlador las necesita, por ejemplo,
    // si un Cultivo tiene muchas Siembra:
    /*
    public function sowings(): HasMany
    {
        return $this->hasMany(Sowing::class, 'crop_id');
    }
    */
}

