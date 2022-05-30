<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
    return view('welcome');
});

// DASHBOARD ROUTE --------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// GET MOVIE ROUTE --------------------------------
Route::get('/movies', function () {
    return view('movie');
});

// POST MOVIE API --------------------------------
Route::post('/movies', function (Request $request) {
    $search = $request->input('movie');
    $movies = Http::get('http://www.omdbapi.com/?i=tt3896198&apikey=f45f2e0c' . $search);
    $movies = json_decode($movies);
    return view('movie', compact('movies'));
});



require __DIR__ . '/auth.php';
