@extends('layout')

<div class="flex justify-center mt-8 mb-4">
    @include('partials.nav')
</div>

@section('pageTitle', $recipe->r_name)

@section('content')
    <x-bladewind::centered-content size="medium">
        <x-bladewind::card>
            <div class="flex flex-col items-center space-y-4">

                <div class="flex flex-col items-center mb-4">
                    <img src="{{ $recipe->image_url }}" />
                </div>

                <div class="text-base text-slate-500 mb-2">
                    <x-bladewind::icon name="clock" /> {{ $recipe->time }} mins
                </div>

                <div>
                    <a href="{{ route('recipes.edit', $recipe) }}">
                        <x-bladewind::icon name="pencil-square" />
                    </a>

                </div>
            </div>

            <div class="mt-6 mb-4">
                <div style="background-color: rgb(245, 233, 196)" class="flex justify-center mb-4 mt-8">
                    <h3 style="font-family: 'Pacifico', cursive; color:rgb(148, 75, 42)" class="text-center my-auto text-2xl">Ingredients</h3>
                </div>

                <ul class="list-disc list-inside mb-4">
                    @forelse ($ingredients as $index => $ingredient)
                        <li class="text-slate-700 flex justify-between items-center">
                            {{ $index + 1 }} - {{ $ingredient }}
                            <form
                                action="{{ route('recipes.deleteIngredient', ['recipeId' => $recipe->id, 'ingredientIndex' => $index]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500"><x-bladewind::icon name="backspace"
                                        size="tiny" /></button>
                            </form>
                        </li>
                    @empty
                        <li class="text-slate-700">No ingredients added yet.</li>
                    @endforelse
                </ul>

                <div>

                    <div id="ingredient-form" class="mt-2">
                        <x-bladewind::card>
                            <form method="POST"
                                action="{{ route('recipes.storeIngredient', ['recipeId' => $recipe->id]) }}#scroll-ingr"
                                class="signup-form">
                                @csrf
                                <b class="mt-0" id="scroll-ingr">Add Ingredient</b>
                                <div class="text-center mt-2">
                                    <x-bladewind::input required="true" name="ingredient" type="text"
                                        show_error_inline="true" label="Ingredient - Qty (ex. Salt - A pinch)" />

                                    @error('ingredient')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <x-bladewind::button name="btn-save" has_spinner="true" type="primary" size="tiny"
                                        color="green" outline="true" can_submit="true" class="mt-3">
                                        <x-bladewind::icon name="check" />
                                    </x-bladewind::button>
                                </div>
                            </form>
                        </x-bladewind::card>
                    </div>

                </div>

            </div>

            <div class="mt-4">

                <div style="background-color: rgb(245, 233, 196)" class="flex justify-center mb-4 mt-8">
                    <h3 style="font-family: 'Pacifico', cursive; color:rgb(148, 75, 42)" class="text-center my-auto text-2xl">Steps</h3>
                </div>

                <ul class="list-decimal list-inside mb-4">
                    @forelse ($steps as $index => $step)
                        <li class="text-slate-700 flex justify-between items-center">
                            {{ $index + 1 }} - {{ $step }}
                            <form
                                action="{{ route('recipes.deleteStep', ['recipeId' => $recipe->id, 'stepIndex' => $index]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500"><x-bladewind::icon name="backspace"
                                        size="tiny" /></button>
                            </form>
                        </li>
                    @empty
                        <li class="text-slate-700">No steps added yet.</li>
                    @endforelse
                </ul>

                <div>

                    <div id="step-form" class="mt-2">
                        <x-bladewind::card>
                            <form method="POST"
                                action="{{ route('recipes.storeStep', ['recipeId' => $recipe->id]) }}#scroll-step"
                                class="signup-form">
                                @csrf
                                <b class="mt-0" id="scroll-step">Add Step</b>
                                <div class="text-center mt-2">
                                    <x-bladewind::input required="true" name="step" type="text"
                                        show_error_inline="true" label="Write a step here" />

                                    @error('step')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <x-bladewind::button name="btn-save-2" has_spinner="true" type="primary" size="tiny"
                                        color="green" outline="true" can_submit="true" class="mt-3">
                                        <x-bladewind::icon name="check" />
                                    </x-bladewind::button>
                                </div>
                            </form>
                        </x-bladewind::card>
                    </div>

                </div>
            </div>
        </x-bladewind::card>
    </x-bladewind::centered-content>

@endsection
