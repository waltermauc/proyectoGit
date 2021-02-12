<?php
            
    include '../../../config/conexionBD.php';
    $codigoclie = $_GET["codigoc"];
    $sqlup = "UPDATE  bv_credito  SET cred_estado ='N' where cli_id = $codigoclie";
    if ($conn->query($sqlup) === TRUE) {
        echo "<p class='error'>Error : Se Actualizo</ p>";
        echo'<script type="text/javascript"> alert("Si se aprobo");
window.location.href="index.php";</script>';
        //header("Location:/BancaVirtual/admin/vista/empleado/index.php");
    }else {
        echo "<p class='error'>Error : NO SE CREO LA SOLICITUD</ p>";
        }
        $conn->close();
            ?>