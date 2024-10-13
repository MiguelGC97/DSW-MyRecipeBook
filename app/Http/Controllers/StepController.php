<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Step;

class StepController extends Controller
{
    public function index()
    {
        $steps = Step::all();
        return view('steps.index', compact('steps'));
    }

    public function create()
    {
        return view('steps.create');
    }

    public function store(Request $request)
    {
        $step = new Step;
        $step->description = $request->input('description');
        $step->order = $request->input('order');
        $step->save();

        return redirect()->route('recipes.index');
    }

    public function show($id)
    {
        $step = Step::findOrFail($id);
        
        return view('recipes.show', compact('step'));
    }

    public function edit($id)
    {
        $step = Step::findOrFail($id);
        
        return redirect()->back(); // redirige a la página desde la que se hizo la solicitud. Si es la misma refresca.
    }

    public function update(Request $request, $id)
    {
        $step = Step::findOrFail($id);
        $step->description = $request->input('description');
        $step->order = $request->input('order');
        $step->save();

        return redirect()->route('recipe.index');
    }

    public function delete($id)
    {
        $step = Step::findOrFail($id);
        $step->delete();

        return redirect()->route('recipe.index');
    }
}
