<?php

namespace App\Http\Controllers;

use App\Models\Dvd;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{


    public function listGenre($id){

//        $dvds = genre::find($id);
//
//        $dvds->genre;


//        $dvds = genre::with('Dvd')
//            ->get();



        $dvds = Dvd::with('genre', 'label', 'rating')
            ->where('genre_id', '=', $id)
            ->get();






        return view('/genres/details',[
            'dvds' => $dvds
        ]);
    }

}

//$genre = genre::with($id);
//$dvds = $genre->take;


//$dvds = Dvd::with('genre', 'label', 'rating')
//    ->take(20)
//    ->get();