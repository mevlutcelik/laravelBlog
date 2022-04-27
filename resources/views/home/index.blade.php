@extends('layouts.app-master')
@section('title', '- Anasayfa')
@section('content')
    <div class="bg-light p-5 rounded">
        <div class="container">
            @auth
                <h1 class="mt-5">Hoşgeldin {{ucfirst(auth()->user()->name) ?? ucfirst(auth()->user()->username)}}</h1>
                <p class="lead">Artık bilgilerini düzenleyebilir. Eğer istersen yeni bir yazı ekleyebilirsin.</p>
                <a class="btn btn-md btn-primary btn-lg mt-3 mb-5" href="{{route('post.new')}}" role="button">Blog yaz</a>
            @endauth

            @guest
                <h1 class="mt-5">Blog'a hoşgeldin</h1>
                <p class="lead">Dilediğiniz gibi özgürce blog yazılarını okuyabilirsin. Eğer sende blog yazısı yazmak istersen giriş yapmalısın.</p>
                <a href="{{route('login.show')}}" class="btn btn-primary btn-lg mt-3 mb-5">Blog yaz</a>
            @endguest
        </div>
    </div>
    <div class="bg-white p-5 rounded">
        <div class="container">
                <h4 class="mt-5">İstersen blog yazılarını görüntüleyebilirsin</h4>
                <p class="lead">Blog yazılarını okuyabilirsin.</p>
                <a href="{{route('post.show')}}" class="btn btn-secondary btn-sm mt-3 mb-5">Blog yazılarını oku</a>
        </div>
    </div>
@endsection
