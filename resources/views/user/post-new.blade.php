@extends('layouts.app-master')
@section('title', '- Yeni yazı ekle')
@section('content')
    <nav aria-label="breadcrumb">
        <div class="bg-light">
            <div class="container">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Yeni yazı ekle</li>
                </ol>
            </div>
        </div>
    </nav>
    <div class="container">

        <h1 class="mt-5 mb-4">Yeni yazı ekle</h1>
        @if (Session::has('msg'))
            <script>
                setTimeout(alertHide, 1500);
                function alertHide() {
                    document.querySelector("#alert-message").style.display = "none";
                }
            </script>
            <p id="alert-message" class="alert alert-{{ Session::get('type') }}">{{ Session::get('msg') }}</p>
        @endif
        <form action="{{ route('post.new.perform') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Yazı başlığı</label>
                <input type="text" name="title" class="form-control" id="title"
                    value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="desc">Yazı açıklaması</label>
                <input type="text" name="desc" class="form-control" id="desc"
                    value="{{ old('desc') }}">
            </div>
            <div class="form-group">
                <label for="postContent">Yazı</label>
                <textarea type="text" name="postContent" class="form-control" id="content">{{ old('postContent')}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ekle</button>
        </form>
    </div>
@endsection
