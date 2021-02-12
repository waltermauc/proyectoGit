<?php
    include '../../../config/conexionBD.php';

    $cedula = $_GET["ced"];
    $cocaj = $_GET["cedu"];
    $sq = "SELECT * FROM bv_persona WHERE per_cedula='$cedula'";


    $res = $conn->query($sq);
    if($res->num_rows > 0){
        while($row = $res->fetch_assoc()) {
            $per_nombre = $row['per_nombre'];
            $per_apellido = $row['per_apellido'];
            $per_id = $row['per_id'];

        }
        
        //nombre, apellido y numero de cuenta
        
        
        $sql = "SELECT * FROM bv_cliente where cli_persona='$per_id';";


        $result1 = $conn->query($sql);
        $row = $result1->fetch_assoc();
        $id = $row["cli_id"];
        echo $id;
        $sql = "SELECT cue_ncuenta FROM bv_cuenta WHERE cli_id='$id'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                
                $cue_numcuenta = str_pad($row["cue_ncuenta"], 6, 0, STR_PAD_LEFT);
            }
            echo "
                <label for='nombres'>Nombres</label>
                <input type='text' id='nombres' name='nombres' value='$per_nombre' disabled=»disabled» />
                <span id='mensajeNombres' class='error'></span>
                <br>
                <label for='apellidos'>Apellidos</label>
                <input type='text' id='apellidos' name='apellidos' value='$per_apellido' disabled=»disabled» />
                <span id='mensajeApellidos' class='error'></span>
                <br>
                <label for='numero'>Numero De Cuenta</label>
                <input type='text' id='numero' name='numero' value='$cue_numcuenta' disabled=»disabled» />
                <span id='mensajenumero' class='error'></span>";
        }else{
            echo "<tr>";
            echo " <td colspan='7'> No existe una cuenta para este usuario </td>";
            echo "</tr>";
        }

        

    }else{
        echo "<tr>";
        echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
        echo "</tr>";
    }


    $conn->close();
?>




                
