@extends('layout')

@section('pageTitle', $recipe->r_name) {{-- Utiliza el nombre de la receta para el título de la página --}}

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
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-semibold text-blue-900">Ingredients</h3>

                <x-bladewind::card>
                    <form method="POST" action="{{ route('recipes.storeIngredient') }}" class="signup-form">
                        @csrf
                        <b class="mt-0">New Ingredient</b>
                        <div class="text-center">
                            <x-bladewind::input required="true" name="ingredient" type="text"
                                error_message="Please enter an ingredient" label="Ingredient - Qty (ex. Salt - A pinch)" />

                                <x-bladewind::input required="true" name="recipe_id" type="hidden"
                                value="{{ $recipe->id }}" />
                        </div>

                        <div class="text-center">

                            <x-bladewind::button name="btn-save" has_spinner="true" type="primary" size="tiny"
                                can_submit="true" class="mt-3">
                                Add ingredient
                            </x-bladewind::button>

                        </div>
                </x-bladewind::card>

            </div>

            <div class="mt-4">
                <h3 class="text-lg font-semibold text-blue-900">Steps</h3>
                <p class="text-slate-700">[List of steps will go here]</p>
            </div>
        </x-bladewind::card>
    </x-bladewind::centered-content>
@endsection
