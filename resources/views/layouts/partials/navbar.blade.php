<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">{{config('app.name', 'Blog')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{Route::is('home.index') ? 'active' : null}}">
                    <a href="{{route('home.index')}}" class="nav-link">Anasayfa
                        <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Yazılar</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            {{auth()->user()->username}}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('profile.show')}}">Bilgilerim</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{route('logout.perform')}}">Çıkış yap</a>
                        </div>
                    </div>
                @endauth
                @guest
                    <li class="nav-item {{Route::is('login.show') ? 'active' : null}}">
                        <a class="nav-link"
                           href="{{route('login.show')}}">Giriş Yap <span class="sr-only">(current)</span></a>
                    </li>
                        <li class="nav-item {{Route::is('register.show') ? 'active' : null}}">
                            <a class="nav-link"
                               href="{{route('register.show')}}">Üye ol <span class="sr-only">(current)</span></a>
                        </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
