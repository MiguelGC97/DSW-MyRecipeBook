@extends('layout')

@section('pageTitle', 'Edit Recipe')

@section('content')

    <x-bladewind::notification />

    <x-bladewind::card>

        <form method="POST" class="signup-form" action="{{ route('recipes.update', $recipe->id) }}">

            @csrf
            @method('PATCH')

            @error('r_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-bladewind::input name="r_name" required="true" show_error_inline="true" label="Recipe name" value="{{ $recipe->r_name }}" />

            @error('time')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-bladewind::input name="time" required="true" show_error_inline="true" label="Elaboration time (mins)" value="{{ $recipe->time }}" />

            <x-bladewind::input name="image_url" required="false" label="Image url (Optional)" value="{{ $recipe->image_url !== 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/800px-No_image_available.svg.png' ? $recipe->image_url : '' }}"  />

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
