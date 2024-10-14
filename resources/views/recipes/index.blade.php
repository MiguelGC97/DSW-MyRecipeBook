<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipes</title>

    @extends('layout')
</head>
<body>

    <h1>List of Recipes</h1>
    
    <div>
        <ul>
            @foreach ($recipes as $recipe)
                <li>
                    <a href="{{ route('recipes.show', $recipe->id) }}">
                        {{ $recipe->r_name }} ({{ $recipe->time }} mins)
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    @foreach ($recipes as $recipe)
        <x-bladewind::card>

            <x-bladewind::list-view>

                <x-bladewind::list-item>

                    <x-bladewind::avatar
                        size="regular"
                        image="{{ $recipe->image_url }}"/>
                    <div class="ml-3">
                        <div class="text-sm font-medium text-slate-900">
                            {{ $recipe->r_name }}
                        </div>
                        <div class="text-sm text-slate-500 truncate">
                            <x-bladewind::icon name="clock" />{{ $recipe->time }} mins
                        </div>
                    </div>

                </x-bladewind::list-item>

            </x-bladewind::list-view>
            
        </x-bladewind::card>
    @endforeach

    

</body>
</html>
