<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $primaryKey = 'sale_id';

    protected $fillable = [
        'date',
        'quantity',
        'mount',
        'description'
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function harvests()
    {
        return $this->belongsTo(Harvest::class, 'harvest_id');
    }

}
