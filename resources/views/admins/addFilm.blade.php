@extends('layouts.layout')

@section('title')
    Добавление фильма
@endsection

@section('content')
    <div class="big-text">Создание фильма</div>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-item">
            @error('name')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Название</div>
            <input type="text" name="name">
        </div>
        <div class="form-item">
            @error('film')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Фильм</div>
            <input type="file" name="film">
        </div>
        <div class="form-item">
            @error('description')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Описание</div>
            <textarea name="description"></textarea>
        </div>
        <div class="form-item">
            @error('director')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Продюсер</div>
            <input type="text" name="director">
        </div>
        <div class="form-item">
            @error('genre')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Жанр</div>
            <select name="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-item">
            @error('poster')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Постер</div>
            <input type="file" name="poster">
        </div>
        <div class="form-item">
            <button>Отправить</button>
        </div>
    </form>
@endsection