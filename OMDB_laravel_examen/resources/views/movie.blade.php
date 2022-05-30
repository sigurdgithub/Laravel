<x-app-layout>
    <form method="POST" action="{{route('searchMovies')}}">
        @csrf

        <!-- Search Form -->
        <div class="flex flex-col pt-6 sm:pt-0 bg-gray-100">
            <div class="w sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <x-label for="movie" :value="__('Movie Name')" />

                <x-input class="block mt-1 w-full" type="text" name="movie" :value="old('movie')" required autofocus />
            </div>
            <div class="w sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <x-label for="year" :value="__('Movie Year')" />

                <x-input class="block mt-1 w-full" type="text" name="year" :value="old('year')" />
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Search</button>
        @foreach ($movies as $movie)
        @endforeach
</x-app-Layout>
</form>