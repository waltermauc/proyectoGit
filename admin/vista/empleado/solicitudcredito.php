
    <!DOCTYPE html>
    <html class="no-js">
    
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
                    <?php 

include '../../../config/conexionBD.php';
$codigoempleado = $_GET["codigoempleado"];  ?>

                    <li><a href="index.php">Inicio</a></li>
                        <li><a href="cajera.php?codigoempleado=<?php echo "$codigoempleado";?>">TRANSFERENCIAS</a></li>
                        <li><a href="solicitud.php?codigoempleado=<?php echo "$codigoempleado";?>">Solicitar POLIZ</a></li>
                        <li><a href="../../../config/cerrarSesion.php">Cerrar Sesion</a></li>
                        
      <div>
     
    
    </div>
    
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
            </div>


        </header>
        <!-- /header -->
        <!--Slider-->
        <br>
        <br>
        
        <?php
    include '../../../config/conexionBD.php';
    $sql0 = "SELECT * FROM bv_cliente WHERE cli_persona='$codigoui';";
    $result1 = $conn->query($sql0);
    $row = $result1->fetch_assoc();
    $id = $row["cli_id"];

    $sql6 = "SELECT * FROM bv_cuenta WHERE cli_id='$id';";
    $result2 = $conn->query($sql6);
    $row = $result2->fetch_assoc();
    $cuenta = str_pad($row["cue_ncuenta"], 6, 0, STR_PAD_LEFT);
    $saldo = $row["cue_saldo"];
    echo "<h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USUARIO: ".$nombres."  ".$apellidos."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#Cuenta: ".$cuenta."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saldo actual: ".$saldo." </h1>";
    
    ?>
   <section id="services" style="text-align: center; float: left">
   <form method="POST" enctype="multipart/form-data" action="controladorcargar.php" align="center">
   <div class=" part1">
   <?php
    include '../../../config/conexionBD.php';
    $sqlu = "SELECT * FROM bv_persona WHERE per_id='$codigoui';";
    $resultu = $conn->query($sqlu);
    $row = $resultu->fetch_assoc();
    $sqlu1 = "SELECT count(*) cantidad FROM bv_persona p,bv_cuenta,bv_credito WHERE per_id='$codigoui';";
    $resultu1 = $conn->query($sqlu1);
    $cantidadcredi = $resultu1->fetch_assoc();
    $cantidadc= $cantidadcredi["cantidad"];
    $telefono = $row["per_telefono"];
    $direccion = $row["per_direccion"];
    $cedula = $row["per_cedula"];
    $correo = $row["per_correo"];
    $sexo = $row["per_sexo"];
    $estado = $row["per_estado_civil"];
    $fechan = $row["per_fecha_nac"];
    date_default_timezone_set("America/Guayaquil");
    $fechac =  time();
    $tiempo = strtotime($fechan); 
    $edad = ($fechac-$tiempo)/(60*60*24*365.25);
    $edad = $edad + 1;
    $edad = floor($edad); 
   echo" 
   <label for='cedulae'>Cedula Empleado:</label>
   <input type='text' id='cedulae' name='cedulae' value='$cedula' disabled/><br><br>
   <label for='numerosc'>Numeros de Creditos Actual:</label>
        <input type='text' id='numerosc' name='numerosc' value='$cantidadc' disabled/><br><br>
        <label for='historial'>Historial de Creditos:</label>
        <input type='text' id='historial' name='historial' value='No se tomaron creditos' disabled/><br><br>
        <label for='numerosc'>Tiempo de empleado:</label>
        <select id='tiempo' name='tiempo'>
        <option value='selecione'>SELECIONE</option>
        <option value='menos'>Menos de un año</option>
        <option value='menos'> 1 a menos de 4 años</option>
        <option value='menos'> 4 a menos de 7 años</option>
        <option value='menos'> 7 o mas años</option>
    </select>";
    
                    echo "    <label for='telefono'>Telefono:</label>
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
                        <input type='text' id='edad' name='edad' value='$edad' disabled/>";
        ?>
    </div>
    <br>
    <div>
                    <h3>Vivienda :</h3>
                    <select id="vivienda" name="vivienda" >
                        <option value="selecione">SELECIONE</option>
                        <option value="A151">GRATIS</option>
                        <option value="A152">ALQUILER</option>
                        <option value="A153">PROPIO</option>
                    </select>
    </div>
    <br>
    <div>
                    <h3>Trabajador Extranjero :</h3>
                    <select id="textranjero" name="textranjero" >
                        <option value="selecione">SELECIONE</option>
                        <option value="A201">SI</option>
                        <option value="A202">NO</option>
                    </select>
    </div>
   </section>
   <section id="services" style="text-align: center; float: center">
   
   <div>
                    <h3>Empleado :</h3>
                    <select id="trabajo" name="trabajo" >
                        <option value="selecione">SELECIONE</option>
                        <option value="A171">DESEEMBLEADO</option>
                        <option value="A172">JUBILADO</option>
                        <option value="A173">EMPLEADO</option>
                        <option value="A174">AUTONOMO</option>
                    </select>
    </div>
    <br>
    <div>
    
                    <h3>Activos :</h3>
                    <select id="activos" name="activos" >
                        <option value="selecione">SELECIONE</option>
                        <option value="A121">Bienes inmuebles</option>
                        <option value="A122">Seguro de vida y plan de construccion</option>
                        <option value="A123">Automovil</option>
                        <option value="A124">Sin propiedad</option>
                    </select>
    </div>
    <br>
   
    <div>
    <h3><label for="cedulag">Valor de la Casa:</label></h3>
        <input type="text" id="valor" name="valor" value=""  pattern="[0-9]{3,6}" title="Monto mínimo: 100. Tamaño máximo: 100000" style="border-color:#C9D0CC" required=""/>
    <br>
    <br>
        <h3><label for="mcredito">Monto de Credito:</label></h3>
        <input type="text" id="mcredito" name="mcredito" value="" pattern="[0-9]{3,6}" title="Monto mínimo: 100. Tamaño máximo: 100000" style="border-color:#C9D0CC" required="" />
        
    </div>
    <br>
    <div>
                    <h3>Proposito Credito :</h3>
                    <select id="pcredito" name="pcredito" >
                        <option value="selecione">SELECIONE</option>
                        <option value="A40">INMUEBLES</option>
                        <option value="A41">AUTOMOVIL</option>
                        <option value="A42">MUEBLES</option>
                        <option value="A43">TECNOLOGIA</option>
                        <option value="A44">ELECTRODOMESTICOS</option>
                        <option value="A45">REPARACIONES</option>
                        <option value="A46">EDUCACION</option>
                        <option value="A47">VACACIOINES</option>
                        <option value="A48">CAPACITACION</option>
                        <option value="A49">NEGOCIOS</option>
                        <option value="A410">OTROS</option>
                    </select>
    </div>
    <br>
    <div>
                    <h3>Tipo de credito :</h3>
                    <select id="tcredito" name="tcredito" >
                        <option value="selecione">SELECIONE</option>
                        <option value="consumo">Credito de Consumo</option>
                        <option value="microempresa">Credito Microempresa</option>
                        <option value="inmobiliario">Credito Inmobiliario</option>
                        <option value="comercial">Credito Comercial</option>
                    </select>
    </div>
    <br>
    <div>
                    <h3>Tipo de amortizacion:</h3>
                    <select id="amortizacion" name="amortizacion" >
                        <option value="selecione">SELECIONE</option>
                        <option value="alemana">ALEMANA</option>
                        <option value="francesa">FRANCESA</option>
                    </select>
    </div>
    <br>
    <div>
                    <h3>Meses :</h3>
                    <select id="meses" name="meses" >
                        <option value="selecione">SELECIONE</option>
                        <option value="06">06</option>
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="30">30</option>
                        <option value="36">36</option>
                        <option value="42">42</option>
                        <option value="48">48</option>
                        <option value="54">54</option>
                        <option value="60">60</option>
                        <option value="66">66</option>
                        <option value="72">72</option>
                        <option value="78">78</option>
                        <option value="84">84</option>
                        <option value="90">90</option>
                        <option value="96">96</option>
                        <option value="102">102</option>
                        <option value="108">108</option>
                        <option value="114">114</option>
                        <option value="120">120</option>
                        <option value="126">126</option>
                        <option value="132">132</option>
                        <option value="138">138</option>
                        <option value="144">144</option>
                        <option value="150">150</option>
                        <option value="156">156</option>
                        <option value="162">162</option>
                        <option value="168">168</option>
                        <option value="174">174</option>
                        <option value="180">180</option>
                        
                        
                    </select>
    </div>
    <br>
    <div>
                <label for="ced">Subir Cedula</label>
                <input id="guardarcedula" name="guardarcedula" type="file" value="Subir Cedula">&nbsp;
            </div>
            <br>
            <div>
                <label for="pla">Subir Planilla</label>
                <input id="guardarplanilla" name="guardarplanilla" type="file" value="Subir Planilla">&nbsp;
            </div>
            <br>
            <div>
                <label for="rol">Subir Rol</label>
                <input id="guardarrol" name="guardarrol" type="file" value="Subir Rol de Pagos">&nbsp;
            </div>
    <br>
    <div>
                    <h3>GARANTE :</h3>
                    <select id="garante" name="garante" onchange="activarcg()">
                        <option value="selecione">SELECIONE</option>
                        <option value="A101">Ninguno</option>
                        <option value="A102">Co-Aplicante</option>
                        <option value="A103">garante</option>
                    </select>
    </div>
    <br>
    <script>
        
 function activarcg(){
    var d1 = document.getElementById("garante");
    var distext = d1.options[d1.selectedIndex].value;

    if (distext == "A102" || distext == "A103") { 
    document.getElementById("cedulagd").style.visibility='visible';   
    }else{    
    document.getElementById("cedulagd").style.visibility='hidden'; 
    }

}


