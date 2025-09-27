<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $primaryKey = 'area_id';

    protected $fillable = [
        'name',
        'location',
        'description'
    ];
    public function farms()
    {
        $this->belongsTo(Farm::class, 'farm_id');
    }

    public function crops()
    {
        return $this->hasMany(Crop::class, 'area_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'area_id');
    }
}
