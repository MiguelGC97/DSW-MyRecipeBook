@extends('layout')

@section('pageTitle', 'New Recipe')

@section('content')

    <div class="flex flex-col items-center mt-2 mb-2">
        <a href="{{ route('recipes.index') }}" title="My recipes" class="mr-2">
            <x-bladewind::icon name="recipe-book" dir="assets/icons" class="h-8 w-8" />
        </a>
    </div>

    <x-bladewind::card>

        <form method="POST" class="signup-form" action="{{ route('recipes.store') }}">

            @csrf

            @error('r_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-bladewind::input name="r_name" required="true" show_error_inline="true" label="Recipe name" />

            @error('time')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-bladewind::input name="time" required="true" show_error_inline="true" label="Elaboration time (mins)" />

            <x-bladewind::input name="image_url" required="false" label="Image url (Optional)" />

            <div class="text-center">

                <x-bladewind::button name="btn-save" has_spinner="true" type="primary" can_submit="true" class="mt-3"
                    color="green" size="small">
                    Add recipe
                </x-bladewind::button>

            </div>

        </form>

    </x-bladewind::card>

@endsection
