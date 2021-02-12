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
        fbq('track', 'PaginaPrincipal');
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
                <?php 

include '../../../config/conexionBD.php';
$codigoempleado = $_GET["codigoempleado"];
//$conn->close();
?>
  
                <a id="logo" class="pull-left" href="index.html"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li class="active"><a href="cajera.php?codigoempleado=<?php echo "$codigoempleado";?>">TRANSFERENCIAS</a></li>     
                        <li><a href="../../../config/cerrarSesion.php">Cerrar Sesion</a></li>
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
    <?php 

        include '../../../config/conexionBD.php';
        $codigoempleado = $_GET["codigoempleado"]; 
        $sqlu = "SELECT p.per_nombre nombre,  p.per_apellido apellido,  e.emp_cargo cargo  FROM bv_persona p, bv_empleado e where p.per_id = e.emp_persona and  emp_id=$codigoempleado;";
        $resultu = $conn->query($sqlu);
        $row = $resultu->fetch_assoc();
        $nombres = $row["nombre"];
         $apellidos = $row["apellido"];
         $rol = $row["cargo"];
         echo "<h1>".$rol. ": " . $nombres . " " . $apellidos."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Codigo: " . $codigoempleado."</h1>";
       
        //$conn->close();
      ?></div>
    <br>
    <br>
    
    <section id="services" style="text-align: center">
        <div class="container" style="text-align: justify">
            <div class="center gap">
                <form id="formulario01"  enctype="multipart/form-data"
                action='../../controladores/empleado/bd_cajera.php' method="GET" >
                    <div class=" parte1">
                        <label for="cedula">Cedula</label>
                        <input type="text" id="cedula" name="cedula" value="" />
                        
                        <input type="hidden" id="codigoempleado" name="codigoempleado" value="<?php echo $codigoempleado;?>"/>
                        <span id="mensajeCedula" class="error"> </span>
                        <br>
                        <input type="button" id="buscar" name="buscar" value="Buscar Usuario"
                            onclick="return buscarUsuario()" />   
                        <br>
                        <div id="informacion"></div>
                        <script>

        function validart(){
            var mont = document.getElementById('total').value;
            var montra = document.getElementById('ValorRetiro').value;
            if(montra > mont){
                alert('No se puede realisar esta transaccion');
                document.getElementById("ValorRetiro").value=""; 
            }
            return false;
        }
       </script>
                        <a href='index.php'><input type='button' value='Volver'></a>
                        <input type="button" value="Retiro" onclick="return retiro()" />
                        <input type="button" value="Deposito" onclick="return deposito()" />
                        <div id="opcion" class="error"></div>

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
                    &copy; 2019 <a target="_blank" href="#"
                        title="Free Twitter Bootstrap WordPress Themes and HTML templates">BANQUITO</a>. Todos los
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