@extends('layouts.app-master')
@section('title', '- Yeni yazı ekle')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
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
            @include('message')
        @endif
        <form action="{{ route('post.new.perform') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Yazı başlığı</label>
                <input type="text" name="title" placeholder="Yazı başlığı" class="form-control @if ($errors->has('title')) in-valid @endif" id="title"
                    value="{{ old('title') }}">
                @if ($errors->has('title'))
                    <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="desc">Yazı açıklaması</label>
                <input type="text" name="desc" placeholder="Yazı açıklaması" class="form-control @if ($errors->has('desc')) in-valid @endif" id="desc"
                    value="{{ old('desc') }}">
                @if ($errors->has('desc'))
                    <span class="text-danger text-left">{{ $errors->first('desc') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="postContent">Yazı</label>
                <textarea type="text" style="min-height: 4rem;" placeholder="Yazı içeriği" name="postContent" class="form-control @if ($errors->has('postContent')) in-valid @endif" id="postContent">{{ old('postContent')}}</textarea>
                @if ($errors->has('postContent'))
                    <span class="text-danger text-left">{{ $errors->first('postContent') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ekle</button>
        </form>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#postContent' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
