@extends('layouts.app-master')
@section('title', '- Yazarlar')
@section('content')
    <nav aria-label="breadcrumb">
        <div class="bg-light">
            <div class="container">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Anasayfa</a></li>
                    @if (Route::is('post.show.all'))
                        <li class="breadcrumb-item"><a href="{{route('author.show')}}">Yazarlar</a></li>
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
        <h1 class="my-5">Yazarlar</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 mb-5">
            @foreach($authors as $author)
                <a href="/author/{{$author->username}}" class="border p-4 mr-4 mb-4">
                    <h5 class="card-title text-primary">{{$author->name ?? "@" . $author->username}}</h5>
                    <small class="card-text text-secondary">E-posta: {{$author->email}}</small><br/>
                </a>
            @endforeach
        </div>
    </div>
@endsection
