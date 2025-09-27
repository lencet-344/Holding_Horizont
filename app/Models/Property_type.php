<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_type extends Model
{
    use HasFactory;

    protected $table = 'property_types';
    protected $primaryKey = 'property_type_id';

    protected $fillable = [
        'name',
        'description'
    ];

    public function farms()
    {
        return $this->hasMany(Farm::class, 'property_type_id');
    }
}
