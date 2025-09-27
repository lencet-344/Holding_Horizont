<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;
    protected $table = 'crops';
    protected $primaryKey = 'crop_id';

    protected $fillable = [
        'crop_name',
        'variety',
        'planting_date',
        'harvest_date',
        'area_size',
        'growth_stage',
        'quantity'
    ];

    public function areas()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function crop_types()
    {
        return $this->belongsTo(Crop_type::class, 'crop_type_id');
    }

    public function preparations()
    {
        return $this->hasMany(Preparation::class, 'crop_id');
    }

    public function sowings()
    {
        return $this->hasMany(Sowing::class, ' crop_id');
    }

    public function  harvests()
    {
        return $this->hasMany(Harvest::class, 'crop_id');
    }
}
