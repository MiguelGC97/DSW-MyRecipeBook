<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'r_name',
        'time',
        'image_url',
        'type',
        'ingredients',
        'steps',
    ];
}
