@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h1 class="display-5 mt-5">Edição Usuário {{$user[0]['name']}}</h1>
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <div class="alert alert-{{ $msg }}" role="alert">
                    {!! Session::get('alert-' . $msg) !!}
                </div>
            @endif
        @endforeach
        <form method="POST" action="{{ route('usuarios.update',$user[0]['id'])}}">
            {{ method_field('PUT') }}
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-12 col-form-label">{{ __('Nome:') }}</label>
                <div class="col-md-12">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user[0]['name']) }}" required autocomplete="name" autofocus>
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
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user[0]['email']) }}" required autocomplete="email">
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Insira uma nova senha" maxlength="4">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirmação de Senha') }}</label>
                <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme a nova Senha" maxlength="4">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-12 col-form-label">Permissão:</label>
                <div class="col-md-12">
                    <select class="form-control" name="perm">
                        <option value="padrao" @if($user[0]['roles'][0]['role_name'] == "padrao" ) selected @endif>Padrao</option>
                        <option value="admin" @if($user[0]['roles'][0]['role_name'] == "admin" ) selected @endif>Admin</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-dark">
                        {{ __('Alterar') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection