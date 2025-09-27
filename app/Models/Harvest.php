<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    use HasFactory;

    protected $table = 'harvests';
    protected $primaryKey = 'harvest_id';

    protected $fillable = [
        'harvest_date',
        'quantity',
        'unit',
        'storage_location',
        'cost'
    ];

    public function crops()
    {
        return $this->belongsTo(Crop::class, ' crop_id');
    }

    public function post_harvests()
    {
        return $this->hasMany(Post_harvest::class , 'harvest_id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'harvest_id');
    }
}
