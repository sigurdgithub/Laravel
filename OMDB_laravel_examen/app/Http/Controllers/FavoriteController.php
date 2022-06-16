<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Http;

class FavoriteController extends Controller
{



    public function add(Request $request)
    {
        $fav = Favorite::create([
            'user_id' => Auth()->user()->id,
            'title' => {{$movie->Title}},
            'year' => {{$movie->Year}}
        ]);

        $fav->save();
        dd($fav);
    }
}
