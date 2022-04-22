@extends('layouts.app-master')
@section('title', '- Yazılar')
@section('content')
    <nav aria-label="breadcrumb">
        <div class="bg-light">
            <div class="container">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Yazılar</li>
                </ol>
            </div>
        </div>
    </nav>
    <div class="container">
        @if (Session::has('msg'))
            <script>
                setTimeout(alertHide, 1500);
                function alertHide() {
                    document.querySelector("#alert-message").style.display = "none";
                }
            </script>
            <p id="alert-message" class="alert alert-{{ Session::get('type') }}">{{ Session::get('msg') }}</p>
        @endif
        <h1 class="mt-5 mb-4">Yazılar</h1>
        <div class="card" style="width: 18rem;">
            <img src="https://picsum.photos/200/100" class="card-img-top" alt="Card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>
@endsection
