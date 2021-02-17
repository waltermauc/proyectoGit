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

    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';


    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $password = "";
    //Reconstruimos la contraseña segun la longitud que se quiera
    for ($i = 0; $i < 6; $i++) {
        //obtenemos un caracter aleatorio escogido de la cadena de caracteres
        $password .= substr($str, rand(0, 62), 1);
    }


    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"])  ? trim($_POST["telefono"]) : null;
    $correo =  isset($_POST["correo"]) ?  trim($_POST["correo"]) : null;
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;
    $fecha = date('Y-m-d', strtotime(str_replace('/', '-', $fechaNacimiento)));
    $estado = isset($_POST["ecivil"]) ? mb_strtoupper(trim($_POST["ecivil"]), 'UTF-8') : null;
    $sexo = isset($_POST["sexo"]) ? mb_strtoupper(trim($_POST["sexo"]), 'UTF-8') : null;
    $pass = MD5($password);
    $codigo = 0;
    $saldo= 0.00;
    $sql = "INSERT INTO bv_persona VALUES(null,'$cedula', '$nombres', '$apellidos', '$direccion', '$telefono','$fecha','$correo','$estado','$sexo','usuario','$password');";
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    if ($conn->query($sql) === TRUE) {

        $sql2 = "SELECT * FROM bv_persona WHERE per_cedula='$cedula';";
        $result = $conn->query($sql2);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codigo = $row["per_id"];
                $sql3 = "INSERT INTO bv_cliente VALUES(null,0,0,$codigo);";
                if ($conn->query($sql3) === TRUE) {
                    $to_email = "mauricio.bu.z@gmail.com";
                    $subject = "Creacion de cuenta en Banquito";
                    $body = "Gracias por confiar en nosotros $nombres $apellidos, ud ha creado una cuenta en banquito, ud puede iniciar sesion con correo:$correo password:$password";
                    $headers = "Banquito";

                    if (mail($to_email, $subject, $body, $headers)) {
                        echo "Se ha creado correctamemte-";
                    } else {
                        echo "Email sending failed...";
                    }
                }
            }
        }
        $sql5 = "SELECT * FROM bv_cliente where cli_persona='$codigo';";
        $result1 = $conn->query($sql5);
        $row = $result1->fetch_assoc();
        $id = $row["cli_id"];
        echo $id;
        $sql4 = "INSERT INTO bv_cuenta VALUES(0, '$saldo', '$fecha', $id);";
        if ($conn->query($sql4) === TRUE) {
            echo "Con su #cuenta";
        }else{
            echo "error con id";
        }
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'> La persona con la cedula $cedula ya está registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
        }
    }
    //cerrar la base de datos
    $conn->close();
    header ("Location: ../../index.html");
    echo "<a href='/software/BancaVirtual/index.html'>Regresar</a>";
    ?>
</body>

</html>