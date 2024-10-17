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
            $recipe->image_url = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/800px-No_image_available.svg.png';
        }
        $recipe->save();

        return redirect()->route('recipes.index');
    }

    public function storeIngredient(Request $request, $recipeId)
    {

        $request->validate([
            'ingredient' => 'required|string|max:255',
            
        ], [
            'ingredient.required' => 'Please enter an ingredient',
            'ingredient.max' => 'The ingredient cannot exceed 255 characters.',
        ]);

        $recipe = Recipe::find($recipeId);
        $ingredients = json_decode($recipe->ingredients, true);

        $newIngredient = $request->input('ingredient');
        $ingredients[] = $newIngredient;

        $recipe->ingredients = json_encode($ingredients);
        $recipe->save();

        return redirect()->route('recipes.show', ['recipe' => $recipeId]);
    }

    public function storeStep(Request $request, $recipeId)
    {

        $request->validate([
            'step' => 'required|string|max:255',
            
        ], [
            'step.required' => 'Please enter a step',
            'step.max' => 'The step cannot exceed 1000 characters.',
        ]);

        $recipe = Recipe::find($recipeId);
        $steps = json_decode($recipe->steps, true);

        $newStep = $request->input('step');
        $steps[] = $newStep;

        $recipe->steps = json_encode($steps);
        $recipe->save();

        return redirect()->route('recipes.show', ['recipe' => $recipeId]);
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        $ingredients = json_decode($recipe->ingredients, true) ?? [];
        $steps = json_decode($recipe->steps, true) ?? [];
        
        return view('recipes.show', compact('recipe', 'ingredients', 'steps'));
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->r_name = $request->input('r_name');
        $recipe->time = $request->input('time');
        $recipe->save();

        return redirect()->route('recipes.show', ['recipe' => $id]);
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index');
    }

    public function destroyIngredient($recipeId, $ingredientIndex)
    {
        $recipe = Recipe::findOrFail($recipeId);
        $ingredients = json_decode($recipe->ingredients, true);

        if (isset($ingredients[$ingredientIndex])) {
            unset($ingredients[$ingredientIndex]);
        }

        $recipe->ingredients = json_encode(array_values($ingredients));
        $recipe->save();

        return redirect()->route('recipes.show', ['recipe' => $recipeId]);
    }

    public function destroyStep($recipeId, $stepIndex)
    {
        $recipe = Recipe::findOrFail($recipeId);
        $steps = json_decode($recipe->steps, true);

        if (isset($steps[$stepIndex])) {
            unset($steps[$stepIndex]);
        }

        $recipe->steps = json_encode(array_values($steps));
        $recipe->save();

        return redirect()->route('recipes.show', ['recipe' => $recipeId]);
    }

}
