@extends('layouts.app')

@section('CSS')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header">
                    Cadastrar de Postagem
                </div>
                
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>	
                @endif
                
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                   
                    <form method="post" action="{{url('/createpost')}}">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="titulo">Titulo:</label>
                            <input type="text" name="titulo" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <label for="autor">Autor:</label>
                            <input type="text" name="autor" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select class="form-control" name="categoria">
                                <option value="whatsapp">WhatsApp</option>
                                <option value="messenger">Messenger</option>
                                <option value="smartnx">SmartNX</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="conteudo">Conteudo:</label>
                            <textarea class="form-control" name='conteudo'></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Cadastrar</button>

                    </form>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
