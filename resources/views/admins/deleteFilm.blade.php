@extends('layouts.layout')

@section('title')
    Удаление фильма
@endsection

@section('content')
    <div class="big-text">Вы хотите удалить фильм: {{$film->name}}?</div>
    <div class="pagination">
        <div class="little-margin"><form method="POST">
            @csrf
            <div class="form-name">
                <input type="hidden" name="delete" value="yes">
                <button>УДАЛИТЬ</button>
            </div>
        </form></div>
        <div class="little-margin"><form method="POST">
            @csrf
            <div class="form-name">
                <input type="hidden" name="delete" value="no">
                <button>нет</button>
            </div>
        </form></div>
    </div>
@endsection