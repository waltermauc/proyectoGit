<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <script type="text/javascript" src="./validar.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/social.css">
    <script>
        $(document).ready(function() {
            //===========FUNCION PARA PONER EL PIE DE PAGINA=============//
            $("#pie").after('<!--Bottom--><section id="bottom" class="main"><!--Container--><div class="container"><!--row-fluids--><div class="row-fluid"><!--Contact Form--><div class="span7"><h4>UBIQUENOS</h4><ul class="unstyled address"><li><i class="icon-home"></i><strong>Dirección:</strong> Mariscal Sucre 3-38 y Daniel Muñoz<br></li><li><i class="icon-envelope"></i><strong>Email: </strong> info@cbcooperativa.fin.ec</li><li><i class="icon-phone"></i><strong>Teléfono:</strong> 072230836</li></ul></div><!--End Contact Form--><!--Important Links--><div id="tweets" class="span5"><h4>&nbsp;NOSOTROS</h4><div class="span3"><ul class="arrow"><li><a href="reconocimientos.php">Información</a></li><li><a href="sucursales.php">Contactos</a></li><li><a href="mensual.php">Transparencia</a></li></ul></div><div class="span6"><ul class="arrow"><li><a href="creditos.php#pricing-table">Productos y Servicios</a></li><li><a href="solitudCredito.php">Solicite su Crédito</a></li></ul></div></div><!--Important Links--></div><!--/row-fluid--></div><!--/container--></section><!--/bottom--><!--Footer--><footer id="footer"><div class="container"><div class="row-fluid"><div class="span5 cp">&copy; 2017 <a target="_blank" href="#" title="Free Twitter Bootstrap WordPress Themes and HTML templates">CB COOPERATIVA </a>. All Rights Reserved.</div><!--/Copyright--><div class="span6"><ul class="social pull-right"><li><a href="#"><i class="icon-facebook"></i></a></li><li><a href="#"><i class="icon-twitter"></i></a></li><li><a href="#"><i class="icon-youtube"></i></a></li><li><a href="#"><i class="icon-instagram"></i></a></li></ul></div><div class="span1"><a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a></div><!--/Goto Top--></div></div></footer><!--/Footer-->');
        });
    </script>




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
                        <li class="active"><a href="index.html">Inicio</a></li>
                        <li><a href="calCredito.php">Calcule su Crédito</a></li>
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

    <title>SD | Calcule su Crédito</title>


    <script type="text/javascript">
        function activarBoton() {
            var boton2 = document.getElementById("calcular");
            var boton3 = document.getElementById("imprimir");
            boton2.disabled = true;
            boton3.disabled = false;
            var monto = Number(document.getElementById("monto").value);
            var interes = Number(document.getElementById("interes").value);
            var plazo = Number(document.getElementById("plazo").value);
            var tipo = document.getElementById("tipo").value;
            var f = new Date();
            var dia = Number(f.getDate());
            var mes = (Number(f.getMonth())) + 1;
            var anio = Number(f.getFullYear());
            var tabla = "<table border=\"0\">";
            tabla += "<tr> <th>Num.Cuota</th><th>Fecha</th><th>Interes</th><th>Abono Capital</th><th>Desgravamen</th><th>Cuota</th><th>Saldo Capital</th></tr>";

            if (tipo == 'frances') {

                intRate = (interes / 100) / 12;
                var totalcapital = 0;
                var totalinteres = 0;
                var totalcapint = 0;
                var totalsaldocap = 0;
                var totaldesgravam = 0;
                var totalcuota_desg = 0;
                cuota = Math.floor((monto * intRate) / (1 - Math.pow(1 + intRate, (-1 * plazo))) * 100) / 100;
                capitalpendiente = monto;

                for (i = 1; i <= plazo; i++) {
                    if (mes == 12) {
                        anio = anio + 1;
                        mes = 1;
                    } else {
                        mes = mes + 1;
                    }

                    tabla += "<tr>";
                    intereses = Math.round(capitalpendiente * intRate * 100) / 100;
                    amortizacion = Math.round((cuota - intereses) * 100) / 100;
                    capitalpendiente = Math.round((capitalpendiente - amortizacion) * 100) / 100;
                    desgravamen = Math.round((capitalpendiente * 0.00057) * 100) / 100;
                    cuota_desg = Math.round((cuota + desgravamen) * 100) / 100;
                    totalcapital = totalcapital + amortizacion;
                    totalinteres = totalinteres + intereses;
                    totalcapint = totalcapint + cuota;
                    totalsaldocap = totalsaldocap + capitalpendiente;
                    totaldesgravam = totaldesgravam + desgravamen;
                    totalcuota_desg = totalcuota_desg + cuota_desg;
                    tabla += "<td>" + i + "</td>";
                    tabla += "<td>" + anio + "-" + mes + "-" + dia + "</td>";
                    tabla += "<td>" + intereses + "</td>";
                    tabla += "<td>" + amortizacion + "</td>";
                    tabla += "<td>" + desgravamen + "</td>";
                    tabla += "<td>" + cuota_desg + "</td>";
                    tabla += "<td>" + capitalpendiente + "</td>";
                    tabla += "</tr>";

                }

                tabla += "<tr>";
                tabla += "<td>TOTALES:</td>";
                tabla += "<td></td>";
                decimal1 = totalinteres.toFixed(2);
                tabla += "<td>" + decimal1 + "</td>";
                tabla += "<td>" + monto + "</td>";
                decimal3 = totaldesgravam.toFixed(2);
                tabla += "<td>" + decimal3 + "</td>";
                decimal2 = totalcuota_desg.toFixed(2);
                tabla += "<td>" + decimal2 + "</td>";
                tabla += "<td></td>";
                tabla += "</tr>";
                tabla += "</table>";
                document.getElementById("pie").innerHTML = tabla;

            } else if (tipo == 'aleman') {

                intRate = (interes / 100);
                var totalcapital = 0;
                var totalinteres = 0;
                var totalcapint = 0;
                var totalsaldocap = 0;
                var totaldesgravam = 0;
                var totalcuota_desg = 0;
                capitalpendiente = monto;
                for (i = 1; i <= plazo; i++) {

                    if (mes == 12) {
                        anio = anio + 1;
                        mes = 1;
                    } else {
                        mes = mes + 1;
                    }
                    tabla += "<tr>";
                    intereses = Math.round((((capitalpendiente * intRate) * 30) / 360) * 100) / 100;
                    amortizacion = Math.floor((monto / plazo) * 100) / 100;
                    capitalpendiente = Math.round((capitalpendiente - amortizacion) * 100) / 100;
                    cuota = Math.floor((amortizacion + intereses) * 100) / 100;
                    desgravamen = Math.round((capitalpendiente * 0.00046) * 100) / 100;
                    cuota_desg = Math.round((cuota + desgravamen) * 100) / 100;
                    totalcapital = totalcapital + amortizacion;
                    totalinteres = totalinteres + intereses;
                    totalcapint = totalcapint + cuota;
                    totalsaldocap = totalsaldocap + capitalpendiente;
                    totaldesgravam = totaldesgravam + desgravamen;
                    totalcuota_desg = totalcuota_desg + cuota_desg;
                    tabla += "<td>" + i + "</td>";
                    tabla += "<td>" + anio + "-" + mes + "-" + dia + "</td>";
                    tabla += "<td>" + intereses + "</td>";
                    tabla += "<td>" + amortizacion + "</td>";
                    tabla += "<td>" + desgravamen + "</td>";
                    tabla += "<td>" + cuota_desg + "</td>";
                    tabla += "<td>" + capitalpendiente + "</td>";
                    tabla += "</tr>";
                }

                tabla += "<tr>";
                tabla += "<td>TOTALES:</td>";
                tabla += "<td></td>";
                decimal1 = totalinteres.toFixed(2);
                tabla += "<td>" + decimal1 + "</td>";
                tabla += "<td>" + monto + "</td>";
                decimal3 = totaldesgravam.toFixed(2);
                tabla += "<td>" + decimal3 + "</td>";
                decimal2 = totalcuota_desg.toFixed(2);
                tabla += "<td>" + decimal2 + "</td>";
                tabla += "<td></td>";
                tabla += "</tr>";
                tabla += "</table>";
                document.getElementById("pie").innerHTML = tabla;

            }
        }

        function pdf() {
            document.getElementById('imprimir').style.visibility = 'hidden';
            if (typeof(window.print) != 'undefined') {
                window.print();
            }
            document.getElementById('imprimir').style.visibility = '';
        }
    </script>

    <section class="title" style="background-color:rgb(204, 204, 6) ">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1 >Calcule Su Crédito</h1>
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
            <form id="formulario01" method="POST" action="./guardar.php" onsubmit="return validarCamposObligatorios()">
                <!--izquierda-->
                <div class="span5">
                    <table width="100%">

                        <tr>
                            <td colspan="2"><strong style="text-align:center; font-size:15px; padding-left:10px;">Monto a Solicitar: $</strong>
                                <br>
                                <input name="monto" type="text" class="required" id="monto" onkeypress="return validarNumeros(event)" pattern="[0-9]{3,6}" title="Monto mínimo: 100. Tamaño máximo: 100000" style="border-color:#C9D0CC" required /><strong style="text-align:center; font-size:15px; padding-left:10px;">,00</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select name="interes" id="interes" class=" required" required>
                                    <option value="" disabled selected>-- Seleccione Tipo de Cr&eacute;dito --</option>
                                    <option value="14.99">Cr&eacute;dito de Consumo</option>
                                    <option value="17.00">Cr&eacute;dito Microempresarial</option>
                                    <option value="10.44">Cr&eacute;dito Inmobiliario</option>
                                    <option value="10.80">Cr&eacute;dito Comercial</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select class="required" name="plazo" id="plazo" required>
                                    <option value="" disabled selected>-- Seleccione Meses Plazo --</option>
                                    <option value="06">06 Meses</option>
                                    <option value="12">12 Meses</option>
                                    <option value="24">24 Meses</option>
                                    <option value="30">30 Meses</option>
                                    <option value="36">36 Meses</option>
                                    <option value="42">42 Meses</option>
                                    <option value="48">48 Meses</option>
                                    <option value="54">54 Meses</option>
                                    <option value="60">60 Meses</option>
                                    <option value="66">66 Meses</option>
                                    <option value="72">72 Meses</option>
                                    <option value="78">78 Meses</option>
                                    <option value="84">84 Meses</option>
                                    <option value="90">90 Meses</option>
                                    <option value="96">96 Meses</option>
                                    <option value="102">102 Meses</option>
                                    <option value="108">108 Meses</option>
                                    <option value="114">114 Meses</option>
                                    <option value="120">120 Meses</option>
                                    <option value="126">126 Meses</option>
                                    <option value="132">132 Meses</option>
                                    <option value="138">138 Meses</option>
                                    <option value="144">144 Meses</option>
                                    <option value="150">150 Meses</option>
                                    <option value="156">156 Meses</option>
                                    <option value="162">162 Meses</option>
                                    <option value="168">168 Meses</option>
                                    <option value="174">174 Meses</option>
                                    <option value="180">180 Meses</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select name="tipo" id="tipo" required>
                                    <option value="" disabled selected>-- Seleccione Tipo de Amortizaci&oacute;n --</option>
                                    <option value="aleman">Tabla Alemana</option>
                                    <option value="frances">Tabla Francesa</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="button" id="calcular" value="Calcular" onclick="activarBoton()" /></td>
                            <td><input type="button" id="limpiar" value="Limpiar" onclick="location.href='calCredito.php'" /></td>
                            <td><input type="button" id="imprimir" value="PDF" onclick="pdf()" disabled /></td>


                        </tr>
                    </table>
                </div>
                <!--derecha-->
                <div class="span7 tablascroll" id="tablaInfo" style="display: block;">
                    <img src="images/simuladores/sim2.jpg" alt="Calcule su cr&eacute;dito" id='imgCredito'>

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
                    &copy; 2019 <a target="_blank" href="#" title="Free Twitter Bootstrap WordPress Themes and HTML templates">BANQUITO</a>. Todos los derechos reservados
                </div>
            </div>
        </div>
    </footer>

</body>

</html>

<script>
    $("#formulario").validate();
</script>