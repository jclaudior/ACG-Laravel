@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h1 class="display-4 mt-5">Usuários</h1>
        <form action={{route('usuarios')}} method="GET">
            @csrf
            <div class="form-group row">
                <div class="col-12">
                    <label class="col-form-label">Localizar:</label>
                </div>
                <div class="col-2">
                    <select name="por" class="form-control">
                        <option value="nome">Nome</option>
                        <option value="email">E-mail</option>
                    </select>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="valor" placeholder="Digite o valor para pesquisa!">
                </div>
                <div class="col-4">
                    <input class="btn btn-dark" type="submit" value="Enviar">
                </div>
            </div>
        </form>
        <hr>
        <div class="pre-scrollable">
            @if (isset($list))
                @for ($i = 0; $i < count($list); $i++)
                    <div class="alert alert-secondary mx-1 my-2">
                        <div class="row">
                            <div class="col-4">
                                <b>Nome: </b>{{$list[$i]['name']}}
                            </div>
                            <div class="col-5">
                                <b>E-mail: </b>{{$list[$i]['email']}}
                            </div>
                            <div class="col-2">
                                <b>Permissão: </b>{{$list[$i]['roles'][0]['role_name']}}
                            </div>
                            <div class="col-1 text-right">
                                <a href="">Edit</a>
                            </div>
                        </div>
                    </div>
                @endfor
            @endif
        </div>
    </div>
@endsection