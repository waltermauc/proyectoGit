<?php
session_start();
$nombresui = explode(" ", $_SESSION['nom']);
$apellidosui =  explode(" ", $_SESSION['ape']);
$codigoui = $_SESSION['cod'];
$usurol = $_SESSION['rol'];
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /public/vista/login.html");
}
if ($usurol == 'empleado') {
?>
    <!DOCTYPE html>
    <html class="no-js">
    <?php
    include '../../../config/conexionBD.php';
    $sqlu = "SELECT * FROM bv_persona WHERE per_id='$codigoui';";
    $resultu = $conn->query($sqlu);
    $row = $resultu->fetch_assoc();
    $nombres = $row["per_nombre"];
    ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>BANQUITO | Inicio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="../../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../../../css/font-awesome.min.css">
        <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/sl-slide.css">
        <link rel="stylesheet" href="../../../css/img-efect.css">
        <link rel="stylesheet" href="../../../css/accordion.css">
        <link rel="stylesheet" href="../../../css/social.css">
        <link rel="stylesheet" href="../../../css/social.css">
        <script type="text/javascript" src="../../../js/validar.js"></script>
        <script src="../../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="images/ico/icon.png">
        <script src="../../../js/jquery-3.2.1.min.js"></script>
        <!--carousel-->
        <script src="../../../js/jssor.slider-26.1.5.min.js" type="text/javascript"></script>
        <script src="../../../js/funciones.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../../js/objetoAjax.js"></script>
        <script>
            $(document).ready(function() {
                $('.myCarousel').carousel()

                //$('#modal-13').modal({ keyboard: false }).load   // initialized with no keyboard
            });
        </script>
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
        <style>
            table {
                width: 100%;
                border: 1px solid #000;
            }

            th,
            td {
                height: 50px;
                text-align: center;
                border: 1px solid #000;
                border-collapse: collapse;
                padding: 0.3em;
                caption-side: bottom;
            }

            caption {
                padding: 0.3em;
                color: #fff;
                background: #000;
            }

            th {
                background: #eee;
            }
        </style>
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
                            <li class="active"><a href="index.php">Lista Usuarios</a></li>
                            <li><a href="crear_empleado.php">Crear Empleado</a></li>
                            <li><a href="../../../config/cerrarSesion.php">Cerrar Sesion</a></li>

                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>


        </header>
        <!-- /header -->
        <!--Slider-->
        <br>
        <br>
        <br>
        <br>
        <br>



        <!--Services-->
        <section id="services" style="text-align: center">
            <div class="container" style="text-align: justify">
                <div class="center gap">
                    <table id="tbl">
                        <caption>
                            
                        <h4>LISTA DE CREDITOS SOLICITADOS</h4>
                        </caption>
                        <tr>
                            <th>Codigo de Credito</th>
                            <th>Tipo Amortizacion</th>
                            <th>Meses</th>
                            <th>Monto de Credito</th>
                            <th>Tasa</th>
                            <th>Codigo de  Cliente</th>
                            <th>Tipo de Garante</th>
                            <th>Ver Detalles de Credito</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM bv_persona p, bv_cuenta c, bv_cliente cc ,bv_credito cr where p.per_id = cc.cli_persona and c.cli_id = cc.cli_id and cc.cli_id=cr.cli_id  and p.per_rol='usuario'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $codigo = $row["cred_id"];
                                $tipoamort = $row["cred_tipoa"];
                                $meses = $row["cred_meses"];
                                $tasa = $row["cred_tasa"];
                                $monto = $row["cred_monto"];
                                $codigocli = $row["cli_id"];
                                $tgarante = $row["cred_garantia"];
                                echo "<tr>";
                                echo " <td>" . $codigo . "</td>";
                                echo " <td>" . $tipoamort . "</td>";
                                echo " <td>" . $meses . "</td>";
                                
                                echo " <td>" . $monto . "</td>";
                                echo " <td>" . $tasa . "</td>";
                                echo " <td>" . $codigocli . "</td>";
                                echo " <td>" . $tgarante . "</td>";
                                echo " <td><a href='versolicitud.php?codigocre=$codigo'&codigocli='$codigocli'><img height='30' width='30' src=\"../../../public/vista/images/det.png\"></a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>";
                            echo " <td colspan='7'> No existen usuarios registrados en el sistema </td>";
                            echo "</tr>";
                        }
                        $conn->close();
                        ?>
                    </table>
                </div>

                <div class="row-fluid">

                </div>

                <div class="gap">

                </div>


            </div>

        </section>
        <br>
        <br>
        <br>
        <br>
        <br>
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
        <!--  Login form -->
        <div class="modal hide fade in" id="loginForm" aria-hidden="false" style="height: 150px;background-color:#444444;">
            <div class="modal-header">
                <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
                <h4 style="text-align: center;color: aliceblue">Iniciar Sesion</h4>
            </div>
            <!--Modal Body-->
            <div class="modal-body" style="height:auto; text-align: center;background-color: #999">

                <input type="text" class="input-small" placeholder="Usuario" id="usuario">
                <input type="password" onkeypress="validar(event)" class="input-small" placeholder="Password" id="password">
                <br><button onclick="Login()" class="btn btn-primary zoom">Ingresar</button>

            </div>
            <!--/Modal Body-->
        </div>
        <!--  /Login form -->

        <script src="../../../js/vendor/jquery-1.9.1.min.js"></script>
        <script src="../../../js/vendor/bootstrap.min.js"></script>
        <script src="../../../js/main.js"></script>
        <!-- Required javascript files for Slider -->
        <script src="../../../js/jquery.ba-cond.min.js"></script>




        <style>
            input:invalid {
                border-color: red;
            }

            input,
            input:valid {
                border-color: #444;
            }
        </style>





    </body>

    </html>

<?php
} else {
    header("Location: /examen/public/vista/login.html");
}
?>