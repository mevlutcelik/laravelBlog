@extends('layouts.app-master')
@section('title', '- Yazılar')
@section('content')
    <style>
        #content:first-letter {
            font-size: 4.2rem;
            float: left;
            line-height: 0.75;
            margin: 0.25rem 1rem 0.25rem 0.25rem;
            font-family: serif;
        }
    </style>
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
            {!!nl2br($post->postContent)!!}
        </p>
        <div class="card p-4" style="margin: 6rem 0;">
            <h4 class="mb-4">Yorum ekle</h4>
            <form action="{{route('comment.add')}}" method="post" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="comment">Yorumunuz</label>
                    <textarea style="min-height: 4rem;" class="form-control" id="comment" name="commentContent"
                              placeholder="Yorumunuzu girin..."></textarea>
                    <input type="hidden" name="which_page" readonly value="{{$post->link}}">
                </div>
                <button type="submit" class="btn btn-primary">Ekle</button>
            </form>
        </div>
        <div style="margin-bottom: 6rem">
            <h4 class="mb-4">Yorumlar</h4>
            @if (count($comments) !== 0)
                @foreach($comments as $comment)
                    <li class="media mb-5">
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" width="50" height="50" class="mr-3"
                             style="border-radius: 50%" alt="Profile Photo">
                        <div class="media-body">
                            <a href="/author/{{$comment->who_shared}}"
                               class="mt-0 mb-1"><strong><span>@</span>{{$comment->who_shared}}</strong></a>
                            <p class="mb-1">{!! $comment->commentContent !!}</p>
                        </div>
                    </li>
                @endforeach
            @else
                <div class="alert alert-secondary" style role="alert">
                    Henüz hiç yorum yok! <a style="cursor:pointer;" onclick="document.querySelector('#comment').focus()"
                                            class="alert-link">İlk
                        yorumu sen ekle.</a>
                </div>
            @endif
        </div>
    </div>
@endsection
