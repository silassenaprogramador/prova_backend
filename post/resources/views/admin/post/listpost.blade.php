@extends('layouts.app')

@section('CSS')

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{URL::to('layoutadmin/plugins/datatables/dataTables.bootstrap4.css')}}">

@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-2">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('/createpost')}}" class="btn btn-primary">Cadastrar Postagem</a>
                </div>

                <div class="card-body">
                    
                    <form>
                        <select class="form-control col-md-5 mx-2" id="categoria" onchange="carregarPost($(this).val())">
                            <option value="">Selecione</option>
                            <option value="whatsapp"  @if(Session::get('ss_categoria') == 'whatsapp') selected @endif>Whatsapp</option>
                            <option value="messenger" @if(Session::get('ss_categoria') == 'messenger') selected @endif>Messenger</option>
                            <option value="smartnx"   @if(Session::get('ss_categoria') == 'smartnx') selected   @endif>SmartNX</option>
                        </select>
                    </form>
                    
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <th>#</th>
                            <th>TITULO</th>
                            <th>AUTOR</th>
                            <th>CATEGORIA</th>
                            <th>CRIADO EM</th>
                            <th>AÇOES</th>
                        </thead>
                        <tbody>
                            @foreach($lista_post as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->titulo}}</td>
                                    <td>{{$post->autor}}</td>
                                    <td>{{$post->categoria}}</td>
                                    <td>{{Funcao::dataBr($post->created_at)}}</td>
                                    <td>
                                        <a href="{{url('editpost',$post->id)}}" title="Editar Registro"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="javascript:func()" onclick="confirmacao_exclusao({{$post->id}})" title="Deletar Registro" data-rel="collapse">
                                            <i class="fa fa-eraser fa-2x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('JS')

<!-- DataTables -->
<script src="{{URL::to('layoutadmin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::to('layoutadmin/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::to('layoutadmin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{URL::to('layoutadmin/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{URL::to('layoutadmin/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });

    function confirmacao_exclusao(id)
    {
        var resposta = confirm("Deseja remover esse registro?");
        var caminho_exclusao = "{{url('deletepost')}}" +'/'+ id;

        if (resposta == true) {
            window.location.href = caminho_exclusao;
        }
    }
    
    function carregarPost(){
        
        var categoria = $('#categoria').val();
        
        if(categoria != ''){
            var caminho_postagem = "{{url('filtrarcategoria')}}" +'/'+ categoria;
            window.location.href = caminho_postagem; 
        }
        
    }
    
</script>     

@endsection
