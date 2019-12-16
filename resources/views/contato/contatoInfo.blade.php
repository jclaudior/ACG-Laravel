@extends('layouts.app')

<div class="container mt-5">
        <br>
        <br>
        <h3 class="display-5">Retorno {{$contato[0]['contact_razao']}} </h3>
        <hr>
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <div class="alert alert-{{ $msg }}" role="alert">
                    {!! Session::get('alert-' . $msg) !!}
                </div>
            @endif
        @endforeach
        <div class="row">
            <div class="col-lg-12">
                <b>Fantazia:</b> {{$contato[0]['contact_fanta']}} 
            </div>
            <div class="col-lg-6 col-sm-6">
                <b>Contato:</b> {{$contato[0]['contact_contato']}}
            </div>
            <div class="col-lg-6 col-sm-12">
                <b>Cargo:</b>{{$contato[0]['contact_cargo']}}
            </div>
            <div class="col-lg-6 col-sm-12">
                <b>Telefone:</b>{{$contato[0]['contact_tel']}} 
                <b>Ramal:</b>{{$contato[0]['contact_ramal']}}
            </div>
            <div class="col-lg-6 col-sm-12">
                <b>Celular:</b>{{$contato[0]['contact_cel']}}
            </div>
            <div class="col-lg-12 col-sm-12">
                <b>Email: </b>{{$contato[0]['contact_email']}}
            </div>
            <div class="col-lg-6 col-sm-12">
                <b>Data Contato:</b>{{date("d/m/Y",strtotime($contato[0]['created_at']))}}
            </div>
            <div class="col-lg-6 col-sm-12">
                <b>Data Retorno:</b>{{date("d/m/Y",strtotime($contato[count($contato)-1]['ret_dt']))}} 
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
                <b>Historico Contato:</b><br>
                <div class="pre-scrollable border border-dark">    
                    @for($i=0;$i < count($historico); $i ++) 
                        <p class='mt-2 ml-2'><b>{{date("d/m/Y",strtotime($historico[$i]['created_at']))}}</b>-{{$historico[$i]['hist_cont']}}</p>
                    @endfor
                </div>
            </div>
        </div>
        <br>
        <hr>
        <h3 class="display-5">Informações Contato</h3>
        <br>
        <form action="{{route('contato.update',$contato[0]['id'])}}" method="POST" id="form1" name="form1">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <labeL>Novo Retorno:</label>
            <input class="form-control" type="date" min="{{date('Y-m-d', strtotime("+1 days",strtotime(date('Y-m-d'))))}}" id="dataRet" name="dataRet" value="{{old('dataRet',date("Y-m-d",strtotime($contato[count($contato)-1]['ret_dt'])))}}">
            <label>Historico do Retorno:</label>
            <textarea class="form-control  @error('historico') is-invalid @enderror" name="historico" rows="5"></textarea>
            @error('historico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
            <input type="submit" class="form-control btn btn-danger" value="Gravar">
        </form>
        <hr>
        <a class="btn btn-dark mr-2" href="{{route('login')}}">Inicio</a><a class="btn btn-dark" href="/contato">Relatorio</a>
           
</div>