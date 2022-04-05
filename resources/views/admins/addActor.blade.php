@extends('layouts.layout')

@section('title')
    Добавление актёра
@endsection

@section('content')
    <div class="big-text">Создание актёра</div>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-item">
            @error('name')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Имя</div>
            <input type="text" name="name">
        </div>
        <div class="form-item">
            <button>Отправить</button>
        </div>
    </form>
@endsection