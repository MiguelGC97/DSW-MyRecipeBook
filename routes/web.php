<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('recipes', RecipeController::class);

Route::post('/recipes', [RecipeController::class, 'storeIngredient'])->name('recipes.storeIngredient');
