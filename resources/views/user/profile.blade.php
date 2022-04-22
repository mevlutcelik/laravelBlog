@extends('layouts.app-master')
@section('title', '- Profil')
@section('content')
    <nav aria-label="breadcrumb">
        <div class="bg-light">
            <div class="container">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a href="{{route('home.index')}}">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bilgilerim</li>
                </ol>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-5 mb-4">Bilgilerim</h1>
        <div class="table-responsive-sm">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th scope="row">İsim</th>
                    <td>{{ auth()->user()->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">E-posta</th>
                    <td>{{auth()->user()->email}}</td>
                </tr>
                <tr>
                    <th scope="row">Üyelik tarihi</th>
                    <td>{{auth()->user()->created_at}}</td>
                </tr>
                </tbody>
            </table>
            <a href="{{route('profile.edit')}}" type="button" class="btn btn-link">Bilgilerimi düzenle</a>
        </div>
    </div>
@endsection
