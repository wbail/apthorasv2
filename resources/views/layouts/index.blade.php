<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AptHoras² - GB Engenharia</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('../resources/views/layouts/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('../resources/views/layouts/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/views/layouts/vendor/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/views/layouts/vendor/device-mockups/device-mockups.min.css') }}">

    <!-- Theme CSS -->
    <link href="{{ asset('../resources/views/layouts/css/new-age.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">AptHoras²</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#download">Sobre</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#features">Como Funciona</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>AptHoras² controla seu tempo. Saiba exatamente quanto tempo você gasta com suas atividades diárias!</h1>
                            <a href="#download" class="btn btn-outline btn-xl page-scroll">Comece agora!</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="{{ asset('../resources/views/layouts/img/tarefas.png') }}" class="active" alt="">
                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="download" class="download bg-primary text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="section-heading">
                        Tempo é dinheiro.
                        <br>
                        Saiba quanto tempo você gasta.
                    </h2>
                    <p>Crie sua conta agora mesmo e economize dinheiro!</p>
                    <div class="badges">
                        {{-- <a href="#download" class="btn btn-outline btn-xl page-scroll">Criar Conta</a> --}}
                        <a href="{{ url('/register') }}" class="btn btn-outline btn-xl page-scroll">Criar Conta</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Sem limites. Use da sua forma.</h2>
                        <p class="text-muted">Descubra algumas funcionalidades do AptHoras²</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <!-- <img src="img/demo-screen-1.jpg" class="img-responsive" alt=""> -->
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <img src="{{ asset('../resources/views/layouts/img/tarefas.png') }}" alt="...">
                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('../resources/views/layouts/img/tarefas.png') }}" alt="...">
                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('../resources/views/layouts/img/tarefas.png') }}" alt="...">
                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('../resources/views/layouts/img/tarefas.png') }}" alt="...">
                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('../resources/views/layouts/img/tarefas.png') }}" alt="...">
                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-screen-smartphone text-primary"></i>
                                    <h3>Responsivo</h3>
                                    <p class="text-muted">Se adequa a qualquer dispositivo. Use no seu celular, notebook ou tablet.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-camera text-primary"></i>
                                    <h3>Flexible Use</h3>
                                    <p class="text-muted">Put an image, video, animation, or anything else in the screen!</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-present text-primary"></i>
                                    <h3>É grátis!</h3>
                                    <p class="text-muted">Controlar seus projetos, clientes, tarefas e prazos nunca foi tão barato.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-lock-open text-primary"></i>
                                    <h3>Seguro</h3>
                                    <p class="text-muted">Apenas você e sua equipe tem acesso. Ninguém mais.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <h2>Não perca mais tempo.<br>Saiba quanto tempo você gasta.</h2>
                <a href="#download" class="btn btn-outline btn-xl page-scroll">Comece agora!</a>
            </div>
        </div>
        <div class="overlay"></div>
    </section>

    <section id="contact" class="contact bg-primary">
        <div class="container">
            <h2>Entre em contato conosco.</h2>
            <br>
            <h2>Feito com <i class="fa fa-heart"></i> por GB Engenharia & Consultoria</h2>
            <ul class="list-inline list-social">
                <li class="social-twitter">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li class="social-facebook">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2017 AptHoras². Todos os direitos reservados.</p>
            <ul class="list-inline">
                <li>
                    <a href="#">Privacidade</a>
                </li>
                <li>
                    <a href="#">Termos</a>
                </li>
                <li>
                    <a href="#">FAQ</a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('../resources/views/layouts/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('../resources/views/layouts/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="{{ asset('../resources/views/layouts/js/new-age.min.js') }}"></script>

</body>

</html>
