<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_harvest extends Model
{
    use HasFactory;
    protected $table = 'post_harvests';
    protected $primaryKey = 'post_harvest_id';

    protected $fillable = [
        'activity',
        'date',
        'cost'
    ];

    public function harvests ()
    {
        return $this->belongsTo(Harvest::class, 'harvest_id');
    }
}
