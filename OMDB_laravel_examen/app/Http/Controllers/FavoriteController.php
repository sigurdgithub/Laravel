<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{



    public function add($title, $year, $category)
    {
        $fav = Favorite::create([
            'user_id' => Auth()->User()->id,
            'title' => $title,
            'year' => $year,
            'category' => $category,
        ]);
        $fav->save();
        event(new FavoriteController($fav));
    }
}
