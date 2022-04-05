@extends('layouts.layout')

@section('title')
    По жанру: {{$genre->name}}
@endsection

@section('content')
    @guest()
        Войдите или зарегистрируйтесь
    @endguest
    @auth()
        По жанру: {{$genre->name}}
        <div class="films">
            @foreach ($gs as $g)
                <div class="genre-link"><a href="{{route('genre', ['genre'=>$g->id])}}">{{$g->name}}</a></div>
            @endforeach
        </div>
        <div class="films">
            @foreach ($films as $film)
                <div class="film">
                    <div class="">
                        <a href="{{route('film', ['film'=>$film->id])}}">
                            <div class="">
                                Название: {{$film->name}}
                            </div>
                            <div class="">
                                <img src="/storage/app/public/{{$film->poster}}" height="300px" width="200px" class="film-image">
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="">
            {{$films->render()}}
        </div>
    @endauth
@endsection
 