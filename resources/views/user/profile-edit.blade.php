@extends('layouts.app-master')
@section('title', '- Profilimi Düzenle')
@section('content')
    <nav aria-label="breadcrumb">
        <div class="bg-light">
            <div class="container">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profile.show') }}">Bilgilerim</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bilgilerimi Düzenle</li>
                </ol>
            </div>
        </div>
    </nav>
    <div class="container">

        <h1 class="mt-5 mb-4">Bilgilerimi Düzenle</h1>
        @if (Session::has('msg'))
            <script>
                setTimeout(alertHide, 1500);
                function alertHide() {
                    document.querySelector("#alert-message").style.display = "none";
                }
            </script>
            <p id="alert-message" class="alert alert-{{ Session::get('type') }}">{{ Session::get('msg') }}</p>
        @endif
        <form action="{{ route('profile.perform') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">İsim</label>
                <input type="text" name="name" class="form-control" id="name"
                    value="{{ old('name', Auth::user()->name) }}">
            </div>
            <div class="form-group">
                <label for="username">Kullanıcı adı</label>
                <input type="text" name="username" class="form-control" id="username"
                    value="{{ old('name', Auth::user()->username) }}">
            </div>
            <div class="form-group">
                <label for="email">E-posta</label>
                <input type="email" name="email" class="form-control" id="email"
                    value="{{ old('name', Auth::user()->email) }}">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Kaydet</button>
        </form>
    </div>
@endsection
