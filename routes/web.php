<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecipeController;

use App\Http\Controllers\IngredientController;

use App\Http\Controllers\StepController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('recipes', RecipeController::class);

Route::resource('ingredients', IngredientController::class);

Route::resource('steps', StepController::class);
