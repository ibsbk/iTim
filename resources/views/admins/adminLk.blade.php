@extends('layouts.layout')

@section('title')
    Личный кабинет администратора
@endsection

@section('content')
    <div class=""><span class="big-text">Личный кабинет администратора</span></div>
    <a href="{{route('addFilm')}}">добавить фильм</a>
    <a href="{{route('addActor')}}">добавить актёра</a>
    <a href="{{route('addActorToFilm')}}">добавить актёра в фильм</a>
@endsection