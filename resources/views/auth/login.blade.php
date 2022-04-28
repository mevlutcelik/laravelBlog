@extends('layouts.auth-master')
@section('title', '- Giriş Yap')
@section('content')
    <form method="post" action="{{ route('login.perform') }}">

        @csrf
        <img class="mb-4" src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="57">

        <h1 class="h3 mb-3 fw-normal">Giriş yap</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Kullanıcı adı" required="required" autofocus>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Şifre" required="required">
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="remember">Beni hatırla</label>
            <input id="remember" type="checkbox" name="remember_token" value="1">
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Giriş yap</button>
        <a href="{{route('register.show')}}" type="button" class="btn btn-link">Hesabın yok mu? Hesap oluştur</a>

        @include('auth.partials.copy')
    </form>
@endsection
