@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h1 class="display-5 mt-5">Redefinição de Senha</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('Endereço de E-Mail') }}</label>
            <div class="col-md-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-dark">
                    {{ __('Enviar link') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
