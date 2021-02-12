<?php
session_start();
$codigoui = $_SESSION['cod'];
$usurol = $_SESSION['rol'];
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: software/BancaVirtual/public/vista/login.html");
}
if ($usurol == 'admin') {

?>
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
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
        $telefono = isset($_POST["telefono"])  ? trim($_POST["telefono"]) : null;
        $correo =  isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
        $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;
        $fecha = date('Y-m-d', strtotime(str_replace('/', '-', $fechaNacimiento)));
        $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
        $estado = isset($_POST["ecivil"]) ? mb_strtoupper(trim($_POST["ecivil"]), 'UTF-8') : null;
        $sexo = isset($_POST["sexo"]) ? mb_strtoupper(trim($_POST["sexo"]), 'UTF-8') : null;
        $cargo = isset($_POST["cargo"]) ? mb_strtoupper(trim($_POST["cargo"]), 'UTF-8') : null;
        $pass = MD5($contrasena);
        $codigo = 0;
        $sql = "INSERT INTO bv_persona VALUES(null,'$cedula', '$nombres', '$apellidos', '$direccion', '$telefono','$fecha','$correo','$estado','$sexo','empleado','$contrasena');";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "SELECT * FROM bv_persona WHERE per_cedula='$cedula';";
            $result = $conn->query($sql2);
           
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {                    
                    $codigo = $row["per_id"];
                    $sql3 = "INSERT INTO bv_empleado VALUES(0,'$cargo',$codigo);";
                    if ($conn->query($sql3) === TRUE) {
                        echo "<p>Se ha creado el empleado correctamemte</p>";
                    }
                }
            }
        } else {
            if ($conn->errno == 1062) {
                echo "<p class='error'>El empleado con la cedula $cedula ya está registrada en el sistema </p>";
            } else {
                echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
            }
        }

        $conn->close();
        echo "<a href='software/BancaVirtual/admin/vista/admin/index.php'>Regresar</a>";
        ?>
    </body>

    </html>
<?php
} else {
    header("Location: /software/BancaVirtual/public/vista/login.html");
}
?>