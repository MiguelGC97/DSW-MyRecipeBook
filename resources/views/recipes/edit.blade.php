@extends('layout')
    
@section('pageTitle', 'Edit Recipe')

@section('content')
        
    <x-bladewind::notification />

    <x-bladewind::card>

        <form method="POST" class="signup-form" action="{{ route('recipes.update', $recipe->id) }}">

            @csrf
            @method('PATCH')

            <x-bladewind::input
                name="r_name"
                required="true"
                label="Name"
                value="{{ $recipe->r_name }}" />

                <x-bladewind::input
                    name="time"
                    required="true"
                    label="Time" 
                    value="{{ $recipe->time }}"
                    />

                <x-bladewind::input
                    name="image_url"
                    required="false"
                    label="Image url"
                    value="{{ $recipe->image_url }}"
                    />

            <div class="text-center">

                <x-bladewind::button
                    name="btn-save"
                    has_spinner="true"
                    type="primary"
                    can_submit="true"
                    class="mt-3">
                    Save
                </x-bladewind::button>

            </div>

        </form>

    </x-bladewind::card>

@endsection
