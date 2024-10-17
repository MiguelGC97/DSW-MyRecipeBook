<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/recipes/{recipeId}/store-ingredient', [RecipeController::class, 'storeIngredient'])->name('recipes.storeIngredient');

Route::delete('/recipes/{recipeId}/ingredients/{ingredientIndex}', [RecipeController::class, 'destroyIngredient'])->name('recipes.deleteIngredient');

Route::resource('recipes', RecipeController::class);
