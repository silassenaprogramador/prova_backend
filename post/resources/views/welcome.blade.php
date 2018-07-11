<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova BackEnd</title>
    <link rel="stylesheet" href="{{URL::to('layoutsite/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="{{URL::to('layoutsite/assets/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('layoutsite/assets/css/Footer-Basic.css')}}">
    <link rel="stylesheet" href="{{URL::to('layoutsite/assets/css/Navigation-with-Button.css')}}">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="{{url('/')}}">Prova Backend</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/listpostcat','whatsapp')}}">Whatsapp</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/listpostcat','messenger')}}">Messenger</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{url('/listpostcat','smartnx')}}">SmartNX</a></li> 
                    </ul><span class="navbar-text actions"><a class="btn btn-light action-button" role="button" href="{{url('/backend')}}">Backend</a></span></div>
            </div>
        </nav>
    </div>
    <main class="page testimonials">
        <section class="clean-block clean-testimonials dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Prova BackEnd</h2>
                    <p>Este é um sistema exemplo para demonstração</p>
                </div>
                <div class="row">
                    
                    @foreach($lista_postagens as $post)
                    <div class="col-lg-4">
                        <div class="card clean-testimonial-item border-0 rounded-0">
                            <div class="card-body">
                                <h3>{{$post->titulo}}</h3>
                                <p class="card-text">{{$post->conteudo}}</p>
                                <h4 class="card-title">{{$post->autor}}</h4>
                                <h4 class="card-title">{{Funcao::databr($post->created_at)}}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach

                   
                </div>
            </div>
        </section>
    </main>
    <div class="footer-basic dark">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="{{url('listpostcat','whatsapp')}}">Whatsapp</a></li>
                <li class="list-inline-item"><a href="{{url('listpostcat','messenger')}}">Messenger</a></li>
                <li class="list-inline-item"><a href="{{url('listpostcat','smartnx')}}">SmartNX</a></li>
            </ul>
            <p class="copyright">Silas Sena Programador © 2018</p>
        </footer>
    </div>
    <script src="{{URL::to('layoutsite/assets/js/jquery.min.js')}}"></script>
    <script src="{{URL::to('layoutsite/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('layoutsite/assets/js/theme.js')}}"></script>
</body>

</html>
