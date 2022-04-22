@extends('layouts.app-master')
@section('title', '- Profilimi Düzenle')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light py-4 mb-5">
            <div class="container d-flex">
                <li class="breadcrumb-item"><a href="{{route('home.index')}}">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="{{route('profile.show')}}">Bilgilerim</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bilgilerimi Düzenle</li>
            </div>
        </ol>
    </nav>
    <div class="container">
        <h1 class="mt-5 mb-4">Bilgilerimi Düzenle</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">İsim</label>
                <input type="text" name="name" class="form-control" id="name" value="{{auth()->user()->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
