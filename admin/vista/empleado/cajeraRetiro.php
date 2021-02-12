<?php
   include '../../../config/conexionBD.php';
   $cocaj = $_GET["cedu"];
   echo $cocaj;
    $cedula = $_GET["ced"];
   echo $cedula;
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
       $sql = "SELECT * FROM bv_cuenta WHERE cli_id='$id'";
       $result = $conn->query($sql);
       if($result->num_rows > 0){
           while($row = $result->fetch_assoc()){
               
               $cue_numcuenta = str_pad($row["cue_ncuenta"], 6, 0, STR_PAD_LEFT);
               $cue_saldo=$row["cue_saldo"];
           }
           echo "
           <p1>RETIRO</p1>
        <label for='total'>Total</label>
        <input type='text' id='total' name='total' value='$cue_saldo' disabled=»disabled» />
        <br>
        <label for='ValorRetiro'>ValorRetiro</label>
        <input type='text' id='ValorRetiro' name='ValorRetiro' />
        <input type='hidden' id='codigoempleado' name='codigoempleado' value='$cocaj'/>
        <br>
     
        <input type='submit' id='crear' name='crear' value='Aceptar'/>
        <a href='cajera.html'><input type='button' value='Cancelar'></a>
        <br>
        <input type='text' class='ocultar' name='operacion' value='retiro' />
     
       
    ";
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


/*
include '../../../config/conexionBD.php';

$cedula = $_GET["cedu"];
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
            $cue_saldo=$row["cue_saldo"];
        }
    echo "
        <label for='total'>Total</label>
        <input type='text' id='total' name='total' value='$cue_saldo' disabled=»disabled» />
        <br>
        <label for='ValorRetiro'>ValorRetiro</label>
        <input type='text' id='ValorRetiro' name='ValorRetiro' />
        <br>
        
        <input type='submit' id='crear' name='crear' value='Aceptar' />
        <a href='cajera.html><input type='button' value='Cancelar'></a>
        <br>
        <input type='text' class='ocultar' name='operacion' value='retiro' />
    ";

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
*/
?>





