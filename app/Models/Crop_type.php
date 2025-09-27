<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop_type extends Model
{
    use HasFactory;
    protected $table = 'crop_types';
    protected $primaryKey = 'crop_type_id';

    protected $fillable = [
        'name',
        'description'
    ];

    public function crops()
{
    return $this->hasMany(Crop::class, 'crop_type_id');
}

    public function productions()
    {
        return $this->hasMany(Production::class, 'crop_type_id');
    }
}
