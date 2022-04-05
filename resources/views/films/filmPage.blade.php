@extends('layouts.layout')

@section('title')
    {{$film->name}}
@endsection

@section('content')
        @guest
            
        @endguest
        @auth
        <div class="film-info">
            <div class="film-left-side">
                <div class="">
                    <img src="/storage/app/public/{{$film->poster}}" height="300px" width="200px" class="film-image">
                </div>
            </div>
            <div class="film-right-side">
                <div class="big-text">
                    {{$film->name}}
                </div>
                <div>
                    Описание: {{$film->description}}
                </div>
                <div>
                    Режисёр: {{$film->director}}
                </div>
                <div>
                    Актёры:
                </div>
                <div>
                    @foreach ($actors as $actor)
                        @foreach ($actorsinmovie as $actorinmovie)
                        @if ($actor->id == $actorinmovie->actor_id)
                            <div>
                                {{$actor->name}}
                            </div>
                        @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        @if (Auth::user()->isAdmin == 1)
            <div class="right-side little-margin">
                <a href="{{route('editFilm', ['film'=>$film->id])}}">редактировать фильм</a>
                <a href="{{route('deleteFilm', ['film'=>$film->id])}}">удалить фильм</a>
            </div>
        @endif
        <div><video preload="auto" controls height="468" width="720" ><source src="/storage/app/public/{{$film->url}}"></video></div>
        {{-- <div class="">
            <iframe width="750" height="400" src="{{$film->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div> --}}
        <div class="">
            <div class="big-text">комментарии</div>
            <form method="POST">
                @csrf
                <div class="form-item">
                    <textarea class="comment" placeholder="комментарий" name="comment"></textarea>
                </div>
                <div class="">
                    <button>Отправить</button>
                </div>
            </form>
                <div class="all-comments little-margin">
                    @foreach ($comments as $comment)
                        @foreach ($users as $user)
                            @if ($user->id == $comment->user_id)
                                <div class="comment-item">
                                    <div class="">
                                        {{$user->login}}
                                    </div>
                                    <div class="">
                                        Комментарий: {{$comment->comment}}
                                    </div>
                                    @if (Auth::user()->isAdmin == 1)
                                    <form method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="">
                                            <input type="hidden" name="action_delete" value="{{$comment->id}}">
                                        </div>
                                        <div class="">
                                            <button>Удалить</button>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
        </div>
        @endauth
@endsection
