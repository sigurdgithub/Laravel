<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\FavoriteController;

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
Route::get('/favs', function () {
    return view('favs');
})->name('favs');

// POST FAVORITES ROUTE 
Route::post('/favs', [FavoriteController::class, 'add'])->name('add');

// POST MOVIE API --------------------------------
Route::post('/movie', function (Request $request) {
    $search = $request->input('movie');
    $movies = Http::get('http://www.omdbapi.com/?apikey=f45f2e0c&s=' . $search);
    $movies = json_decode($movies);
    return view('movie', compact('movies'));
})->name('searchMovies');



require __DIR__ . '/auth.php';
