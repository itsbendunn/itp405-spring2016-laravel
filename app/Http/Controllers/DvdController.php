<?php

namespace App\Http\Controllers;

use App\Models\formats;
use App\Models\genre;
use App\Models\genres;
use App\Models\labels;
use App\Models\ratings;
use App\Models\review;
use App\Models\sounds;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\DVD;


class DvdController extends Controller{
    public function search(){
        return view('search');
    }

    public function results(Request $request){
        $title = $request->input('movie');

        $genre = $request->input('genre');

        $rating = $request->input('rating');

        if(!$title){
            return redirect('/search');
        }

        if($genre == 'All' && $rating == 'All'){
            $dvd = DB::table('dvds')
                ->select('dvds.id', 'title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
                ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
                ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
                ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
                ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
                ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id')
                ->where('title', 'like', "%$title%")
                ->get();
        }
        elseif($genre == 'All'){
            $dvd = DB::table('dvds')
                ->select('dvds.id', 'title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
                ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
                ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
                ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
                ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
                ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id')
                ->where('title', 'like', "%$title%")
                ->where('rating_name', '=', "$rating")
                ->get();
        }
        elseif($rating == 'All'){
            $dvd = DB::table('dvds')
                ->select('dvds.id', 'title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
                ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
                ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
                ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
                ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
                ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id')
                ->where('title', 'like', "%$title%")
                ->where('genre_name', '=', "$genre")
                ->get();
        }
        else {
            $dvd = DB::table('dvds')
                ->select('dvds.id', 'title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
                ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
                ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
                ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
                ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
                ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id')
                ->where('title', 'like', "%$title%")
                ->where('rating_name', '=', "$rating")
                ->where('genre_name', '=', "$genre")
                ->get();
        }

        return view('results', [
            'title' =>$title,
            'dvd'=>$dvd
        ]);
    }

    public function details($id){

        $dvd = DB::table('dvds')
            ->select('dvds.id','title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
            ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
            ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
            ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
            ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id')
            ->where('dvds.id', '=', $id)
            ->get();

        $description =  DB::table('reviews')
            ->select('title', 'description', 'rating')
            ->leftJoin('ratings', 'reviews.rating', '=', 'ratings.id')
            ->where('reviews.dvd_id', '=', $id)
            ->get();


        return view('details',[
            'id' => $id,
            'dvd'=>$dvd,
            'description' => $description
        ]);
    }

    public function create(Request $request){


        $validation = Validator::make($request->all(),[
            'rating' => 'required',
            'title' => 'required|string|min:5',
            'description' => 'required|string|min:10'
        ]);


        if($validation->fails()){
            return redirect::back()
                ->withInput()
                ->withErrors($validation);
        }

        $dvd = new review([
            'rating' => $request->input('rating'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'id' => $request->input('id')
        ]);

        dd($dvd);


        $dvd->save();


        return redirect::back()
            ->with('success', true);
    }

    public function getInfo(){

        $genres = genres::all();
        $labels = labels::all();
        $ratings = ratings::all();
        $sounds = sounds::all();
        $formats = formats::all();


        return view('create', [
            'genres'=>$genres,
            'labels' =>$labels,
            'ratings' =>$ratings,
            'sounds' => $sounds,
            'formats' => $formats
        ]);
    }

    //=> for associative arrays/keyvalues like js object
    //-> dot notation

    public function createDvd(Request $request){
        $dvd = new Dvd;


        $dvd->title = $request->input('title');
        $dvd->genre_id = $request->input('genre');
        $dvd->rating_id = $request->input('rating');
        $dvd->sound_id = $request->input('sound');
        $dvd->format_id = $request->input('formats');

        $dvd->save();

    }
}