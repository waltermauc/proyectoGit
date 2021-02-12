<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Banquito</title>
</head>

<body>
    <?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? mb_strtoupper(trim($_POST["correo"])) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $codigo = 0;
    $correctos = 0;
    $incorrectos = 0;
    $codigoCliente = 0;
    $codigoClienteFinal = 0;
    //$pass = MD5($contrasena);
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "SELECT * FROM bv_persona WHERE per_correo = '$usuario' and per_password = '$contrasena'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['cod'] = "$row[per_id]";
            $_SESSION['nom'] = "$row[per_nombre]";
            $_SESSION['ape'] = "$row[per_apellido]";
            $_SESSION['rol'] = "$row[per_rol]";
            $_SESSION['cor'] = "$usuario";
        }
        $codigo = $_SESSION['cod'];

        $_SESSION['isLogged'] = TRUE;

        if ($_SESSION['rol'] == "admin") {
            header("Location: ../../admin/vista/admin/index.php");
        } else {
            if ($_SESSION['rol'] == "usuario") {
                $sqlAccesoCorrecto = "SELECT * FROM bv_cliente WHERE cli_persona=$codigo";
                $result = $conn->query($sqlAccesoCorrecto);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $codigoCliente = $row["cli_id"];
                        $correctos = $row["cli_num_login"];
                    }
                    $correctos = $correctos + 1;
                    $to_email = '';
                    $subject ='';
                    $body ='';
                    $headers ='';
                    $sql3 = "UPDATE bv_cliente SET cli_num_login=$correctos WHERE cli_id=$codigoCliente;";
                    if ($conn->query($sql3) === TRUE) {

                        $to_email = "wbau@gmail.com";
                        $subject = "Web transaccional: Inicio de sesion";
                        $body = "Se registo un ingreso al servicio Web Transaccional \nSi usted no realizo esta operacion dirijase a cualquiera de nuestras oficinas o comuniquese con nuestro Call Center
                        \nCALL CENTER: (07) 2222836\nCelular:  0986694444\nEscríbanos a: info@banquito.fin.ec";
                        $headers = "Banquito";

                       
                    }
                    $codigoca='';
                    echo "<h1>REGISTRO</h1>";
                    $sql4 = "SELECT * from bv_persona tp,bv_cliente tcl,bv_cuenta tca where tp.per_id = tcl.cli_persona and tcl.cli_id =tca.cli_id and tp.per_correo= '$usuario';";
                    $result1=$conn->query($sql4);
                    $row = $result1->fetch_assoc();
                    $codigoca = $row["cue_ncuenta"];
                    echo "<h1> ".$codigoca."</h1>";

                    $sql5 = "INSERT INTO bv_registrosacceso VALUES(0,'$fecha','EXITOSO',$codigoca);";
                    echo "<h1> ".$fecha."</h1>";

                    $result3 = $conn->query($sql5); 
                   //if (mail($to_email, $subject, $body, $headers)) {
                       if($sql5 == true ){
                        header("Location: ../../admin/vista/user/index.php");
                       }
                  //  } 
                  else {
                        echo "Email sending failed...";
                    }
                     echo "<h1> SE CREO EL REGISTRO</h1>";  
                }
            
            } else {
                $sql1 = "SELECT * FROM bv_empleado WHERE emp_persona=$codigo";
                $result1 = $conn->query($sql1);
                $row = $result1->fetch_assoc();
                $ca = $row["emp_cargo"];
                if ($ca == "CAJERO"){
                    header("Location: ../../admin/vista/empleado/indexcajero.php");
                }else if($ca == "SUPERVISOR POLIZAS"){
                    header("Location: ../../admin/vista/empleado/indexjc.php");
                }
            }
        }
    } else {


        $sqlAccesoIncorrecto = "SELECT * FROM bv_persona WHERE per_correo='$usuario'";
        $result = $conn->query($sqlAccesoIncorrecto);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $codigoCliente = $row["per_id"];
            }
            $sqlAccesoIncorrecto2 = "SELECT * FROM bv_cliente WHERE cli_persona=$codigoCliente";
            $result2 = $conn->query($sqlAccesoIncorrecto2);
            if ($result2->num_rows > 0) {

                while ($row = $result2->fetch_assoc()) {
                    $codigoClienteFinal = $row["cli_id"];
                    $incorrectos = $row["cli_num_inco"];
                }
                $incorrectos = $incorrectos + 1;
                $to_email = '';
                $subject ='';
                $body ='';
                $headers ='';
                $sql3 = "UPDATE bv_cliente SET cli_num_inco=$incorrectos WHERE cli_id=$codigoClienteFinal;";
                
                if ($conn->query($sql3) === TRUE) {

                    $to_email = "wbau@gmail.com";
                    $subject = "Web transaccional: Inicio de sesion Fallido";
                    $body = "Se registo un ingreso fallido al servicio Web Transaccional \nSi usted no realizo esta operacion dirijase a cualquiera de nuestras oficinas o comuniquese con nuestro Call Center
                    \nCALL CENTER: (07) 2222836\nCelular:  0986694444\nEscríbanos a: info@banquito.fin.ec";
                    $headers = "Banquito";

                    $codigoca='';
                    echo "<h1> HOLASDSADA</h1>";
                    $sql4 = "SELECT * from bv_persona tp,bv_cliente tcl,bv_cuenta tca where tp.per_id = tcl.cli_persona and tcl.cli_id =tca.cli_id and tp.per_correo = '$usuario';";
                    $result1=$conn->query($sql4);
                    $row = $result1->fetch_assoc();
                    $codigoca = $row["cue_ncuenta"];
                    echo "<h1> ".$codigoca."</h1>";


                    $sql5 = "INSERT INTO bv_registrosacceso VALUES(0,'$fecha','FALLIDO',$codigoca);";
                    $result3 = $conn->query($sql5); 


                    if (mail($to_email, $subject, $body, $headers)) {
                        header("Location: ../../admin/vista/user/index.php");
                    } else {
                        echo "Email sending failed...";
                    }
                }
            }
        }






        header("Location: ../vista/login.html");
    }
    $conn->close();
    ?>
</body>

</html>