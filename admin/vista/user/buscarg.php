<?php
    include '../../../config/conexionBD.php';
    $cedula = $_GET['ceduel'];
    $sq = "SELECT * FROM bv_persona p, bv_cuenta c, bv_cliente cc where p.per_id = cc.cli_persona and c.cli_id = cc.cli_id and p.per_cedula = '$cedula' and p.per_rol='usuario'";   
    $res = $conn->query($sq);
    if($res->num_rows <= 0){
        echo "<label> ESTE USUARIO NO ES CLIENTE DE LA EMPRESA</label>";
    }else{
    $row = $res->fetch_assoc();
    $nombre = $row['per_nombre'];
    $apellido = $row['per_apellido'];
    $codigog = $row['cli_id'];
     echo "
     <div id='part3' class='parte3'>
     <label for='codigogar' > Codigo de Garante : </label> <br>
     <input   type'text' id='codigogar' name='codigogar' value='$codigog' disabled />
     <label>Nombre: $nombre</label>
            <br>
            <label>Apellido: $apellido</label> 
            </div>";

    }
    
    $conn->close();
    
?>