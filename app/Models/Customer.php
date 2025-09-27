<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    
    protected $fillable = [
        'name',
        'last_name',
        'age',
        'gender',
        'email',
        'telephone'
    ];
    
    public function sales()
    {
        return $this->hasMany(Sale::class, 'customer_id');
    }
}
