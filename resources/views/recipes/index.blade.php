<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipes</title>
</head>
<body>
    <h1>List of recipes</h1>
    <ul>
        @foreach ($recipes as $r)
            <li>{{ $recipe->name }} {{ $recipe->time }}</li>
        @endforeach
    </ul>
</body>
</html>
