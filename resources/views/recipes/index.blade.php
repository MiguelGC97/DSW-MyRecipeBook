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

    <x-bladewind::card>

        <x-bladewind::list-view>

            <x-bladewind::list-item>

                <x-bladewind::avatar
                    size="regular"
                    image="https://www.seriouseats.com/thmb/2nouHHsjM0bN1vwXMOZGUkLFsJ8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__serious_eats__seriouseats.com__recipes__images__2017__12__20171115-chicken-soup-vicky-wasik-11-80db1a04d84a43a089e0559efdddd517.jpg"/>
                <div class="ml-3">
                    <div class="text-sm font-medium text-slate-900">
                        {{ $recipe->r_name }}
                    </div>
                    <div class="text-sm text-slate-500 truncate">
                        kabutey@gmail.com
                    </div>
                </div>

            </x-bladewind::list-item>
        </x-bladewind::list-view>
    </x-bladewind::card>

    

</body>
</html>
