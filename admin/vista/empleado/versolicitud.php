<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>BANQUITO | Cajero</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/bootstrap-responsive.min.css">
    <!--link rel="stylesheet" href="../../../css/font-awesome.min.css"-->
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/sl-slide.css">
    <link rel="stylesheet" href="../../../css/img-efect.css">
    <link rel="stylesheet" href="../../../css/accordion.css">
    <link rel="stylesheet" href="../../../css/social.css">
    <link rel="stylesheet" href="../../../css/social.css">
    <script type="text/javascript" src="../../../js/validar.js"></script>
    <script src="../../../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../../images/ico/icon.png">
    <script src="../../../js/jquery-3.2.1.min.js"></script>
    <!--carousel-->
    <script src="../../../js/jssor.slider-26.1.5.min.js" type="text/javascript"></script>
    <script src="../../../js/funciones.js" type="text/javascript"></script>
    <!--script type="text/javascript" src="../../js/objetoAjax.js"></script-->
    <script type="text/javascript" src="../admin/js/cajera.js"></script>
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

        td {
            color: white;
        }

        .ocultar {
            visibility: hidden;
        }
    </style>
</head>

<body oncontextmenu="return false" style="background-color: #fff">
    <!--script>

    </script-->
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

                        <li class="active"><a href="indexjc.php">Inicio</a></li>
                        <li class="active"><a href="pastel.php">Grafica</a></li>
                        <li><a href="../../../config/cerrarSesion.php">Cerrar Sesion</a></li>

                        <div>


                        </div>

                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>

    </header>
    <br>
    <br>
    <br>
    <div>

        <br>
        <br>
        <section id="services" style="text-align: center">
            <div class="container" style="text-align: justify">
                <div class="center gap">
                    <?php

                    include '../../../config/conexionBD.php';
                    $codigocred = $_GET["codigocre"];
                    $codigocl = $_GET["codigocli"];
                    $sqlu = "SELECT * FROM bv_persona p, bv_cuenta c, bv_cliente cc, bv_credito cr where p.per_id = cc.cli_persona and c.cli_id = cc.cli_id and c.cli_id =$codigocl and cr.cred_id = $codigocred  and p.per_rol='usuario'";
                    $resultu = $conn->query($sqlu);
                    $row = $resultu->fetch_assoc();
                    if ($resultu->num_rows > 0) {
                        $codigocli = $row["cli_id"];
                        $sqlu1 = "SELECT count(*) cantidad FROM bv_persona pp, bv_cuenta cc, bv_cliente cli, bv_credito cr where pp.per_id = cli.cli_persona and cc.cli_id = cli.cli_id and  cr.cred_id=$codigocli and pp.per_rol='usuario'";
                        $resultu1 = $conn->query($sqlu1);
                        $cantidadcredi = $resultu1->fetch_assoc();

                        $cantidadc = $cantidadcredi["cantidad"];
                        $tiempoemp = $row["cred_tiempoem"];
                        $tiempoe = "";
                        if ($tiempoemp == "A71") {
                            $tiempoe = "Desempleado";
                        } else if ($tiempoemp == "A72") {
                            $tiempoe = "Menos de un año";
                        } else if ($tiempoemp == "A73") {
                            $tiempoe = " > 1 a menos de 4 años";
                        } else if ($tiempoemp == "A74") {
                            $tiempoe = "> 4 a menos de 7 años";
                        } else if ($tiempoemp == "A75") {
                            $tiempoe = "> 7 o mas años";
                        }
                        $telefono = $row["per_telefono"];
                        $direccion = $row["per_direccion"];
                        $cedula = $row["per_cedula"];
                        $correo = $row["per_correo"];
                        $sexo = $row["per_sexo"];
                        $estado = $row["per_estado_civil"];
                        $fechan = $row["per_fecha_nac"];
                        $saldo = $row["cue_saldo"];
                        $empcodigo = $row["cli_id"];
                        date_default_timezone_set("America/Guayaquil");
                        $fechac =  time();
                        $tiempo = strtotime($fechan);
                        $edad = ($fechac - $tiempo) / (60 * 60 * 24 * 365.25);
                        $edad = $edad + 1;
                        $edad = floor($edad);

                        $historial = $row["cred_historial"];
                        $histoe = "";
                        if ($historial == "A30") {
                            $histoe = "no se tomaron creditos";
                        } else if ($historial == "A31") {
                            $histoe = "todos los creditos en este banco se pagaron debidamente";
                        } else if ($historial == "A32") {
                            $histoe = "creditos existentes devueltos debidamente hasta ahora";
                        } else if ($historial == "A33") {
                            $histoe = "retraso en pagar en el pasado";
                        } else if ($historial == "A34") {
                            $histoe = "cuenta critica / otros creitos existentes (no en este banco)";
                        }
                        $viviendav = $row["cred_vivienda"];
                        $vivi = "";
                        if ($viviendav == "A151") {
                            $vivi = "GRATIS";
                        } else if ($viviendav == "A152") {
                            $vivi = "ALQUILER";
                        } else if ($viviendav == "A153") {
                            $vivi = "PROPIO";
                        }
                        $trabajo = $row["cred_trabajoe"];
                        $trabajoe = "";
                        if ($trabajo == "A201") {
                            $trabajoe = "SI";
                        } else if ($trabajo == "A202") {
                            $trabajoe = "NO";
                        }
                        $empleo = $row["cred_empleo"];
                        $empleoe = "";
                        if ($empleo == "A171") {
                            $empleoe = "DESEEMBLEADO";
                        } else if ($empleo == "A172") {
                            $empleoe = "JUBILADO";
                        } else if ($empleo == "A173") {
                            $empleoe = "EMPLEADO";
                        } else if ($empleo == "A174") {
                            $empleoe = "AUTONOMO";
                        }

                        $activo = $row["cred_activos"];
                        $activoe = "";
                        if ($activo == "A121") {
                            $activoe = "Bienes inmuebles";
                        } else if ($activo == "A122") {
                            $activoe = "Seguro de vida y plan de construccion";
                        } else if ($activo == "A123") {
                            $activoe = "Automovil";
                        } else if ($activo == "A124") {
                            $activoe = "Sin propiedad";
                        }
                        $evavivi = $row["cred_evacasa"];
                        $monto = $row["cred_monto"];


                        $proposito = $row["cred_proposito"];
                        $propositoe = "";
                        if ($proposito == "A40") {
                            $propositoe = "INMUEBLES";
                        } else if ($proposito == "A41") {
                            $propositoe = "AUTOMOVIL";
                        } else if ($proposito == "A42") {
                            $propositoe = "MUEBLES";
                        } else if ($proposito == "A43") {
                            $propositoe = "TECNOLOGIA";
                        } else if ($proposito == "A44") {
                            $propositoe = "ELECTRODOMESTICOS";
                        } else if ($proposito == "A45") {
                            $propositoe = "REPARACIONES";
                        } else if ($proposito == "A46") {
                            $propositoe = "EDUCACION";
                        } else if ($proposito == "A47") {
                            $propositoe = "VACACIOINES";
                        } else if ($proposito == "A48") {
                            $propositoe = "CAPACITACION";
                        } else if ($proposito == "A49") {
                            $propositoe = "NEGOCIOS";
                        } else if ($proposito == "A410") {
                            $propositoe = "OTROS";
                        }
                        $tasa = $row["cred_tasa"];
                        $tamort = $row["cred_tipoa"];
                        $meses = $row["cred_meses"];
                        $garante = $row["cred_garantia"];
                        $correo = $row["per_correo"];
                        $garanteo = "";
                        if ($garante == "A101") {
                            $garanteo = "Ninguno";
                        } else if ($garante == "A102") {
                            $garanteo = "Co-Aplicante";
                        } else if ($garante == "A103") {
                            $garanteo = "garante";
                        }
                        echo " 
       <div id='part1' class='parte1'>
       <label for='cedulae'>Cedula Empleado:</label>
       <input type='text' id='cedulae' name='cedulae' value='$cedula' disabled/><br><br>
       <label for='numerosc'>Numeros de Creditos Actual:</label>
            <input type='text' id='numerosc' name='numerosc' value='$cantidadc' disabled/><br><br>
            <label for='historial'>Historial de Creditos:</label>
            <input type='text' id='historial' name='historial' value='$histoe'disabled/><br><br>
            <label for='numerosc'>Tiempo de empleado:</label>
            <input type='text' id='tiempo' name='tiempo' value='$tiempoe'disabled/><br><br>
            
            <br>
        <label for='empcodigo'>Codigo Empleado:</label>
            <input type='text' id='empcodigo' name='empcodigo' value='$empcodigo' disabled '/>
            <br>
        ";

                        echo "
                       
                        <br>
                        <label for='telefono'>Telefono:</label>
                            <input type='text' id='telefono' name='telefono' value='$telefono' disabled/>
                            <br>
                            <br>
                            <label for='direccion'>Direccion:</label>
                            <input type='tex' id='direccion' name='direccion' value='$direccion' disabled/>
                            <br>
                            <br>
                            <label for='correo'>Correo:</label>
                            <input type='text' id='correo' name='correo' value='$correo' disabled/>
                            <br>
                            <br>
                            <label for='sexo'>Sexo</label>
                            <input type='text' id='sexo' name='sexo' value='$sexo' disabled/>
                            <br>
                            <br>
                            <label for='estado'>Estado civil:</label>
                            <input type='text' id='estado' name='estado' value='$estado' disabled/>;
                            <br>
                            <br>
                            <label for='fechan'>Fecha Nacimiento:</label>
                            <input type='text' id='fechan' name='fechan' value='$fechan' disabled/>
                            <br>
                            <br>
                            <label for='edad'>Edad:</label>
                            <input type='text' id='edad' name='edad' value='$edad' disabled/>
                            <br>
                            <br>
                            <label for='saldoc'>Saldo Cuenta:</label>
                            <input type='text' id='saldoc' name='saldoc' value='$saldo' disabled/>
                            </div>
                            <div>
                    <h3>Vivienda :</h3>
                    
                    <input type='text' id='vivienda' name='vivienda' value='$vivi' disabled/>
    </div>
    <br>
    <div>
                    <h3>Trabajador Extranjero :</h3>
                    <input type='text'  value='$trabajoe' disabled/>
    </div>
    <div>
                    <h3>Empleado :</h3>
                    <input type='text'  value='$empleoe' disabled/>

                   
    </div>
    <div>
    
                    <h3>Activos :</h3>
                    <input type='text'  value='$activoe' disabled/>
                   
    </div><br>
    <div>
    <h3><label >Valor de la Casa:</label></h3>
        <input type='text' value='$evavivi' disabled/>
    <br>
    <br>
        <h3><label >Monto de Credito:</label></h3>
        <input type='text' value='$monto' disabled/>
        
    </div>
    <div>
                    <h3>Proposito Credito :</h3>
                    
                    <input type='text' value='$propositoe' disabled/>
                    </div>
                    <div>
                    <h3>Tasa :</h3>
                    <input type='text' value='$tasa' disabled/>
    </div>
    <div>
                    <h3>Tipo de amortizacion:</h3>
                    <input type='text' value='$tamort' disabled/>
    </div>
    <div>
                    <h3>Meses:</h3>
                    <input type='text' value='$meses' disabled/>
    </div> 
    <div>
                    <h3>GARANTE :</h3>
                    <input type='text' value='$garanteo' disabled/>
                    <br>
                    <br>
                    
    </div>
          ";
                    }
                    ?>

                    <div id="part2" class="parte2" style="visibility:hidden">
                        <div class=" par">
                        </div>
                        <br>
                        <br>
                        <script>
                            function activarcg() {
                                var d1 = document.getElementById("garante");
                                var distext = d1.options[d1.selectedIndex].value;
                                if (distext == "A102" || distext == "A103") {
                                    document.getElementById("cedulagd").style.visibility = 'visible';
                                } else {
                                    document.getElementById("cedulagd").style.visibility = 'hidden';
                                }
                            }
                        </script>
                        <script>
                            function aprobar() {
                                var codigoclie = document.getElementById("empcodigo").value;
                                if (window.XMLHttpRequest) {
                                    xmlhttp = new XMLHttpRequest();
                                } else {
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        alert("Se Actualizo correctamente");
                                    }
                                };
                                xmlhttp.open("GET", "actualizar.php?codigoc=" + codigoclie, true);
                                xmlhttp.send();

                                alert("Se Aprobo el credito");
                                return false;
                            }

                            function negar() {
                                alert("Se Nego el credito");
                                return flase;
                            }

                            //negar

                            function negar() {
                                var codigoclie = document.getElementById("empcodigo").value;
                                if (window.XMLHttpRequest) {
                                    xmlhttp = new XMLHttpRequest();
                                } else {
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        alert("Se Actualizo correctamente");
                                    }
                                };
                                xmlhttp.open("GET", "negar.php?codigoc=" + codigoclie, true);
                                xmlhttp.send();

                                alert("Se Nego el credito");
                                return false;
                            }

                            function negar() {
                                alert("Se Nego el credito");
                                return flase;
                            }

                            function buscarUsuariocg() {
                                var cedu = document.getElementById("cedulag").value;
                                var cedue = document.getElementById("cedulae").value;
                                if (cedu == cedue) {
                                    alert('No se puede asaginar la misma cuenta como garante');
                                    document.getElementById("cedulag").value = "";
                                    document.getElementById("informacioncg").innerHTML = "";
                                } else {
                                    if (window.XMLHttpRequest) {
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            //alert("llegue");
                                            document.getElementById("informacioncg").innerHTML = this.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET", "buscarg.php?ceduel=" + cedu, true);
                                    xmlhttp.send();
                                }
                                return false;

                            }
                        </script>
                        <script>
                            function limpiarUsuario() {
                                document.getElementById("cedulag").value = '';
                                document.getElementById("informacioncg").style.visibility = 'hidden';
                            }

                            function EnviarCredito() {

                                //2
                                var ps = document.getElementById("meses");
                                var plazomeses = ps.options[ps.selectedIndex].value;

                                //3
                                var historialc = document.getElementById("historial").value;
                                var historialci = "";
                                if (historialc == 'no se tomaron creditos') {
                                    historialci = "A30";
                                } else if (historialc == 'todos los creditos en este banco se pagaron debidamente') {
                                    historialci = "A31";
                                } else if (historialc == 'creditos existentes devueltos debidamente hasta ahora') {
                                    historialci = "A32";
                                } else if (historialc == 'retraso en pagar en el pasado') {
                                    historialci = "A33";
                                } else if (historialc == 'cuenta critica / otros creitos existentes (no en este banco)') {
                                    historialci = "A34";
                                }
                                //4
                                var pc = document.getElementById("pcredito");
                                var propositoc = pc.options[pc.selectedIndex].value;
                                //5
                                var montoc = document.getElementById("mcredito").value;

                                //6
                                var saldocu = document.getElementById("saldoc").value
                                var saldocui = "";
                                if (saldocu >= 0 && saldocu < 500) {
                                    saldocui = "A61";
                                } else if (500 <= saldocu && saldocu < 1000) {
                                    saldocui = "A62";
                                } else if (1000 <= saldocu && saldocu < 1500) {
                                    saldocui = "A63";
                                } else if (saldocu > 1500) {
                                    saldocui = "A64";
                                } else {
                                    saldocui = "A65";
                                }


                                //7
                                var tm = document.getElementById("tiempo");
                                var tiempoem = tm.options[tm.selectedIndex].value;
                                //8
                                var tp = document.getElementById("tcredito");
                                var tasap = tp.options[tp.selectedIndex].value;

                                //9
                                var estadoci = document.getElementById("estado").value;
                                var sexo = document.getElementById("sexo").value;
                                var estadociv = "";
                                if (sexo == "MASCULINO") {
                                    if (estadoci == "DIVORCIADO/A" || estadoci == "SEPARADO/A") {
                                        estadociv = "A91";
                                    } else if (estadoci == "SOLTERO/A") {
                                        estadociv = "A93";
                                    } else if (estadoci == "CASADO/A" || estadoci == "VIUDO/A") {
                                        estadociv = "A94";
                                    }
                                } else if (sexo == "FEMENINO") {
                                    if (estadoci == "DIVORCIADO/A" || estadoci == "SEPARADO/A" || estadoci == "CASADO/A") {
                                        estadociv = "A92";
                                    } else if (estadoci == "SOLTERO/A") {
                                        estadociv = "A95";
                                    }
                                }

                                //10
                                var gt = document.getElementById("garante");
                                var tgarante = gt.options[gt.selectedIndex].value;
                                //11
                                var evaluvi = document.getElementById("valor").value;
                                //12
                                var ac = document.getElementById("activos");
                                var activos = ac.options[ac.selectedIndex].value;

                                //13  

                                var edad = document.getElementById("edad").value;
                                //14

                                var vd = document.getElementById("vivienda");
                                var vivienda = vd.options[vd.selectedIndex].value;
                                //15

                                var cantidacr = document.getElementById("numerosc").value;
                                //16

                                var em = document.getElementById("trabajo");
                                var empleo = em.options[em.selectedIndex].value;
                                //17

                                var emx = document.getElementById("textranjero");
                                var empleox = emx.options[emx.selectedIndex].value;

                                //////18
                                var am = document.getElementById("amortizacion");
                                var amortizaciont = am.options[am.selectedIndex].value;
                                //////19

                                var codigoemp = document.getElementById("cedulaem").value;
                                //20
                                var codigocli = document.getElementById("empcodigo").value;
                                //21
                                var codigogarr = document.getElementById("codigogar").value;

                                if (window.XMLHttpRequest) {
                                    xmlhttp = new XMLHttpRequest();
                                } else {
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        alert("SE HA CREADO EL CREDITO");
                                        //document.getElementById("informa").innerHTML = this.responseText;
                                    }
                                };
                                xmlhttp.open("GET", "GuardarCredito.php?pmeses=" + plazomeses + "&hcredito=" + historialci + "&pcredito=" + propositoc + "&cmonto=" + montoc + "&csaldo=" + saldocui + "&templeado=" + tiempoem + "&ttasa=" + tasap + "&estadoci=" + estadociv + "&garant=" + tgarante + "&evaluov=" + evaluvi + "&activ=" + activos + "&cedad=" + edad + "&viviendac=" + vivienda + "&cantidacre=" + cantidacr + "&cempleo=" + empleo + "&cempleox=" + empleox + "&tamortizacion=" + amortizaciont + "&codigoem=" + codigoemp + "&codigoclie=" + codigocli + "&codigogara=" + codigogarr, true);
                                xmlhttp.send();
                                document.getElementById("part1").style.visibility = 'hidden';
                                document.getElementById("part2").style.visibility = 'hidden';
                                document.getElementById("part3").style.visibility = 'hidden';
                                document.getElementById("cedulagd").style.visibility = 'hidden';
                                document.getElementById("cedula").value = "";

                                return false;
                            }
                        </script>

                        <br>
                        <div id="cedulagd" class="cedulagd" for="cedulagd" style="visibility: hidden">

                            <div id="part1" class=" part1">
                                <label>Ingrese la Cedula</label>
                                <br>
                                <input type="text" id="cedulag" name="cedulag" value="" />
                                <br>
                                <input type="button" value="Buscar Usuario" onclick="return buscarUsuariocg()" />
                                <br>
                                <div id="informacioncg"></div>

                                <br>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div id="informa"></div>


                        <input type="button" value="Enviar Solicitud" onclick="return EnviarCredito()" />
                        <br>
        </section>

    </div>
    </form>
    </div>
    </div>

    </section>
    <br>
    <br>
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
                    &copy; 2019 <a target="_blank" href="#" title="Free Twitter Bootstrap WordPress Themes and HTML templates">BANQUITO</a>. Todos los
                    derechos reservados
                </div>
            </div>
        </div>
    </footer>
    <!--/Footer-->
    <style>
        input:invalid {
            border-color: red;
        }

        input,
        input:valid {
            border-color: #444;
        }
    </style>



    <style>
        /* jssor slider loading skin spin css */

        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
</body>

</html>