@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h1 class="display-5 mt-5">Redefinição de Senha</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group row">
            <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('Endereço de E-mail') }}</label>
            <div class="col-md-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus Readonly>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Senha') }}</label>
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
            <label for="password-confirm" class="col-md-12 col-form-label text-md-left">{{ __('Confimação de Senha') }}</label>
            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6">
                <button type="submit" class="btn btn-dark">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
