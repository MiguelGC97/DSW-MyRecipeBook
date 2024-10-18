<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recipe;

class RecipeController extends Controller
{


    public function index(Request $request)
    {
        $query = Recipe::query();

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }
        
        // $recipes = Recipe::all();

        $recipes = $query->get();

        $types = [
            ['label' => 'All', 'value' => ''],
            ['label' => 'Appetizer', 'value' => 'ap'],
            ['label' => 'Soup', 'value' => 'sp'],
            ['label' => 'Pasta', 'value' => 'pt'],
            ['label' => 'Salad', 'value' => 'sd'],
            ['label' => 'Meat', 'value' => 'mt'],
            ['label' => 'Fish', 'value' => 'fi'],
            ['label' => 'Dessert', 'value' => 'ds'],
            ['label' => 'Other', 'value' => 'oth'],
        ];

        return view('recipes.index', compact('recipes', 'types'));
    }

    public function create()
    {   
        $types = [
            ['label' => 'Appetizers',           'value' => 'ap'],
            ['label' => 'Soups',                'value' => 'sp'],
            ['label' => 'Pasta',                'value' => 'pt'],
            ['label' => 'Salads',               'value' => 'sd'],
            ['label' => 'Meats',                'value' => 'mt'],
            ['label' => 'Fish',                 'value' => 'fi'],
            ['label' => 'Desserts',             'value' => 'ds']
        ];

        return view('recipes.create', compact('types'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'r_name' => 'required|string|max:255',
            'time' => 'required|integer',

        ], [
            'r_name.required' => 'Please enter a name',
            'r_name.max' => 'The name cannot exceed 255 characters.',
            'time.required' => 'Please enter a time',
            'time.integer' => 'Please enter an integer',
        ]);

        $recipe = new Recipe;
        $recipe->r_name = $request->input('r_name');
        $recipe->time = $request->input('time');

        if ($request->filled('image_url')) {
            $recipe->image_url = $request->input('image_url');
        } else {
            $recipe->image_url = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/800px-No_image_available.svg.png';
        }

        if ($request->filled('type')) {
            $recipe->type = $request->input('type');
        } else {
            $recipe->type = 'oth';
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

    public function storeType(Request $request, $recipeId)
    {

        $recipe = Recipe::find($recipeId);
        $recipe->type = $request->input('type');
        if ($request->filled('type')) {
            $recipe->type = $request->input('type');
        } else {
            $recipe->type = 'Other';
        }
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        $ingredients = json_decode($recipe->ingredients, true) ?? [];
        $steps = json_decode($recipe->steps, true) ?? [];

        $types = [
            'ap' => 'appetizer',
            'sp' => 'soup',
            'pt' => 'pasta',
            'sd' => 'salad',
            'mt' => 'meat',
            'fi' => 'fish',
            'ds' => 'dessert',
            'oth' => 'other',
        ];

        $typeLabel = $types[$recipe->type];

        return view('recipes.show', compact('recipe', 'ingredients', 'steps', 'typeLabel'));
    }

    public function edit(Recipe $recipe)
    {
        $types = [
            ['label' => 'Appetizers',           'value' => 'ap'],
            ['label' => 'Soups',                'value' => 'sp'],
            ['label' => 'Pasta',                'value' => 'pt'],
            ['label' => 'Salads',               'value' => 'sd'],
            ['label' => 'Meats',                'value' => 'mt'],
            ['label' => 'Fish',                 'value' => 'fi'],
            ['label' => 'Desserts',             'value' => 'ds']
        ];

        return view('recipes.edit', compact('recipe', 'types'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->r_name = $request->input('r_name');
        $recipe->time = $request->input('time');

        if ($request->filled('image_url')) {
            $recipe->image_url = $request->input('image_url');
        } else {
            $recipe->image_url = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/800px-No_image_available.svg.png';
        }

        if ($request->filled('type')) {
            $recipe->type = $request->input('type');
        } else {
            $recipe->type = 'oth';
        }
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
