<x-app-layout>
    @auth<h3>Register or log in to add to favorites!
        @endauth
        <form method="POST" action="/movie">
            @csrf

            <!-- Search Form -->
            <div class="flex flex-col pt-6 sm:pt-0 bg-gray-100">
                <div class="w sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <x-label for="movie" :value="__('Movie Name')" />

                    <x-input class="block mt-1 w-full" type="text" name="movie" :value="old('movie')" required
                        autofocus />
                </div>
                <div class="w sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <x-label for="year" :value="__('Movie Year')" />

                    <x-input class="block mt-1 w-full" type="text" name="year" :value="old('year')" />
                </div>
            </div>
            <x-button class="ml-3">
                {{ __('Search') }}
            </x-button>
        </form>
        <form method="POST" action={{route("surprise")}}>
            @csrf
            <div class="p-6">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Surprise!
            </div>
            @isset($surprise_movies)
            @foreach ($surprise_movies as $surprise)
            @php
            dd($surprise);
            @endphp
            <div class="flex-auto flex-row w sm:max-width">
                <img src="{{$surprise->Poster}}"></img>
                <hr>
                {{$surprise->Title}}
                <hr>
                {{$surprise->Year}}
            </div>
            @endforeach
        </form>
        @endisset
        <form method="post" action="{{route('add')}}">
            @csrf
            @isset($movies)
            @foreach ($movies->Search as $movie)
            <div class="flex-auto flex-row w sm:max-width">
                <img src="{{$movie->Poster}}"></img>
                <hr>
                {{$movie->Title}}
                <hr>
                {{$movie->Year}}
                @auth


                <button type="submit"><b>Favorite</b>
        </form>
        @endauth
        </div>
        @endforeach
        @endisset
</x-app-Layout>
</form>