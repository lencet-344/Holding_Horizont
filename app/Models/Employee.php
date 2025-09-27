<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = 'employees';
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'name',
        'last_name',
        'identification_card',
        'telephone',
        'email',
        'address',
        'hire_date'
    ];

    public function areas()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
