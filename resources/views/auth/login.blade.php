@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <br>
        <h1 class="display-4 d-none d-lg-block">Agenda Gerenciável Comercial</h1>
        <h1 class="display-5 d-lg-none">Agenda Gerenciável Comercial</h1>
        <br>
        <h1 class="display-5">Logín Usuário</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="email" class="">{{ __('E-Mail: ') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="password" class="">{{ __('Senha:') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" maxlength="4">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <hr>
                <button type="submit" class="btn btn-dark">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Esqueci minha Senha') }}
                    </a>
                @endif
            </form>
    </div>
          
@endsection
