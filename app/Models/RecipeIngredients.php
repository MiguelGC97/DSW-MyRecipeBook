<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredients extends Model
{
    use HasFactory;

    protected $fillable = [
        'r_id',
        'i_id',
        'quantity',
    ];
}
