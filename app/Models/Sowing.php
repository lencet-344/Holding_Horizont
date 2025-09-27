<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sowing extends Model
{
    use HasFactory;

    protected $table = 'sowings';
    protected $primaryKey = 'sowing_id';

    protected $fillable = [
        'crap_type',
        'sowing_date',
        'area_sown',
        'seed_amount',
        'status'
    ];

    public function crops()
    {
        return $this->belongsTo(Crop::class, 'crop_id');
    }
}
