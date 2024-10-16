<ul class="flex space-x-4">
    <li><a href="{{ route('home') }}"><x-bladewind::icon name="home-color" dir="assets/icons" class="h-10 w-10"/></a></li>
    <li><a href="{{ route('recipes.index') }}"><x-bladewind::icon name="recipe-book" dir="assets/icons" class="h-8 w-8 mt-1"/></a></li>
    {{-- <li><a href="{{ route('recipes.ingredients') }}">Ingredients</a></li> --}}
    <li><a href="{{ route('recipes.create') }}"><x-bladewind::icon name="open-recipe-book" dir="assets/icons" class="h-10 w-10"/></a></li>
</ul>
