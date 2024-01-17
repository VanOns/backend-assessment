<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheeseArtisan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rating',
        'production_capacity',
    ];
}
