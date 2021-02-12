<?php
    include '../../../config/conexionBD.php';
    $cocaj = $_GET["codigoempleado"];
    echo $cocaj;
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $cedula = $_GET["cedula"];
    if($_GET["ValorDeposito"]==0){
        $ValorRetiro = $_GET["ValorRetiro"];
        $valor=$ValorRetiro;
        $op="Retiro";
    }else{
        $ValorDeposito = $_GET["ValorDeposito"];
        $valor=$ValorDeposito;
        $op="Deposito";
    }
    
    $operacion = $_GET["operacion"];

    $sq = "SELECT per_id FROM bv_persona WHERE per_cedula='$cedula'";

    $res = $conn->query($sq);
    if($res->num_rows > 0){
        while($row = $res->fetch_assoc()) {
            $per_id = $row['per_id'];

        }
        $sql2 = "SELECT * FROM bv_cliente where cli_persona='$per_id';";

       $result1 = $conn->query($sql2);
       $row = $result1->fetch_assoc();
       $id = $row["cli_id"];

        $sql = "SELECT * FROM bv_cuenta WHERE cli_id='$id'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $cue_numcuenta =$row["cue_ncuenta"];
                $cue_saldo = $row['cue_saldo'];
            }
            if($operacion=="retiro"){
                $cue_saldo = $cue_saldo - $ValorRetiro;
            }elseif($operacion=="deposito"){
                $cue_saldo = $cue_saldo + $ValorDeposito;
            }

            
            
            $sql2 = "UPDATE bv_cuenta SET cue_saldo = $cue_saldo WHERE cli_id = $id"; 
            $sql3 = "INSERT INTO `bv_transferencia`(`tra_fecha`, `tra_monto`, `tra_tipo`, `emp_id`, `cli_id`, `cue_ncuenta`)
            VALUES ('$fecha','$valor','$op','$cocaj','$id','$cue_numcuenta')";
            
            if ($conn->query($sql3) === TRUE) { 
            } else { 
                echo "Error: " . $sql3 . "<br>" . mysqli_error($conn) . "<br>"; 
            } 
            
            if ($conn->query($sql2) === TRUE) { 
                //echo "<a href='../../vista/empleado/index.php'>Regresar</a>";
                header ("Location: ../../vista/empleado/indexcajero.php");
            } else { 
                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn) . "<br>"; 
                header ("Location: nocambiosaldo.php");
            } 

        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>"; 
            //header ("Location: noencontroelsaldo.php");
        }

    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>"; 
        //header ("Location: noencontrousuario.php");
    }


    $conn->close();
?>