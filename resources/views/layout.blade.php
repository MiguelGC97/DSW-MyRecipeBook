<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout</title>

    <!-----------------------------------------------------------
    -- animate.min.css by Daniel Eden (https://animate.style)
    -- is required for the animation of notifications and slide out panels
    -- you can ignore this step if you already have this file in your project
    --------------------------------------------------------------------------->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    
</head>

<body>

    {{-- <div class="flex justify-center mb-4 mt-8">

        <h1 class="text-center my-2 text-3xl font-bold text-blue-900">@yield('pageTitle')</h1>
    </div> --}}

    <div style="background-color: rgb(245, 233, 196)" class="flex justify-center mb-4 mt-8 w-3/4 mx-auto">
        <h1 style="font-family: 'Pacifico', cursive; color:rgb(148, 75, 42)" class="text-center my-auto text-3xl">@yield('pageTitle')</h1>
    </div>

    <div>
        @yield('content')
    </div>

</body>
</html>
