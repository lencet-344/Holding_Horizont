<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $table = 'farms';
    protected $primaryKey= 'farm_id';

    protected $fillable = [
        'name',
        'extension',
        'location',
        'departament',
        'municipaly',
        'state',
        'telephone',
        'address'
    ];

    public function areas()
    {
        return $this->hasMany(Area::class, 'farm_id');
    }

    public function property_types()
    {
        return $this->belongsTo(Property_type::class, 'property_type_id');
    }
}
