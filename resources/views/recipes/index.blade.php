
@extends('layout')

    
@section('pageTitle', 'My Recipes')

@section('content')

<div class="flex justify-center mb-4">
    @include('partials.nav')
</div>

<div class="flex flex-col items-center mt-2 mb-2">
    <a href="{{ route('recipes.create') }}" title="Create New Recipe" class="bg-green-500 text-white font-semibold py-1 px-4 text-sm rounded-md hover:bg-green-600 mr-2">
        New Recipe
    </a>
</div>

<x-bladewind::card class="w-full mb-1">
    <div class="flex flex-col items-center mt-2 mb-2 max-w-xs mx-auto px-2">
        <form method="GET" action="{{ route('recipes.index') }}" class="mb-4 w-full max-w-xs"> 
            <label for="type" class="mr-2 text-sm">Filter by Category:</label> 
            <x-bladewind::select name="type" label="Select a category" :data="$types" class="text-sm" /> 
            <button type="submit" class="bg-green-500 text-white px-4 py-1 rounded text-sm">Filter</button>
        </form>
    </div>
</x-bladewind::card>

    @foreach ($recipes as $recipe)

    <div class="flex flex-col w-full items-center space-y-4">

        <x-bladewind::card class="w-full mb-4">

            <x-bladewind::list-view>

                <x-bladewind::list-item class="flex-col space-y-4">

                        <div class="flex w-full items-center justify-between px-4">

                            <x-bladewind::avatar
                                size="big"
                                image="{{ $recipe->image_url }}"
                                class="mr-4"/>

                            <div class="ml-3">
                                <div class="flex justify-center text-sm font-medium text-slate-900">
                                    {{ $recipe->r_name }}
                                </div>

                                <div class="text-sm text-slate-500 truncate">
                                        <x-bladewind::icon name="clock" />{{ $recipe->time }} mins
                                </div>

                            </div>

                            <div class="ml-auto">
                                <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-500"><x-bladewind::icon name="backspace" size="tiny"/></button>
                                        
                                </form>
                            </div>
                        </div>

                        <div class="flex justify-center mt-2">
                            <a href="{{ route('recipes.show', $recipe->id) }}">
                                <x-bladewind::icon name="open-recipe-book" dir="assets/icons" class="h-8 w-8"/>
                            </a>
                        </div>
                    

                    
                </x-bladewind::list-item>

            </x-bladewind::list-view>
                
        </x-bladewind::card>

    @endforeach


</div>

@endsection
