

@extends('layout')
    
@section('pageTitle', 'New Recipe')

@section('content')
        
    <div class="flex flex-col items-center mt-2 mb-2">
        <a href="{{ route('recipes.index') }}" title="My recipes" class="mr-2">
            <x-bladewind::icon name="recipe-book" dir="assets/icons" class="h-10 w-10"/>
        </a>
    </div>

    <x-bladewind::card>

        <form method="POST" class="signup-form" action="{{ route('recipes.store') }}">

            @csrf

            <x-bladewind::input
                name="r_name"
                required="true"
                label="Name"
                error_message="The recipe needs to have a name" />

                <x-bladewind::input
                    name="time"
                    required="true"
                    label="Time" 
                    error_message="The recipe needs to have a time"/>

                <x-bladewind::input
                    name="image_url"
                    required="false"
                    label="Image url"/>

            <div class="text-center">

                <x-bladewind::button
                    name="btn-save"
                    has_spinner="true"
                    type="primary"
                    can_submit="true"
                    class="mt-3" color="green" size="small">
                    Add recipe
                </x-bladewind::button>

            </div>

        </form>

    </x-bladewind::card>

@endsection

