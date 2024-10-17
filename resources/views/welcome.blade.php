@extends('layout')

@section('content')

<div style="background-color: rgb(245, 233, 196)" class="flex justify-center mb-4 mt-8 w-3/4 mx-auto">
    <h1 style="font-family: 'Pacifico', cursive; color:rgb(148, 75, 42)" class="text-center my-auto text-3xl">My Recipe Book</h1>
</div>

<div class="flex flex-col items-center mb-4">
    <img src="https://img.freepik.com/premium-photo/open-recipe-book-illustration_962764-190304.jpg" alt="Home page image" />
</div>

<div class="flex flex-col items-center mt-2 mb-2">
    <a href="{{ route('recipes.index') }}" title="Create New Recipe" class="bg-green-500 text-white font-semibold py-1 px-4 rounded-md hover:bg-green-600 mr-2">
        Open book
    </a>
</div>

@endsection
