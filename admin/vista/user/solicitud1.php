<?php
    include '../../../config/conexionBD.php';
    $cedulaem = $_GET["cedulaemp"];
    $sqlu = "SELECT * FROM bv_persona p, bv_cuenta c, bv_cliente cc where p.per_id = cc.cli_persona and c.cli_id = cc.cli_id and p.per_cedula = '$cedulaem' and p.per_rol='usuario'";
    $resultu = $conn->query($sqlu);
    $row = $resultu->fetch_assoc();

    $sqlu1 = "SELECT count(*) cantidad FROM bv_persona p,bv_cuenta,bv_credito WHERE    p.per_cedula = '$cedulaem' and p.per_rol='usuario'";
    $resultu1 = $conn->query($sqlu1);
    
    $cantidadcredi = $resultu1->fetch_assoc();
    if($resultu->num_rows > 0){
    $cantidadc= $cantidadcredi["cantidad"];
    $telefono = $row["per_telefono"];
    $direccion = $row["per_direccion"];
    $cedula = $row["per_cedula"];
    $correo = $row["per_correo"];
    $sexo = $row["per_sexo"];
    $estado = $row["per_estado_civil"];
    $fechan = $row["per_fecha_nac"];
    $saldo = $row["cue_saldo"];
    $empcodigo = $row["cli_id"];
    date_default_timezone_set("America/Guayaquil");
    $fechac =  time();
    $tiempo = strtotime($fechan); 
    $edad = ($fechac-$tiempo)/(60*60*24*365.25);
    $edad = $edad + 1;
    $edad = floor($edad); 
   echo" 
   <div id='part1' class='parte1'>
   <label for='cedulae'>Cedula Empleado:</label>
   <input type='text' id='cedulae' name='cedulae' value='$cedula' disabled/><br><br>
   <label for='numerosc'>Numeros de Creditos Actual:</label>
    <input type='text' id='numerosc' name='numerosc' value='$cantidadc' disabled/><br><br>
    <label for='historial'>Historial de Creditos:</label>
    <input type='text' id='historial' name='historial' value='no se tomaron creditos'disabled/><br><br>
    <label for='numerosc'>Tiempo de empleado:</label> 
    <select id='tiempo' name='tiempo'>
        <option value='selecione'>SELECIONE</option>
        <option value='A71'>Desempleado</option>
        <option value='A72'>Menos de un año</option>
        <option value='A73'> 1 a menos de 4 años</option>
        <option value='A74'> 4 a menos de 7 años</option>
        <option value='A75'> 7 o mas años</option>
    </select>
    <label for='empcodigo'>Codigo Empleado:</label>
    <input type='text' id='empcodigo' name='empcodigo' value='$empcodigo' disabled '/>
    <br>
    ";
    
                    echo "
                   
                    <br>
                    <label for='telefono'>Telefono:</label>
                        <input type='text' id='telefono' name='telefono' value='$telefono' disabled/>
                        <br>
                        <br>
                        <label for='direccion'>Direccion:</label>
                        <input type='tex' id='direccion' name='direccion' value='$direccion' disabled/>
                        <br>
                        <br>
                        <label for='correo'>Correo:</label>
                        <input type='text' id='correo' name='correo' value='$correo' disabled/>
                        <br>
                        <br>
                        <label for='sexo'>Sexo</label>
                        <input type='text' id='sexo' name='sexo' value='$sexo' disabled/>
                        <br>
                        <br>
                        <label for='estado'>Estado civil:</label>
                        <input type='text' id='estado' name='estado' value='$estado' disabled/>;
                        <br>
                        <br>
                        <label for='fechan'>Fecha Nacimiento:</label>
                        <input type='text' id='fechan' name='fechan' value='$fechan' disabled/>
                        <br>
                        <br>
                        <label for='edad'>Edad:</label>
                        <input type='text' id='edad' name='edad' value='$edad' disabled/>
                        <br>
                        <br>
                        <label for='saldoc'>Saldo Cuenta:</label>
                        <input type='text' id='saldoc' name='saldoc' value='$saldo' disabled/>
                        </div>";
    }else{
        echo  "<h1 onchange='return limpiaru() '> ES USUARIO NO EXISTE</h1>
        ";
    }
    
        ?>