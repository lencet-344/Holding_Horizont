<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $table = 'productions';
    protected $primaryKey = 'production_id';

    protected $fillable = [
        'quality',
        'date_production',
        'description'
    ];

    public function harvests()
    {
        return $this->belongsTo(Harvest::class, 'harvest_id');
    }

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
        return $this->belongsTo(Preparation::class, 'preparation_id');
    }

    public function sowings()
    {
        return $this-> belongsTo(Sowing::class, 'sowing_id');
    }
}
