<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipes</title>
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

</body>
</html>
