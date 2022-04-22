@extends('layouts.auth-master')
@section('title', '- Hesap Oluştur')
@section('content')
    <form method="post" action="{{ route('register.perform') }}">
        @csrf
        <img class="mb-4" src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="57">

        <h1 class="h3 mb-3 fw-normal">Hesap oluştur</h1>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control @if ($errors->has('email')) in-valid @endif" name="email" value="{{ old('email') }}" placeholder="isim@domain.com" required="required" autofocus>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control @if ($errors->has('username')) in-valid @endif" name="username" value="{{ old('username') }}" placeholder="Kullanıcı adı" required="required" autofocus>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control @if ($errors->has('password')) in-valid @endif" name="password" value="{{ old('password') }}" placeholder="Şifre" required="required">
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control @if ($errors->has('password_confirmation')) in-valid @endif" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Şifre tekrarı" required="required">
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Hesap oluştur</button>
        <a href="{{route('login.show')}}" type="button" class="btn btn-link">Zaten hesabın var mı? Giriş yap</a>

        @include('auth.partials.copy')
    </form>
@endsection
