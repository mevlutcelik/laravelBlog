@extends('layouts.app-master')
@section('title', '- Yazılar')
@section('content')
    <nav aria-label="breadcrumb">
        <div class="bg-light">
            <div class="container">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Anasayfa</a></li>
                    @if (Route::is('post.show.all'))
                        <li class="breadcrumb-item"><a href="{{route('post.show')}}">Yazılar</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">@if (Route::is('post.show.all'))
                            Tüm
                        @endif Yazılar
                    </li>
                </ol>
            </div>
        </div>
    </nav>
    <div class="container">
        @if (Session::has('msg'))
            @include('message')
        @endif
        <h1 class="mt-5 mb-3">@if (Route::is('post.show.all'))
                Tüm
            @endif Yazılar</h1>
        @if (Route::is('post.show'))
{{--            <h5 class="mb-4">Son 10 yazı</h5>--}}
        @endif
        @if(count($posts) === 0)
            <div class="alert alert-secondary" style role="alert">
                Henüz yazı eklenmedi! <a style="cursor:pointer;" href="{{route('post.new')}}"
                                         class="alert-link">Yeni yazı ekle</a>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 mb-5">
                @foreach($posts as $post)
                    <div class="p-3">
                        <div class="card col" style="padding: 0">
                            <div class="card-body d-flex flex-column justify-content-between" style="height: 16rem">
                                <a href="/post/{{$post->link}}"><h5
                                        class="card-title text-primary">{{$post->title}}</h5></a>
                                <p class="card-text"
                                   style="line-height: initial;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">{{$post->desc}}</p>
                                <small class="card-text text-secondary">Yazar: <a
                                        href="#!"><span>@</span>{{$post->author}}</a></small><br/>
                                <a href="/post/{{$post->link}}" class="btn btn-secondary mt-3">Yazıyı oku</a>
                                <!--<a href="{{route('post.single', ['link' => $post->link])}}" class="btn btn-primary mt-3">Devamını oku</a>-->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
