<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2017 08:07:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CHAMBITA</title>

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Chambita</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        {{--<li><a class="page-scroll" href="#page-top">Home</a></li>
                        <li><a class="page-scroll" href="#features">Features</a></li>
                        <li><a class="page-scroll" href="#team">Team</a></li>
                        <li><a class="page-scroll" href="#testimonials">Testimonials</a></li>--}}
                        <li><a href="{{ route('login') }}">Iniciar Session</a></li>
                        <li><a href="{{ route('register') }}">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <h1 style="color:#0f0c0c">Chambita</h1>
                    <p style="color:#0f0c0c">Mi Chambita esta en tus manos CONTRATA TU SERVICIO que necesites</p>
                    <a class="btn bg-primary"  href="chambita.apk" role="button" download>Descargar apk</a>
                </div>
                
                <div class="carousel-image wow zoomIn">
                    <br><br><br>
                    <img src="img/landing/logo.png" width="400" height="400" alt="logo"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1>Chambita</h1>
                    <p>Enterprise Resource Planning</p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span> -->
    </a>
    <!-- <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a> -->
</div>


<section id="features" class="container services">
    <div class="row">
        <div class="col-sm-3">
            <h2>Chambita</h2>
            <p>Chambita es una Herramienta que te permitira una gran experiencia en la busqueda y Contratacion de Trabajos en Bolivia</p>
            <!-- <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p> -->
        </div>
        <div class="col-sm-3">
            <h2>Características</h2>
            <p>• Facilidad de Navegacion<br/>
            • Busqueda de servicios<br/>
            • Obtener Contratos de forma rapida<br/>
            • Control sobre los trabajos que se realizan<br/>
            • Fácil adaptabilidad.<br/>
            • Mejoras en la experiencia de busqueda de personal<br/>
            • Filtros de busqueda<br/>
            • Se adapta de acuerdo a las experiencias del Usuario<br/>
            • Respaldos para Empleados<br/>
            • Haz conocer tus habilidades y consigue mas clientes<br/>
            • Puntuacion o calificacion para los Usuarios<br/>
            • Opciones de publicidad en las publicaciones</p>
            <!-- <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p> -->
        </div>
        <div class="col-sm-3">
            <h2>Ventajas </h2>
            <p>• Software especializado para la Busqueda y Contratacion<br/>
            • Mayor rapidez para encontrar el servicio deseado<br/>
            • Puedes optar por una mayor publicidad<br/>
            • Opcion de respaldo para garantizarte una mejor experiencia como Empleado<br/>
            • Aplicaciones Movil para cualquier S.O.<br/>
            • Busqueda Inteligente adaptable al Usuario</p>
            <!-- <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p> -->
        </div>
        <div class="col-sm-3">
            <h2>QUIEN UTILIZA CHAMBITA</h2>
         <!--    <img src="img/landing/erp.jpg" class="img-responsive img-circle img-small" alt="">     -->
            <p>Aquella persona en busca de oportunidades de Trabajo o de un Facil acceso a Servicios por parte de ellos</p>
            <!-- <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p> -->
        </div>
    </div>
</section>

<section id="team" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <!-- <div class="navy-line"></div> -->
                <h1>Desarrolladores</h1>
                <p>Los integrantes del equipo de desarrollo de este proyecto se muestran a continuación.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">
                <div class="team-member">
                    <img src="img/landing/1milton.jpeg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="name" style="color:#0f0c0c">Milton </span>Rodríguez Davalos </h4>                    
                    <p>Ingeniería en informática</p>
                    <p>Facultad de ingeniería en ciencias de la computación y telecomunicaciones U.A.G.R.M 2-2020 </p>
                    <ul class="list-inline social-icon">
                        <!-- <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/chiritoxD"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member wow zoomIn">
                    <img src="img/landing/2dayana.jpeg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy" style="color:#0f0c0c">Dayana</span> Justiniano Velarde</h4>
                    <p>Ingeniería en Sistemas</p>
                    <p>Facultad de ingeniería en ciencias de la computación y telecomunicaciones U.A.G.R.M 2-2020 </p>
                    <ul class="list-inline social-icon">
                        <!-- <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/dayana.justinianovelarde"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 wow fadeInRight">
                <div class="team-member">
                    <img src="img/landing/3elda.jpeg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy" style="color:#0f0c0c">Elda Dania</span>Sausa Rivera</h4>
                    <p>Ingeniería en Sistemas</p>
                    <p>Facultad de ingeniería en ciencias de la computación y telecomunicaciones U.A.G.R.M 2-2020 </p>
                    <ul class="list-inline social-icon">
                        <!-- <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/eldadania.sausarivera"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">
                <div class="team-member">
                    <img src="img/landing/4rebeca.jpeg" class="img-responsive img-circle img-small" alt="" >
                    <h4><span class="navy" style="color:#0f0c0c">Rebeca </span> Guerrero Lazarte.</h4>
                    <p>Ingeniería en Sistemas</p>
                    <p>Facultad de ingeniería en ciencias de la computación y telecomunicaciones U.A.G.R.M 2-2020 </p>
                    <ul class="list-inline social-icon">
                        <!-- <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/joserebeka.guerrero"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member wow zoomIn">
                    <img src="img/landing/5marco.jpeg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy" style="color:#0f0c0c"> Marco Antonio </span>Choque Uchazara</h4>
                    <p>Ingeniería Informatica</p>
                    <p>Facultad de ingeniería en ciencias de la computación y telecomunicaciones U.A.G.R.M 2-2020 </p>
                    <ul class="list-inline social-icon">
                        <!-- <li><a href="#" ><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">                
                <p>Este producto se encuentra protegido por los derechos de autoría de los desarrolladores, cualquier alteracion en el codigo fuente que afecte el funcionamiento del sistema será considerado como un Plagio</p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('js/plugins/wow/wow.min.js')}}"></script>


<script>
    $(document).ready(function () {
        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });
        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });
    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();
    })();
    // Activate WOW.js plugin for animation on scrol
    new WOW().init();
</script>

</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2017 08:08:07 GMT -->
</html>