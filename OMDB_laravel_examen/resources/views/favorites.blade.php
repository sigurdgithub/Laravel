<x-app-layout>
    <h1>Mijn films</h1>
    @isset($movies)
    @foreach ($movies->Search as $movie)

    <div class="flex-auto">
        <img src="{{$movie->Poster}}"></img>
        <hr>
        {{$movie->Title}}
        <hr>
        {{$movie->Year}}
        @endforeach
        @endisset
</x-app-layout>