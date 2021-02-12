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
                        <li><a href="calCredito.php">Calcule su Crédito</a></li>
                        <li><a href="solitudCredito.php">Solicite su Crédito</a></li>
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



    <section id="services" style="background-image: url(images/portfolio/full/fondo1.jpg)" style="text-align: center">
        <div class="container" style="text-align: justify">
            <div class="center gap">
                <h2>Prediccion</h2>
                <?php
                $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
                //The url you wish to send the POST request to
                $url = 'http://127.0.0.1:8000/apiAnalisis/predecirTipoCliente/';

                //The data you want to send via POST
                $fields = [
                    'Dni'      => $cedula
                ];

                //url-ify the data for the POST
                $fields_string = http_build_query($fields);

                //open connection
                $ch = curl_init();

                //set the url, number of POST vars, POST data
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

                //So that curl_exec returns the contents of the cURL; rather than echoing it
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                //execute post
                $result = curl_exec($ch);
                $final = '<h3>' . $result . '</h3>';
                echo $final;
                ?>

                <a href="predecir.php"><input type="button" id="pre" name="pre" value="Volver a predecir" /></a>


            </div>
            <div class="container">

            </div>



        </div>

    </section>











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



</body>

</html>