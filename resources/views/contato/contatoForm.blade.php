@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <!--h1 class="display-4">Sistema Gerenciável Comercial</h1-->
        <br>
        <h1 class="display-5">Cadastro Contato</h1>
        <form name="form1" id="form1">
            <div class="row">
            <div class="col-12">
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <label>Razão Social:</label>
                <input class="form-control" type="text" id="razao" name="razao" maxlenght="80">
            </div>
            <div class="col-12">
                <label>Fantazia:</label>
                <input class="form-control" type="text" id="fantazia" name="fantazia" maxlenght="80">
            </div>
            <div class="col-12">
                <label>Contato:</label>
                <input class="form-control" type="text" id="contato" name="contato" maxlenght="50">
            </div>
            <div class="col-12">
                <label>Cargo:</label>
                <input class="form-control" type="text" id="cargo" name="cargo" maxlenght="30">
            </div>
            <div class="col-8">
                <label>Telefone:</label>
                <input class="form-control" type="text" id="telefone" name="telefone" placeholder="(00)0000-0000">
            </div>
            <div class="col-4">
                <label>Ramal:</label>
                <input class="form-control" type="text" id="ramal" name="ramal" maxlenght="4" placeholder="0000" pattern="[0-9]*" inputmode="numeric">
            </div>
            <div class="col-12">
                <label>Celular:</label>
                <input class="form-control" type="text" id="celular" name="celular" placeholder="(00)00000-0000">
            </div>
            <div class="col-12">
                <label>Data Retorno:</label>
                <input class="form-control" type="date" min="" id="dataRet" name="dataRet">
            </div>
            <div class="col-12">
                <label>E-mail:</label>
                <input class="form-control" type="text" id="email" name="email" maxlenght="100">
            </div>
            <div class="col-12">
                <label>Historico:</label>
                <textarea class="form-control" name="historico" id="historico" rows="5" cols="150"></textarea>
            </div>
            </div>
            <hr>
            <input class="btn btn-dark" type="submit" value="Cadastrar"> <input class="btn btn-dark" type="reset" value="Limpar">
        </form>
        </div>
    </div>
@endsection