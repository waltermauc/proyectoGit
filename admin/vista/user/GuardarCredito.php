<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';

    $meses = $_GET["pmeses"];
    $creditoh = $_GET["hcredito"];
    $proposito = $_GET["pcredito"];
    $monto = $_GET["cmonto"];
    $saldo = $_GET["csaldo"];
    $templeado = $_GET["templeado"];
    $tasa = $_GET["ttasa"];
    $cuentaes = $_GET["estadoci"];
    $tgarante = $_GET["garant"];
    $valor = $_GET["evaluov"];
    $activos = $_GET["activ"];
    $edad = $_GET["cedad"];
    $vivienda = $_GET["viviendac"];
    $cantidadcre = $_GET["cantidacre"];
    $empleo = $_GET["cempleo"];
    $empleox = $_GET["cempleox"];
    $tamort = $_GET["tamortizacion"];
    $cliente = $_GET["codigoclie"];
    $garantec = $_GET["codigogara"];

    $sqlcrear = "INSERT INTO bv_credito VALUES(null,$cantidadcre, $edad, '$vivienda', '$empleox', '$empleo','$proposito','$tamort',$meses,'$creditoh','$monto','$templeado',$tasa,'$valor','$activos',$cliente,$garantec,'$saldo','$cuentaes','$tgarante','P');";
    if ($conn->query($sqlcrear) === TRUE) {

        $sqlid = "SELECT bv_cliente.cli_persona from bv_cliente where bv_cliente.cli_id=$cliente;";
        $resultu = $conn->query($sqlid);
        $row = $resultu->fetch_assoc();
        $idcliente = $row["cli_persona"];

        $sqlcedula = "SELECT bv_persona.per_cedula from bv_persona WHERE bv_persona.per_id=$idcliente;";
        $resultuce = $conn->query($sqlcedula);
        $row = $resultuce->fetch_assoc();
        $cedulaCliente = $row["per_cedula"];

        $list = array(
            $cedulaCliente.';'.$meses.';'.$creditoh.';'.$proposito.';'.$monto.';'.$saldo.';'.$templeado.';4;'.$cuentaes.';A101;4;'.$activos.';'.$edad.';'.$vivienda.';'.$cantidadcre.';'.$empleo.';'.$empleox.';1;',
        );

        $file = fopen('', 'a');  // 'a' for append to file - created if doesn't exit

        foreach ($list as $line) {
            fputcsv($file, explode(',', $line));
        }

        fclose($file);




        echo '<script type="text/javascript"> alert("se ha enviado el credito");
window.location.href="index.php";</script>';
        //header("Location:/BancaVirtual/admin/vista/empleado/index.php");
    } else {
        echo "<p class='error'>Error : NO SE CREO LA SOLICITUD</ p>";
    }
    $conn->close();

    ?>
</body>

</html>