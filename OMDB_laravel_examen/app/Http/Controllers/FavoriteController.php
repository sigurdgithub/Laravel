<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{



    public function add(Request $movie)
    {
        $fav = Favorite::create([
            'user_id' => Auth()->user()->id,
            'title' => $movie->title,
            'year' => $movie->year
        ]);
        $fav->save();
    }
}
