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
        $recipe->save();

        return redirect()->route('recipes.index');
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

    public function delete($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
