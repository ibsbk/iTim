<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\ActorsInMovie;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminLkView(){
        return view('admins.adminLk');
    }

    public function addFilmView(){
        $genres = Genre::all();
        return view('admins.addFilm', compact('genres'));
    }

    public function addFilmPost(Request $request){
        $request->validate([
            'name'=>'required',
            'film'=>'required|file|mimes:mp4,avi,wmv,mov',
            'description'=>'required',
            'director'=>'required',
            'genre_id'=>'required',
            'poster'=>'required|file|mimes:png,jpg,gif|max:10240'
        ]);
        $poster_name = explode('/', $request->file('poster')->store('public'))[1];
        $url = explode('/', $request->file('film')->store('public'))[1];
        $data = $request->only('name', 'description', 'director', 'genre_id');
        $data += ['poster'=>$poster_name, 'url'=>$url];
        Film::create($data);
        return redirect()->route('/');
    }

    public function addActorView(){
        return view('admins.addActor');
    }

    public function addActorPost(Request $request){
        Actor::create($request->only('name'));
        return redirect()->route('/');
    }

    public function addActorToFilmView(){
        $actors = Actor::all();
        $films = Film::all();
        return view('admins.addActorToFilm', compact('actors', 'films'));
    }

    public function addActorToFilmPost(Request $request){
        ActorsInMovie::create($request->only('actor_id','film_id'));
        return redirect()->route('/');
    }

    public function editFilmView(Film $film){
        $genres = Genre::all();
        return view('admins.editFilm', compact('film', 'genres'));
    }

    public function editFilmPost(Request $request, Film $film){
        $request->validate([
            'name'=>'required',
            'url'=>'required|url',
            'description'=>'required',
            'director'=>'required',
            'genre_id'=>'required',
            'poster'=>'file|mimes:png,jpg,gif|max:10240'
        ]);
        $data = $request->only('name', 'url', 'description', 'director', 'genre_id');
        if($request->poster == null){
            $film->update($data);
            return redirect()->route('/');
        } else{
            $poster_name = ['poster'=>explode('/', $request->file('poster')->store('public'))[1]];
            $data += $poster_name;
            $film->update($data);
            return redirect()->route('/');
        }
    }

    public function deleteFilmView(Film $film){
        return view('admins.deleteFilm', compact('film'));
    }

    public function deleteFilmPost(Request $request, Film $film){
        $request->validate([
            'delete'=>'required',
        ]);
        if($request->delete == 'no'){
            return redirect()->route('/');
        } else if($request->delete == 'yes'){
            ActorsInMovie::where('film_id',$film->id)->delete();
            $film->delete();
            return redirect()->route('/');
        }
    }
}
