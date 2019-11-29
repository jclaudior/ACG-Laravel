@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h1 class="display-5 mt-5">Cadatro  de Usuário</h1>
    <br>  
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-12 col-form-label">{{ __('Nome:') }}</label>
            <div class="col-md-12">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail:') }}</label>
            <div class="col-md-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-12 col-form-label">{{ __('Senha:') }}</label>
            <div class="col-md-12">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirmação de Senhacd l  ') }}</label>
            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-dark">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
