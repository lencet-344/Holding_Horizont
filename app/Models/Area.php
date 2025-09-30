<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'farm_id',
    ];

    // Relación: Un Área puede tener muchos Cultivos
    public function crops(): HasMany
    {
        // 'area_id' es la clave foránea en la tabla 'crops'
        return $this->hasMany(Crop::class, 'area_id');
    }

    // Si también tienes un modelo Farm (Finca), la relación sería:
    /*
    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }
    */
}
