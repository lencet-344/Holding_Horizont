<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insecticide extends Model
{
    use HasFactory;

    protected $table = 'insecticides';
    protected $primaryKey = 'insecticide_id';

    protected $fillable = [
        'name',
        'type_insecticide',
        'active_ingredient',
        'recomended_dose',
        'measure',
        'technical_sheel'
    ];

    public function crops()
    {
        return $this->belongsTo(Crop:: class, 'crop_id');
    }
}
