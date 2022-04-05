@extends('layouts.layout')

@section('title')
    Добавление актёра в фильм
@endsection

@section('content')
    <div class="big-text">Добавление актёра в фильм</div>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-item">
            @error('actor_id')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Актёр</div>
            <select name="actor_id">
                @foreach ($actors as $actor)
                    <option value="{{$actor->id}}">{{$actor->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-item">
            @error('film_id')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Фильм</div>
            <select name="film_id">
                @foreach ($films as $film)
                    <option value="{{$film->id}}">{{$film->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-item">
            <button>Отправить</button>
        </div>
    </form>
@endsection