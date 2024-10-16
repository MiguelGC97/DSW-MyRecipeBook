<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;

class RecipeController extends Controller
{

    
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));

    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $recipe = new Recipe;
        $recipe->r_name = $request->input('r_name');
        $recipe->time = $request->input('time');
        if ($request->filled('image_url')) {
            $recipe->image_url = $request->input('image_url');
        } else {
            $recipe->image_url = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Good_Food_Display_-_NCI_Visuals_Online.jpg/800px-Good_Food_Display_-_NCI_Visuals_Online.jpg';
        }
        $recipe->save();

        return redirect()->route('recipes.index');
    }

    public function storeIngredient(Request $request)
    {
        $recipeId = $request->input('recipe_id');

        $recipe = Recipe::find($recipeId);
        $ingredients = json_decode($recipe->ingredients, true);

        $newIngredient = $request->input('ingredient');
        $ingredients[] = $newIngredient;

        $recipe->ingredients = json_encode($ingredients);
        $recipe->save();

        return redirect()->route('recipes.show', ['recipe' => $recipeId]);
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        
        return view('recipes.show', compact('recipe'));
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->r_name = $request->input('r_name');
        $recipe->time = $request->input('time');
        $recipe->save();

        return redirect()->route('recipes.index');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
