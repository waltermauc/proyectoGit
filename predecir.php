<?php
/*function API($ruta)
{
    $url = "http://127.0.0.1:8000/apiAnalisis/";
    $respuesta = $url . $ruta;
    return $respuesta;
}
$direccion = API("clientes");
$json = file_get_contents($direccion);
$datos = json_decode($json, true);
//print_r($datos);*/
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>BANQUITO | Inicio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">
    <link rel="stylesheet" href="css/img-efect.css">
    <link rel="stylesheet" href="css/accordion.css">
    <link rel="stylesheet" href="css/social.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/social.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/validar.js"></script>
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/icon.png">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--carousel-->
    <script src="js/jssor.slider-26.1.5.min.js" type="text/javascript"></script>
    <script src="js/funciones.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/objetoAjax.js"></script>

    <style>
        .contenedor-slider {
            margin: auto;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .slider {
            display: flex;
            width: 400%;
        }

        .slider__section {
            width: 100%;
        }

        .slider__img {
            display: block;
            width: 100%;
            height: 100%;
        }

        .btn-prev,
        .btn-next {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.7);
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            line-height: 40px;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            border-radius: 50%;
            font-family: monospace;
            cursor: pointer;
        }

        .btn-prev:hover,
        .btn-next:hover {
            background: white;
        }

        .btn-prev {
            left: 5%;
        }

        .btn-next {
            right: 5%;
        }

        .modal-body {
            height: 550px;
        }
    </style>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-8905289264367489",
            enable_page_level_ads: true
        });
    </script>
</head>

<body oncontextmenu="return false" style="background-color: #fff">
    <script>
        fbq('track', 'PaginaPrincipal');
    </script>
    <!--Header-->
    <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="index.html"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li class="active"><a href="index.html">Inicio</a></li>
                        <li class="active"><a href="predecir.php">Predecir</a></li>
                        <li><a href="public/vista/crear_usuario.html">Crear Cuenta</a></li>

                        <li class="login">
                        <li><a href="public/vista/login.html">Iniciar Sesion</a></li>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>


    </header>

    <!--Services-->
    <section id="services" style="background-image: url(images/portfolio/full/fondo1.jpg)" style="text-align: center">
        <div class="container" style="text-align: justify">
            <div class="center gap">
                <h3>Clientes</h3>
                <?php
                /*foreach ($datos as $key => $value) {
                    $cedula = $value["cedula"];
                    $edad = $value["edad"];
                    $tipo = $value["tipoCliente"];
                    echo "<p>cedula: $cedula edad:$edad tipo de cliente:$tipo </p>";
                }*/

                ?>
                <h3>Predecir cliente</h3>
                <form id="formulario01" method="POST" action="prueba.php" onsubmit="return validarCamposObligatorios()">
                    <label for="cedula">DNI:</label>
                    <input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese el número de dni." />
                    <br>


                    <input type="submit" id="crear" name="crear" value="Aceptar" />
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
                </form>


            </div>
            <div class="container">
            </div>



        </div>

    </section>

    <section id="recent-works" style="background-color:rgb(204, 204, 6) ">
        <div class="container">

        </div>
    </section>






    <!--Bottom-->
    <section id="bottom" class="main">
        <!--Container-->
        <div class="container">
            <!--row-fluids-->
            <div class="row-fluid">
                <!--Contact Form-->
                <div class="span7">
                    <h4>UBIQUENOS</h4>
                    <ul class="unstyled address">
                        <li>
                            <i class="icon-home"></i><strong>Dirección:</strong> calle turuhuayco y calle vieja<br>
                        </li>
                        <li>
                            <i class="icon-envelope"></i>
                            <strong>Email: </strong> info@banquito.fin.ec
                        </li>
                        <li>
                            <i class="icon-phone"></i>
                            <strong>Teléfono:</strong> 072222836
                        </li>
                        <li>
                            <i class="icon-phone"></i>
                            <strong>Celular:</strong> 0986694444
                        </li>
                    </ul>
                </div>
                <!--End Contact Form-->

            </div>
            <!--/row-fluid-->
        </div>
        <!--/container-->
    </section>
    <!--/bottom-->

    <!--Footer-->
    <footer id="footer">
        <div class="container">
            <div class="row-fluid">
                <div class="span5 cp">
                    &copy; 2019 <a target="_blank" href="#" title="Free Twitter Bootstrap WordPress Themes and HTML templates">BANQUITO</a>. Todos los derechos reservados
                </div>
            </div>
        </div>
    </footer>
    <!--/Footer-->


</body>

</html>