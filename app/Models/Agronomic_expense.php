<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agronomic_expense extends Model
{
    use HasFactory;
    protected $table = 'agronomic_expenses';
    protected $primaryKey = 'agronomic_expense_id';

    protected $fillable = [
        'expense_type',
        'description'
    ];

    public function preparations()
    {
        return $this->belongsTo(Preparation::class, 'preparation_id');
    }
}
