@extends('layout')

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
                <h3 class="text-lg font-semibold text-blue-900 mb-4">Ingredients</h3>

                <ul class="list-disc list-inside mb-4">
                    @forelse ($ingredients as $index => $ingredient)
                        <li class="text-slate-700 flex justify-between items-center">
                            {{ $ingredient }}
                            <form
                                action="{{ route('recipes.deleteIngredient', ['recipeId' => $recipe->id, 'ingredientIndex' => $index]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500"><x-bladewind::icon name="backspace" size="tiny"/></button>
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
                                action="{{ route('recipes.storeIngredient', ['recipeId' => $recipe->id]) }}"
                                class="signup-form">
                                @csrf
                                <b class="mt-0">Add Ingredient</b>
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
                <h3 class="text-lg font-semibold text-blue-900">Steps</h3>
                <p class="text-slate-700">[List of steps will go here]</p>
            </div>
        </x-bladewind::card>
    </x-bladewind::centered-content>

@endsection
