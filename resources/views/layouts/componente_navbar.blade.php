
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark greyColor">
        <div class="container mb-0">
            <a class="navbar-brand h1 text-white mt-1" href="#">
            <img src="{{asset('img/banner4.png')}}" width="40" height="30" alt="" class="d-inline-block align-top" >
                {{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                            Social 
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" target="_blank" href="https://www.facebook.com/Servi%C3%A7os-Central-log%C3%ADstica-e-Armaz%C3%A9ns-Gerais-LTDA-186523182080635/">Facebook</a>
                            <a class="dropdown-item" href="#">Twitter</a>
                            <a class="dropdown-item" href="#">Instagran</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link" href="#">
                        Tel.(11)3054-3400
                    </a>
                <ul>
            </div>
        </div>
    </nav>
