@extends('layout')

@section('pageTitle', $recipe->r_name) {{-- Utiliza el nombre de la receta para el título de la página --}}

@section('content')
    <x-bladewind::centered-content size="medium">
        <x-bladewind::card>
            <div class="flex flex-col items-center space-y-4">

                {{-- <x-bladewind::avatar size="regular" image="{{ $recipe->image_url }}" class="mb-4" /> --}}

                <div class="flex flex-col items-center mb-4">
                    <img src="{{ $recipe->image_url }}" />
                </div>

                <div class="text-base text-slate-500 mb-2">
                    <x-bladewind::icon name="clock" /> {{ $recipe->time }} mins
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-semibold text-blue-900">Ingredients</h3>

                <x-bladewind::button show_close_icon="true" onclick="showModal('add-ingredient')">
                    Add ingredient
                </x-bladewind::button>

                <x-bladewind::modal backdrop_can_close="false" name="add-ingredient" ok_button_action="saveProfile()"
                    ok_button_label="Update" close_after_action="false">

                    <form method="post" action="" class="profile-form">
                        @csrf
                        <b class="mt-0">New Ingredient</b>
                        <div class="grid grid-cols-2 gap-4 mt-6">
                            <x-bladewind::input required="true" name="i-name"
                                error_message="Please enter a name" label="Ingredient name" />

                            <x-bladewind::input required="true" name="type" error_message="Please enter a type"
                                label="Ingredient type" />
                        </div>
                        <x-bladewind::input required="true" name="quantity" error_message="Please enter a quantity"
                            label="Quantity" />
                    </form>

                </x-bladewind::modal>



            </div>

            <div class="mt-4">
                <h3 class="text-lg font-semibold text-blue-900">Steps</h3>
                <p class="text-slate-700">[List of steps will go here]</p>
            </div>
        </x-bladewind::card>
    </x-bladewind::centered-content>
@endsection