</script>

<script>
function buscarUsuariocg(){
    var cedu = document.getElementById("cedulag").value;
    var cedue = document.getElementById("cedulae").value;
    if (cedu == cedue){
        alert('No se puede asaginar la misma cuenta como garante');
        document.getElementById("cedulag").value="";
        document.getElementById("informacioncg").innerHTML = "";
    } else  {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");
            document.getElementById("informacioncg").innerHTML = this.responseText;
        }};
    xmlhttp.open("GET","buscarg.php?ceduel="+cedu,true);
    xmlhttp.send();
    }
    return false;
    
}
</script>

<script>
function limpiarUsuario(){
    document.getElementById("cedulag").value=''; 
    document.getElementById("informacioncg").style.visibility='hidden'; 
}

function EnviarCredito(){
    var id = document.getElementById("des").value;
    var creditosactuales = document.getElementById("des").value;
    var historialc = document.getElementById("des").value;
    var tiemple = document.getElementById("des").value;
    var  = document.getElementById("des").value;
    var des = document.getElementById("des").value;
    var des = document.getElementById("des").value;
    var des = document.getElementById("des").value;
    var des = document.getElementById("des").value;
    var des = document.getElementById("des").value;
    var des = document.getElementById("des").value;
    var des = document.getElementById("des").value;
    var des = document.getElementById("des").value;

    if (des == "") {
        if (loc == "/examen/admin/vista/user/mensajesen.php") {
            location.href = "mensajesen.php";
        } else if (loc == "/examen/admin/vista/user/index.php") {
            location.href = "index.php";
        }
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 & this.status == 200) {
                //alert("llegue");
                document.getElementById("tbl").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../../controladores/user/buscar.php?des=" + des + "&url=" + loc, true);
        xmlhttp.send();
    }
    return false;


}

</script>

    <br>
    <div  id="cedulagd" for="cedulagd" style="visibility: hidden">
               
                    <div class=" parte1">
                        <label   >Ingrese la Cedula</label>
                        <br>
                        <input   type="text" id="cedulag" name="cedulag" value="" />
                        <br>
                        <input type="button"  value="Buscar Usuario" onclick="return buscarUsuariocg()" />
                        <br>
                        <div id="informacioncg"></div>
                        
                        <br>
                    </div>
        </div>
<br>
<br>
<br>
<input class="btn" id="guardar" name="guardar" type="submit" value="Enviar Solicitud">&nbsp;
            <br>
</form>
</section>

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
