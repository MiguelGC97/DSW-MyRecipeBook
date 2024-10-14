<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New recipe</title>

    @extends('layout')
</head>
<body>
    
@section('content')
        
    
    <x-bladewind::notification />

<x-bladewind::card>

    <form method="POST" class="signup-form" action="{{ route('recipes.store') }}">

        @csrf
        <h1 class="my-2 text-2xl font-light text-blue-900/80">Create new recipe</h1>

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
                class="mt-3">
                Add recipe
            </x-bladewind::button>

        </div>

    </form>

</x-bladewind::card>

@endsection

</body>
</html>
