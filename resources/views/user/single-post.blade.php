@extends('layouts.app-master')
@section('title', '- Yazılar')
@section('content')
    <nav aria-label="breadcrumb">
        <div class="bg-light">
            <div class="container">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="{{route('post.show')}}">Yazılar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                </ol>
            </div>
        </div>
    </nav>
    <div class="container">
        @if (Session::has('msg'))
            @include('message')
        @endif
        <h1 class="mt-5 mb-2">{{$post->title}}</h1>
        <p class="mb-3"><strong>Yazar: </strong><a href="/author/{{$post->author}}"><span>@</span>{{$post->author}}</a>
        </p>
        <p class="mb-4"><strong>Yayınlanma tarihi: </strong>{{$post->created_at}}</p>
        <p id="content" class="mb-5">
            {!!$post->postContent!!}
        </p>
        <div class="card p-4" style="margin: 6rem 0;">
            <h4 class="mb-4">Yorum ekle</h4>
            @auth
                <form action="{{route('comment.add')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Yorumunuz</label>
                        <input class="form-control" id="comment" name="commentContent"
                               placeholder="Yorumunuzu girin..."/>
                        <input type="hidden" name="which_page" readonly value="{{$post->link}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </form>
            @endauth
            @guest
                <div class="alert alert-secondary" style role="alert">
                    Yorum ekleyebilmek için giriş yapmanız gerekiyor! <a style="cursor:pointer;"
                                                                         href="{{route('login.show')}}"
                                                                         class="alert-link">Giriş yap</a>
                </div>
            @endguest
        </div>
        <div style="margin-bottom: 6rem">
            <h4 class="mb-4">Yorumlar</h4>
            @if (count($comments) !== 0)
                @foreach($comments as $comment)
                    <li class="media mb-5">
                        <img
                            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                            width="50" height="50" class="mr-3"
                            style="border-radius: 50%" alt="Profile Photo">
                        <div class="media-body">
                            <a href="/author/{{$comment->who_shared}}"
                               class="mt-0 mb-1"><strong><span>@</span>{{$comment->who_shared}}</strong></a>
                            <p class="mb-1">{!! $comment->commentContent !!}</p>
                            @auth
                                <form class="mt-3" action="{{route('comment.answer.add')}}" method="post"
                                      autocomplete="off">
                                    @csrf
                                    <input type="text" name="commentContent" class="form-control"
                                           placeholder="Yanıtla..."/>
                                    <input type="hidden" name="which_page" readonly value="{{$post->link}}">
                                    <input type="hidden" name="commentId" readonly value="{{$comment->id}}">
                                </form>
                            @endauth
                            @guest
                                <a href="{{route('login.show')}}" class="mt-3 btn btn-primary w-100"
                                   style="cursor:text;background: initial;border: 1px solid #ced4da;border-radius: 0.25rem;text-align: left;font-size: 1rem;color: #6c757d;">Yanıtla...</a>
                            @endguest
                        </div>
                    </li>
                    @foreach($commentAnswers as $commentAnswer)
                        @if($commentAnswer->commentId === $comment->id)
                            <li class="media mb-5" style="margin-left: 5rem;">
                                <img
                                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                    width="50" height="50" class="mr-3"
                                    style="border-radius: 50%" alt="Profile Photo">
                                <div class="media-body">
                                    <a href="/author/{{$commentAnswer->who_shared}}"
                                       class="mt-0 mb-1"><strong><span>@</span>{{$commentAnswer->who_shared}}
                                        </strong></a>
                                    <p class="mb-1">{!! $commentAnswer->commentContent !!}</p>
                                    @auth
                                        <form class="mt-3" action="{{route('comment.answer.add')}}" method="post"
                                              autocomplete="off">
                                            @csrf
                                            <input type="text" name="commentContent" class="form-control"
                                                   placeholder="Yanıtla..."/>
                                            <input type="hidden" name="which_page" readonly value="{{$post->link}}">
                                            <input type="hidden" name="commentId" readonly
                                                   value="{{$commentAnswer->commentId}}">
                                        </form>
                                    @endauth
                                    @guest
                                        <a href="{{route('login.show')}}" class="mt-3 btn btn-primary w-100"
                                           style="cursor:text;background: initial;border: 1px solid #ced4da;border-radius: 0.25rem;text-align: left;font-size: 1rem;color: #6c757d;">Yanıtla...</a>
                                    @endguest
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            @else
                <div class="alert alert-secondary" style role="alert">
                    Henüz hiç yorum yok! <a style="cursor:pointer;"
                                            @auth onclick="document.querySelector('#comment').focus()"
                                            @endauth @guest href="{{route('login.show')}}" @endguest class="alert-link">İlk
                        yorumu sen ekle.</a>
                </div>
            @endif
        </div>
    </div>
@endsection
