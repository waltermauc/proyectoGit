<?php
session_start();
$nombresui = explode(" ", $_SESSION['nom']);
$apellidosui =  explode(" ", $_SESSION['ape']);
$codigoui = $_SESSION['cod'];
$usurol = $_SESSION['rol'];
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /software/BancaVirtual/public/vista/login.html");
}
if ($usurol == 'usuario') {
?>
    <!DOCTYPE html>
    <html class="no-js">
    <?php
    include '../../../config/conexionBD.php';
    $sqlu = "SELECT * FROM bv_persona WHERE per_id='$codigoui';";
    $resultu = $conn->query($sqlu);
    $row = $resultu->fetch_assoc();
    $nombres = $row["per_nombre"];
    $apellidos = $row["per_apellido"];

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





    </head>

    <body oncontextmenu="return false" onload="active();redirigirNot();" style="background-color:rgb(255,255,255)">
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
                            <li><a href="index.php">Inicio</a></li>
                            <li class="active"><a href="calCredito.php">Crédito</a></li>
                            <li><a href="solicitud.php">Solicite una Polizas</a></li>
                            <li><a href="estadocuenta.php">Consulte su Cuenta</a></li>
                            <li><a href="registrosaccesos.php">Consulta de registros </a></li>
                            <li><a href="../../../config/cerrarSesion.php">Cerrar Sesion</a></li>
                            <div>


                            </div>

                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </header>

        <title>SD | Crédito</title>




        <section class="title" style="background-color:rgb(204, 204, 6) ">
            <div class="container">
                <div class="row-fluid">
                    <div class="span6">
                        <h1>Crédito</h1>
                    </div>

                </div>
            </div>
        </section>
        <!-- / .title -->

        <!-- poner estilos de la tabla -->
        <style>
        </style>

        <section id="faqs" class="container">
            <div class="row-fluid">

                <!--izquierda-->
                <div class="span5">

                    <?php
                    $sql1 = "SELECT * FROM bv_cliente where cli_persona=$codigoui;";
                    $result1 = $conn->query($sql1);
                    $codigoCredito = 0;
                    $tabla="";
                    if ($result1->num_rows > 0) {
                        while ($row = $result1->fetch_assoc()) {
                            $codigoCredito = $row["cli_id"];
                        }
                        $sql = "SELECT * FROM bv_poliza where pol_codigopersona=$codigoui AND pol_estado='A';";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $monto = 0;
                            $interes = 0;
                            $plazo = 0;
                            $tipo = '';
                            while ($row = $result->fetch_assoc()) {
                                $monto = $row["pol_monto"];
                                $interes = $row["pol_tasa"];
                                $plazo = $row["pol_meses"];
                                $tipo = $row["pol_tipo"];
                            }
                            //$f = new Date();
                            $dia = date("d");
                            $mes = date("m");
                            $anio = date("Y");
                            $tabla = "<table border=\"0\">";
                            $tabla = $tabla."<tr> <th>Num.Cuota</th><th>Fecha</th><th>Interes</th><th>Abono Capital</th><th>Desgravamen</th><th>Cuota</th><th>Saldo Capital</th></tr>";

                            if ($tipo == 'francesa') {
                                $intRate = ($interes / 100) / 12;
                                $totalcapital = 0;
                                $totalinteres = 0;
                                $totalcapint = 0;
                                $totalsaldocap = 0;
                                $totaldesgravam = 0;
                                $totalcuota_desg = 0;
                                $cuota = floor(($monto * $intRate) / (1 - pow(1 + $intRate, (-1 * $plazo))) * 100) / 100;
                                $capitalpendiente = $monto;

                                for ($i = 1; $i <= $plazo; $i++) {
                                    if ($mes == 12) {
                                        $anio = $anio + 1;
                                        $mes = 1;
                                    } else {
                                        $mes = $mes + 1;
                                    }

                                    
                                    $intereses = round($capitalpendiente * $intRate * 100) / 100;
                                    $amortizacion = round(($cuota - $intereses) * 100) / 100;
                                    $capitalpendiente = round(($capitalpendiente - $amortizacion) * 100) / 100;
                                    $desgravamen = round(($capitalpendiente * 0.00057) * 100) / 100;
                                    $cuota_desg = round(($cuota + $desgravamen) * 100) / 100;
                                    $totalcapital = $totalcapital + $amortizacion;
                                    $totalinteres = $totalinteres + $intereses;
                                    $totalcapint = $totalcapint + $cuota;
                                    $totalsaldocap = $totalsaldocap + $capitalpendiente;
                                    $totaldesgravam = $totaldesgravam + $desgravamen;
                                    $totalcuota_desg = $totalcuota_desg + $cuota_desg;
                                    $tabla =$tabla. "<td>" . $i . "</td>";
                                    $tabla = $tabla."<td>" . $anio . "-" . $mes . "-" . $dia . "</td>";
                                    $tabla = $tabla."<td>" . $intereses . "</td>";
                                    $tabla =$tabla. "<td>" . $amortizacion . "</td>";
                                    $tabla =$tabla. "<td>" . $desgravamen . "</td>";
                                    $tabla = $tabla."<td>" . $cuota_desg . "</td>";
                                    $tabla = $tabla."<td>" . $capitalpendiente . "</td>";
                                    $tabla = $tabla."</tr>";
                                }

                                $tabla = $tabla."<tr>";
                                $tabla = $tabla."<td>TOTALES:</td>";
                                $tabla =$tabla. "<td></td>";
                                $decimal1 = round($totalinteres, 2);
                                $tabla = $tabla."<td>" . $decimal1 . "</td>";
                                $tabla =$tabla. "<td>" . $monto . "</td>";
                                $decimal3 = round($totaldesgravam, 2);
                                $tabla = $tabla."<td>" . $decimal3 . "</td>";
                                $decimal2 = round($totalcuota_desg, 2);
                                $tabla =$tabla. "<td>" . $decimal2 . "</td>";
                                $tabla =$tabla. "<td></td>";
                                $tabla =$tabla. "</tr>";
                                $tabla = $tabla."</table>";
                                echo "$tabla";
                            } else if ($tipo == 'alemana') {
                                $intRate = ($interes / 100);
                                $totalcapital = 0;
                                $totalinteres = 0;
                                $totalcapint = 0;
                                $totalsaldocap = 0;
                                $totaldesgravam = 0;
                                $totalcuota_desg = 0;
                                $capitalpendiente = $monto;
                                for ($i = 1; $i <= $plazo; $i++) {

                                    if ($mes == 12) {
                                        $anio = $anio + 1;
                                        $mes = 1;
                                    } else {
                                        $mes = $mes + 1;
                                    }
                                    $tabla =$tabla. "<tr>";
                                    $intereses = round(((($capitalpendiente * $intRate) * 30) / 360) * 100) / 100;
                                    $amortizacion = floor(($monto / $plazo) * 100) / 100;
                                    $capitalpendiente = round(($capitalpendiente - $amortizacion) * 100) / 100;
                                    $cuota = floor(($amortizacion + $intereses) * 100) / 100;
                                    $desgravamen = round(($capitalpendiente * 0.00046) * 100) / 100;
                                    $cuota_desg = round(($cuota + $desgravamen) * 100) / 100;
                                    $totalcapital = $totalcapital + $amortizacion;
                                    $totalinteres = $totalinteres + $intereses;
                                    $totalcapint = $totalcapint + $cuota;
                                    $totalsaldocap = $totalsaldocap + $capitalpendiente;
                                    $totaldesgravam = $totaldesgravam + $desgravamen;
                                    $totalcuota_desg = $totalcuota_desg + $cuota_desg;
                                    $tabla =$tabla. "<td>" . $i . "</td>";
                                    $tabla =$tabla. "<td>" . $anio . "-" . $mes . "-" . $dia . "</td>";
                                    $tabla =$tabla. "<td>" . $intereses . "</td>";
                                    $tabla =$tabla. "<td>" . $amortizacion . "</td>";
                                    $tabla = $tabla."<td>" . $desgravamen . "</td>";
                                    $tabla = $tabla."<td>" . $cuota_desg . "</td>";
                                    $tabla =$tabla. "<td>" . $capitalpendiente . "</td>";
                                    $tabla =$tabla. "</tr>";
                                }

                                $tabla = $tabla."<tr>";
                                $tabla =$tabla. "<td>TOTALES:</td>";
                                $tabla =$tabla. "<td></td>";
                                $decimal1 = round($totalinteres, 2);
                                $tabla = $tabla."<td>" . $decimal1 . "</td>";
                                $tabla = $tabla."<td>" . $monto . "</td>";
                                $decimal3 = round($totaldesgravam, 2);
                                $tabla = $tabla."<td>" . $decimal3 . "</td>";
                                $decimal2 = round($totalcuota_desg, 2);
                                $tabla = $tabla."<td>" . $decimal2 . "</td>";
                                $tabla = $tabla."<td></td>";
                                $tabla = $tabla."</tr>";
                                $tabla = $tabla."</table>";
                                echo $tabla;
                            }
                        } else {
                            echo "<tr>";
                            echo " <td colspan='7'> No existen creditos </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo " <td colspan='7'> No existen creditos </td>";
                        echo "</tr>";
                    }
                    $conn->close();





                    ?>

                </div>
                <!--derecha-->
                <div class="span7 tablascroll" id="tablaInfo" style="display: block;">

                </div>
                <!--tabla centro -->
                <br><br><br><br><br>
                <div id="pie"></div>
            </div>
        </section>

        <div id="red"></div>


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
                        &copy; 2019 <a target="_blank" href="#" title="">BANQUITO</a>. Todos los derechos reservados
                    </div>
                </div>
            </div>
        </footer>

    </body>

    </html>


<?php
} else {
    header("Location: /examen/public/vista/login.html");
}
?>