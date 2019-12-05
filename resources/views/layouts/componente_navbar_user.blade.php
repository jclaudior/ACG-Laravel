<nav class="navbar fixed-top navbar-expand-lg navbar-dark greyColor">
        <div class="container mb-0">
            <a class="navbar-brand h1 text-white mt-1" href="#">
                <img src="{{asset('img/banner4.png')}}" width="40" height="30" alt="" class="d-inline-block align-top" >
                {{config('app.name')}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                            Contato Clientes
                        </a>
                        <div class="dropdown-menu bg-dark ">
                            <a class="dropdown-item text-light" href="/contato">Cadastro Contato</a>
                            <a class="dropdown-item text-light" href="contatoRel.php">Relatorio Contatos</a>
                        </div>  
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                       <a class="nav-link">{{ Auth::user()->name }} </a> 
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

    
