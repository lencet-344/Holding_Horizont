<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparation extends Model
{
    use HasFactory;

    protected $table = 'preparations';
    protected $primaryKey = 'preparation_id';

    protected $fillable = [
        'type_preparation',
        'star_date',
        'end_date',
        'equipment_used',
        'labor_hours',
        'cost'
    ];

    public function crops()
    {
        return $this->belongsTo(Crop::class, 'crop_id');
    }

}
