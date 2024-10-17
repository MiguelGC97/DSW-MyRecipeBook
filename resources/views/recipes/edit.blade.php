@extends('layout')

@section('pageTitle', 'Edit Recipe')

@section('content')

    <x-bladewind::notification />

    <x-bladewind::card>

        <form method="POST" class="signup-form" action="{{ route('recipes.update', $recipe->id) }}">

            @csrf
            @method('PATCH')

            <x-bladewind::input name="r_name" required="true" label="Name" value="{{ $recipe->r_name }}" />

            <x-bladewind::input name="time" required="true" label="Time" value="{{ $recipe->time }}" />

            <x-bladewind::input name="image_url" required="false" label="Image url" value="{{ $recipe->image_url }}" />

            <div class="text-center">

                <div class="flex justify-center items-center">

                    <a href="{{ route('recipes.show', $recipe->id) }}" class="mr-3">
                        <x-bladewind::icon name="arrow-uturn-left" />
                    </a>


                    <x-bladewind::button name="btn-save" has_spinner="true" type="primary" can_submit="true"
                        class="mt-3 ml-3" color="green">
                        Save
                    </x-bladewind::button>
                </div>

            </div>

        </form>

    </x-bladewind::card>

@endsection
