<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Collection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// WELCOME ROUTES --------------------------------
Route::get('/', function () {
    return view('auth.login');
});

// DASHBOARD ROUTE --------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// GET MOVIE ROUTE --------------------------------
Route::get('/movies', function () {
    return view('movie');
})->name('movie');



// GET FAVORITES ROUTES -------------------
Route::get('/favorites', function () {
    return view('favorites');
})->name('favorites');

// POST FAVORITES ROUTE 
Route::post('/favorites', [FavoriteController::class, 'add'])->name('add');

// POST MOVIE API --------------------------------
Route::post('/movie', function (Request $request) {
    $search = $request->input('movie');
    $movies = Http::get('http://www.omdbapi.com/?apikey=f45f2e0c&s' . $search);
    $movies = json_decode($movies);
    return view('movie', compact('movies'));
})->name('searchMovies');

Route::post('/movies', function () {
    $genres = array("Music", "Drama", "Kill", "Comedy", "Action", "Horror", "Story", "Animation", "Saw", "Star Wars");
    $surprise_genre = array_rand(array_flip($genres), 1);
    //dd($surprise_genre);
    $surprise_movies = Http::get('http://www.omdbapi.com/?apikey=f45f2e0c&s=' . $surprise_genre . '&p=1');
    $surprise_movies = json_decode($surprise_movies);
    //dd($surprise_movies);
    return view('/movie', compact('surprise_movies'));
})->name('surprise');



require __DIR__ . '/auth.php';
