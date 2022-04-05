<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\ActorsInMovie;
use App\Models\Comment;
use App\Models\Film;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    public function allFilms(){
        $genres = Genre::all();
        Paginator::useBootstrap();
        $films = Film::orderBy('id', 'DESC')->paginate(10);
        return view('films.allFilms', compact('films', 'genres'));
    }

    public function filmView(Film $film){
        $actorsinmovie = ActorsInMovie::where('film_id', $film->id)->get();
        $actors = Actor::all();
        $comments = Comment::where('film_id', $film->id)->get();
        $users = User::all();
        return view('films.filmPage', compact('film', 'actorsinmovie', 'actors', 'comments', 'users'));
    }

    public function filmPost(Request $request, Film $film){
        $request->validate([
            'comment'=>'required',
        ]);
        $data=[
            'user_id'=>Auth::user()->id,
            'film_id'=>$film->id,
            'comment'=>$request->comment,
        ];
        Comment::create($data);
        return back();
    }

    public function filmCommentDelete(Request $request){
        $request->validate([
            'action_delete'=>'required',
        ]);
        $comment = Comment::find($request->action_delete);
        $comment->delete();
        return back();
    }

    public function genreFilm(Genre $genre){
        $gs = Genre::all();
        Paginator::useBootstrap();
        $films = Film::where('genre_id',$genre->id)->orderBy('id', 'DESC')->paginate(10);
        return view('films.genreFilms', compact('films','gs','genre'));
    }
}