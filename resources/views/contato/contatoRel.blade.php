@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <br>
        <h1 class="display-5">Relatorio Contato</h1>
        <form action="{{route('contato.index')}}" method="GET">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <label>Tipo de Consulta:</label>
                    <br>
                    <input class="" type="radio" name="tipo" value="2" {{($valores['tipo'] == 2)? "checked" : ''}}><label>Retorno</label>
                    <input class="" type="radio" name="tipo" value="1" {{($valores['tipo'] == 1)? "checked" : ''}}><label>Contato</label>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label>Data Inicial:</label><input class="form-control" type="date" name="DI" value="{{isset($valores)? $valores['DI'] : ''}}">
                </div>
                <div class="col-lg-3 col-sm-12">
                    <label>Data Final:</label><input class="form-control" type="date" name="DF" value="{{isset($valores)? $valores['DF'] : ''}}">
                </div>
                @if(Auth::user()->hasRole('admin'))
                    <div class='col-lg-3 col-sm-12'>
                        <label>Usuario:</label>
                        <select name='userID' class='form-control'>
                        @for($i=0; $i < count($users);$i++)
                        <option value="{{$users[$i]['id']}}" @if($valores['userID'] == $users[$i]['id']) selected @endif>{{$users[$i]['name']}}</option>
                        @endfor
                        </select>
                    </div>
                @endif
                <div class="col-lg-3 col-sm-12">
                    <label>Status:</label>
                    <br>
                    <input class="" type="checkbox" name="F" {{isset($valores['F'])? "checked" : ''}}><label>Finalizadas</label>
                    <input class="" type="checkbox" name="NF" {{isset($valores['NF'])? "checked" : ''}}><label>Não Finalizadas</label>
                </div>
            </div>
            <input class="btn btn-dark mt-1" type="submit" value="Pesquisar">
        </form>
        @if($retornos<>null)
            <hr>
            <div class='row'>
                <div class='col-lg-12 col-sm-12'>
                    <b>{{$retornos[0]['name']}}</b>
                </div>
            </div>

            @if($fin <> null)
                <button type="button" class="btn btn-success my-2"><b>Atendido:</b>{{$fin}}</button> 
            @endif

            @if($nfin <> null)
                <button type="button" class="btn btn-danger my-2"><b>Não Atendido:</b>{{$nfin}}</button> 
            @endif

            @if($fin <> null && $nfin <> null)
                <button type='button' class='btn btn-info my-2'><b>Total:</b>{{$fin + $nfin}}</button>
            @endif

            <div class='d-none d-lg-block mx-3'>
                <div class='row'>
                    <div class='col-lg-6'>
                        <b>Razão Social</b>
                    </div>
                    <div class='col-lg-2 text-left'>
                        <b>Data Retorno</b>
                    </div>
                    <div class='col-lg-2 text-left'>
                        <b>Status</b>
                    </div>
                    <div class='col-lg-2 text-right'>
                        <b>Ação</b>
                    </div>
                </div>
            </div>
            

            @for($i=0;$i < count($retornos);$i++)
                @if($retornos[$i]['ret_fin'] == 0)
                    <div class='alert alert-danger' role='alert'>
                        <div class='row'>
                            <div class='col-lg-6 col-sm-12'>
                                <div class='d-lg-none'><b>Razão Social</b></div>
                                {{$retornos[$i]['contact_razao']}}
                            </div>
                            <div class='col-lg-2 col-sm-12'>
                                <div class='d-lg-none'><b>Data Retorno</b></div>
                                {{date("d/m/Y",strtotime($retornos[$i]['ret_dt']))}}
                            </div>
                            <div class='col-lg-2 col-sm-12'>
                                <div class='d-lg-none'><b>Status</b></div>
                                Não Finalizado
                            </div>
                            <div class='col-lg-2 col-sm-12 text-right'>
                                <a href='{{ route('contato.show', $retornos[$i]['id'])}}'>Abrir</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
            @for($i=0;$i < count($retornos);$i++)
                @if($retornos[$i]['ret_fin'] == 1)
                    <div class='alert alert-success' role='alert'>
                        <div class='row'>
                            <div class='col-lg-6 col-sm-12'>
                                <div class='d-lg-none'><b>Razão Social</b></div>
                                {{$retornos[$i]['contact_razao']}}
                            </div>
                            <div class='col-lg-2 col-sm-12'>
                                <div class='d-lg-none'><b>Data Retorno</b></div>
                                {{date("d/m/Y",strtotime($retornos[$i]['ret_dt']))}}
                            </div>
                            <div class='col-lg-2 col-sm-12'>
                                <div class='d-lg-none'><b>Status</b></div>
                                Finalizado
                            </div>
                            <div class='col-lg-2 col-sm-12 text-right'>
                                <a href='{{ route('contato.show', $retornos[$i]['id'])}}'>Abrir</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
        @endif

        @if($contatos<>null)
            <hr>
            <div class='row'>
                <div class='col-lg-12 col-sm-12'>
                    {{$contatos[0]['name']}}
                </div>
            </div>
            <button type="button" class="btn btn-primary my-2"><b>Contatos Realizados:</b>{{count($contatos)}}</button> 
            <div class='d-none d-lg-block mx-3'>
                <div class='row'>
                    <div class='col-lg-8'>
                        <b>Razão Social</b>
                    </div>
                    <div class='col-lg-2 text-left'>
                        <b>Data Contato</b>
                    </div>
                    <div class='col-lg-2 text-right'>
                        <b>Ação</b>
                    </div>
                </div>
            </div>
            @for($i=0; $i < count($contatos);$i++)
                <div class='alert alert-primary' role='alert'>
                    <div class='row'>
                        <div class='col-lg-8 col-sm-12'>
                        <div class='d-lg-none'><b>Razão Social</b></div>
                        {{$contatos[$i]['contact_razao']}}
                        </div>
                        <div class='col-lg-2 col-sm-12'>
                        <div class='d-lg-none'><b>Data Contato</b></div>
                        {{date("d/m/Y",strtotime($contatos[$i]['created_at']))}}
                        </div>
                        <div class='col-lg-2 col-sm-12 text-right'>
                        <a href="{{ route('contato.show', $contatos[$i]['id'])}}">Abrir</a>
                        </div>
                    </div>
                </div>
            @endfor
        @endif
    </div>   
@endsection