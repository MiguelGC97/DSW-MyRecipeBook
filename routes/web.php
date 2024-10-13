<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\RecipeController;

use App\Http\Controllers\IngredientController;

use App\Http\Controllers\StepController;

Route::resource('recipes', RecipeController::class);

Route::resource('ingredients', IngredientController::class);

Route::resource('steps', StepController::class);
