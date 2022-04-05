<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorsInMovie extends Model
{
    use HasFactory;

    protected $fillable = [
        'actor_id',
        'film_id',
    ];
}
