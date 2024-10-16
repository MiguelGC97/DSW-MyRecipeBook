
@extends('layout')

    
@section('pageTitle', 'List of Recipes')

@section('content')

    @foreach ($recipes as $recipe)

    <div class="flex flex-col w-full items-center space-y-4">

        <x-bladewind::card class="w-full">

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

                                    <x-bladewind::button  
                                        color="red" radius="full" size="tiny"  can_submit="true"> <x-bladewind::icon name="trash" />
                                    </x-bladewind::button>
                                        
                                </form>
                            </div>
                        </div>

                        <div class="flex justify-center mt-2">
                            <a href="{{ route('recipes.show', $recipe->id) }}"><x-bladewind::icon name="eye" /></a>
                        </div>
                    

                    
                </x-bladewind::list-item>

            </x-bladewind::list-view>
                
        </x-bladewind::card>

    @endforeach

</div>

@endsection
