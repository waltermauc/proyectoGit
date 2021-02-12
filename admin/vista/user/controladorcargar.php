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
/*
if($_FILES["guardarcedula"]["error"]>0){
    echo "erro al cargar archivo";
}else{
    $permitidosc = array("image/png","image/jpeg","application/pdf");
    $limitec=1024;
    if(in_array($_FILES["guardarcedula"]["type"], $permitidosc) && $_FILES["guardarcedula"]["size"] <= $limitec * 1024){
        $rutac='aqui/cedulas/';
        $nombrec=$_FILES["guardarcedula"]["name"];
        $guardarced = $rutac.$nombrec;
        if(!file_exists($rutac)){
            mkdir($rutac);
        }

        if(!file_exists($guardarced)){
            $resultadoc= @move_uploaded_file($_FILES["guardarcedula"]["tmp_name"], $guardarced);
            if($resultadoc){
                echo "Archivo Guardado";
            }else{
                echo "error al guardar archivo";
            }
        }else{
            echo "archivo ya existe";
        }

    }else{
        echo "Archivo excede tamaño";	
    }
}

//funcion para guardar planilla
if($_FILES["guardarplanilla"]["error"]>0){
    echo "erro al cargar archivo";
}else{
    $permitidosp = array("image/png","image/jpeg","application/pdf");
    $limitep=1024;
    if(in_array($_FILES["guardarplanilla"]["type"], $permitidosp) && $_FILES["guardarplanilla"]["size"] <= $limitep * 1024){
        $rutap='aqui/planillas/';
        $nombrep=$_FILES["guardarplanilla"]["name"];
        $guardarpla = $rutap.$nombrep;
        if(!file_exists($rutap)){
            mkdir($rutap);
        }
        if(!file_exists($guardarpla)){
            $resultadop= @move_uploaded_file($_FILES["guardarplanilla"]["tmp_name"], $guardarpla);
            if($resultadop){
                echo "Archivo Guardado";
            }else{
                echo "error al guardar archivo";
            }
        }else{
            echo "archivo ya existe";
        }
    }else{
        echo "Archivo excede tamaño";	
    }
}
if($_FILES["guardarrol"]["error"]>0){
    echo "erro al cargar archivo";
}else{
    $permitidosr = array("image/png","image/jpeg","application/pdf");
    $limiter=1024;
    if(in_array($_FILES["guardarrol"]["type"], $permitidosr) && $_FILES["guardarrol"]["size"] <= $limiter * 1024){
        $rutar='aqui/roles/';
        $nombrer=$_FILES["guardarrol"]["name"];
        $guardarrol = $rutar.$nombrer;
        if(!file_exists($rutar)){
            mkdir($rutar);
        }
        if(!file_exists($guardarrol)){
            $resultador= @move_uploaded_file($_FILES["guardarrol"]["tmp_name"], $guardarrol);
            if($resultador){
                echo "Archivo Guardado";
            }else{
                echo "error al guardar archivo";
            }
        }else{
            echo "archivo ya existe";
        }
    }else{
        echo "Archivo excede tamaño";	
    }
}
    $sql = "INSERT INTO imagenes VALUES(null,'$nombrec', '$nombrep', '$nombrer');";
    if ($conn->query($sql) === TRUE) {

        echo "Se guardo correctamente";
       
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'> La persona con la cedula $cedula ya está registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error : " . mysqli_error($conn) . "</ p>";
        }
    }
    $conn->close();
    echo "<a href='cargar.html'>Regresar</a>";
     */
    ?>
  
</body>

</html>