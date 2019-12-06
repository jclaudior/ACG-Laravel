@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <!--h1 class="display-4">Sistema Gerenciável Comercial</h1-->
        <br>
        <h1 class="display-5">Cadastro Contato</h1>

        <form name="form1" id="form1" action="{{route('contato.store')}}" method="POST">
            @csrf
            <div class="row">
            <div class="col-12">
                <label>Razão Social:</label>
                <input class="form-control @error('razao') is-invalid @enderror"  value="{{old('razao')}}" type="text" id="razao" name="razao" maxlenght="80">
                @error('razao')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label>Fantazia:</label>
                <input class="form-control @error('fantazia') is-invalid @enderror" value="{{old('fantazia')}}" type="text" id="fantazia" name="fantazia" maxlenght="80">
                @error('fantazia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label>Contato:</label>
                <input class="form-control @error('contato') is-invalid @enderror" value="{{old('contato')}}" type="text" id="contato" name="contato" maxlenght="50">
                @error('contato')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label>Cargo:</label>
                <input class="form-control @error('cargo') is-invalid @enderror" value="{{old('cargo')}}" type="text" id="cargo" name="cargo" maxlenght="30">
                @error('cargo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-8">
                <label>Telefone:</label>
                <input class="form-control @error('telefone') is-invalid @enderror" value="{{old('telefone')}}" type="text" id="tel" name="tel" placeholder="(00)0000-0000">
                @error('telefone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-4">
                <label>Ramal:</label>
                <input class="form-control @error('ramal') is-invalid @enderror" value="{{old('ramal')}}" type="text" id="ramal" name="ramal" maxlenght="4" placeholder="0000" pattern="[0-9]*" inputmode="numeric">
                @error('ramal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label>Celular:</label>
                <input class="form-control @error('celular') is-invalid @enderror" value="{{old('celular')}}" type="text" id="celular" name="celular" placeholder="(00)00000-0000">
                @error('celular')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label>Data Retorno:</label>
                <input class="form-control @error('dataRet') is-invalid @enderror" value="{{old('dataRet')}}" type="date" min="{{$data}}" id="dataRet" name="dataRet">
                @error('dataRet')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label>E-mail:</label>
                <input class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" type="text" id="email" name="email" maxlenght="100">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label>Historico:</label>
                <textarea class="form-control @error('historico') is-invalid @enderror" name="historico" id="historico" rows="5" cols="150">{{old('historico')}}</textarea>
                @error('historico')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
            <hr>
            <input class="btn btn-dark" type="submit" value="Cadastrar"> <input class="btn btn-dark" type="reset" value="Limpar">
        </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tel').mask('(00)0000-0000');
        });
        
        $(document).ready(function(){
            $('#celular').mask('(00)00000-0000');
        });
    </script>
@endsection