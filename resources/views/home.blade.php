@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <br>
        <h3 class="display-5">Retornos @php  echo date('d/m/Y') @endphp</h3>
        <hr>
        @if($contatos<>null)
            @for($i=0;$i < count($contatos);$i++)
                @if($contatos[$i]['ret_fin'] == 0)
                    <div class='alert alert-danger' role='alert'>
                        <div class='row'>
                            <div class='col-lg-8 col-sm-12'>
                                {{$contatos[$i]['contact_razao']}}
                            </div>
                            <div class='col-lg-2 col-sm-12 text-right'>
                                Não Finalizado
                            </div>
                            <div class='col-lg-2 col-sm-12 text-right'>
                                <a href='{{ route('contato.show', $contatos[$i]['id'])}}'>Abrir</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
            @for($i=0;$i < count($contatos);$i++)
                @if($contatos[$i]['ret_fin'] == 1)
                    <div class='alert alert-success' role='alert'>
                        <div class='row'>
                            <div class='col-lg-8 col-sm-12'>
                                {{$contatos[$i]['contact_razao']}}
                            </div>
                            <div class='col-lg-2 col-sm-12 text-right'>
                                Finalizado
                            </div>
                            <div class='col-lg-2 col-sm-12 text-right'>
                                <a href='{{ route('contato.show', $contatos[$i]['id'])}}'>Abrir</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
        @else
            Nenhum retorno encontrado nesta data!
        @endif
    </div>   
@endsection