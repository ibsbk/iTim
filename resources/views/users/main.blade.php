@extends('layouts.layout')

@section('title')
    iTim
@endsection

@section('content')
    @guest()
        Войдите или зарегистрируйтесь
    @endguest
    @auth()
        Последнии фильмы
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
        </div>
    @endauth
@endsection
 