<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ingredient;

use App\Models\Recipe;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store(Request $request)
    {
        $ingredient = new Ingredient;
        $ingredient->i_name = $request->input('i_name');
        $ingredient->type = $request->input('type');
        $ingredient->save();

        $recipeId = $request->input('recipe_id');
        
        DB::table('recipe_ingredients')->insert([
            'r_id' => $recipeId,
            'i_id' => $ingredient->id,
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->route('recipes.show', $recipeId);
    }

    public function show($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        
        return view('recipes.show', compact('ingredient'));
    }

    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->i_name = $request->input('i_name');
        $ingredient->type = $request->input('type');
        $ingredient->save();

        return redirect()->route('recipe.index');
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return redirect()->route('recipe.index');
    }
}
