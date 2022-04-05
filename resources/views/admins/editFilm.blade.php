@extends('layouts.layout')

@section('title')
    Редактирование фильма
@endsection

@section('content')
    <div class="big-text">Редактирование фильма</div>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-item">
            @error('name')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Название</div>
            <input type="text" name="name" value="{{$film->name}}">
        </div>
        <div class="form-item">
            @error('url')
                <div class="error">{{$message}}</div>
            @enderror
            <div>url</div>
            <input type="text" name="url" value="{{$film->url}}">
        </div>
        <div class="form-item">
            @error('description')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Описание</div>
            <textarea name="description">{{$film->description}}</textarea>
        </div>
        <div class="form-item">
            @error('director')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Продюсер</div>
            <input type="text" name="director" value="{{$film->director}}">
        </div>
        <div class="form-item">
            @error('genre')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Жанр</div>
            <select name="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{$genre->id}}" @if ($film->genre_id == $genre->id)
                        selected
                    @endif>{{$genre->name}}</option>
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