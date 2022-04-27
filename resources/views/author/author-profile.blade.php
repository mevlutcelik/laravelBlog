@extends('layouts.app-master')
@section('title', '- ' . ($author->name ?? "@" . $author->username))
@section('content')
    <style>
        .profile-header {
            position: relative;
        }

        .profile-header .profile-wallpaper {
            height: 13rem;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .profile-header .profile-photo {
            position: absolute;
            bottom: -3rem;
            right: 6rem;
            border-radius: 50%;
            border: 6px solid #fff;
            width: 8rem;
            height: 8rem;
        }
    </style>
    <nav aria-label="breadcrumb">
        <div class="bg-light">
            <div class="container">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="{{route('author.show')}}">Yazarlar</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">{{$author->name ?? "@" . $author->username}}</li>
                </ol>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-bottom: 4rem">
        @auth
            @if ($author->username === auth()->user()->username)
                @if($author->name === null)
                    <div class="alert alert-warning" role="alert">
                        <strong>Henüz isminizi kayıt etmediniz.</strong> <a href="{{route('profile.edit')}}">Profilini
                            düzenlemek için tıkla!</a>
                    </div>
                @elseif($author->profile_name === null)
                    <div class="alert alert-warning" role="alert">
                        <strong>Profil fotoğrafı eklemediniz.</strong> <a href="{{route('profile.edit')}}">Profil
                            fotoğrafı eklemek için tıkla!</a>
                    </div>
                @endif
            @endif
        @endauth
        <div class="profile-header">
            <img
                src="https://picsum.photos/800/300"
                class="profile-wallpaper w-100" alt="Profile Wallpaper">
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                 class="profile-photo" alt="Profile Photo">
        </div>
        <h1 class="mt-4" style="font-size: 1.5rem">{{$author->name ?? "@" . $author->username}}</h1>
        <div class="mb-5"><small><span>@</span>{{$author->username}}</small></div>
        <p><strong>
                @auth
                    @if ($author->username === auth()->user()->username)
                        Paylaştığım yazılar
                    @else
                        Paylaşılan yazılar
                    @endif
                @endauth
                @guest
                    Paylaşılan yazılar
                @endguest
            </strong></p>
        @if (count($posts) !== 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 mb-5">
                @foreach($posts as $post)
                    <div class="p-3">
                        <div class="card col" style="padding: 0">
                            <div class="card-body d-flex flex-column justify-content-between" style="height: 16rem">
                                <a href="/post/{{$post->link}}"><h5
                                        class="card-title text-primary">{{$post->title}}</h5></a>
                                <p class="card-text"
                                   style="text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">{{$post->desc}}</p>
                                <small class="card-text text-secondary">Yazar: <a
                                        href="#!"><span>@</span>{{$post->author}}</a></small><br/>
                                <a href="/post/{{$post->link}}" class="btn btn-secondary mt-3">Devamını oku</a>
                                <!--<a href="{{route('post.single', ['link' => $post->link])}}" class="btn btn-primary mt-3">Devamını oku</a>-->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-secondary" role="alert">
                @auth
                    @if ($author->username === auth()->user()->username)
                        Henüz hiç yazı paylaşmadın. <a href="{{route('post.new')}}">İlk yazını paylaşmak için tıkla.</a>
                    @else
                        <span>@</span>{{$author->username}} <strong>henüz yazı paylaşmadı!</strong>
                    @endif
                @endauth @guest
                    <span>@</span>{{$author->username}} <strong>henüz yazı paylaşmadı!</strong>
                @endguest
            </div>
        @endif
    </div>
@endsection
