function soloValidos(e){
       var key = e.keyCode || e.which;
       var tecla = String.fromCharCode(key).toLowerCase();
       var letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789-,";
       var especiales = "8-37-39-46";

       var tecla_especial = false;
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

function soloLetras(e){
       var key = e.keyCode || e.which;
       var tecla = String.fromCharCode(key).toLowerCase();
       var letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       var especiales = "8-37-39-46";

       var tecla_especial = false;
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

function soloCorreo(e){
       var key = e.keyCode || e.which;
       var tecla = String.fromCharCode(key).toLowerCase();
       var letras = "abcdefghijklmnñopqrstuvwxyz0123456789@-_.";
       var especiales = "8-37-39-46";

       var tecla_especial = false;
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

function soloNumeros(e){
       var key = e.keyCode || e.which;
       var tecla = String.fromCharCode(key).toLowerCase();
       var letras = "0123456789";
       var especiales = "8-37-39-46";

       var tecla_especial = false;
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

      function validarCedula (cedula) {
          
        var cad = cedula;
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;

        if (cad !== "" && longitud === 10){
          for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
              var aux = cad.charAt(i) * 2;
              if (aux > 9) aux -= 9;
              total += aux;
            } else {
              total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
          }

          total = total % 10 ? 10 - total % 10 : 0;

          if (cad.charAt(longitud-1) == total) {
              //document.getElementById("salida").innerHTML = ("Cedula Válida");
              return 1;
          }else{
              //document.getElementById("salida").innerHTML = ("Cedula Inválida");
              return 0;
          }
        }
      }



function validar(){
    var c_1 = document.getElementById("c_1").value; //nombre
    var c_2 = document.getElementById("c_2").value; //apellido
    var c_5 = document.getElementById("c_5").value; //ceedula
    var c_9 = document.getElementById("c_9").value; //profesion
    var c_10 = document.getElementById("c_10").value; //domicilio
    var c_11 = document.getElementById("c_11").value; //barrio
    var c_12 = document.getElementById("c_12").value; //telefono
    var c_13 = document.getElementById("c_13").value; //tipo residencia
    var c_14 = document.getElementById("c_14").value; //referencia
    var c_67 = document.getElementById("c_67").value; //banco
    var c_68 = document.getElementById("c_68").value; //no cuenta
    var c_69 = document.getElementById("c_69").value; //empresa
    var c_70 = document.getElementById("c_70").value; //cedula
    var c_71 = document.getElementById("c_71").value; //telefono
    
    var c_78 = document.getElementById("c_78").value; //id
    var c_79 = document.getElementById("c_79").value; //nombre
    var c_80 = document.getElementById("c_80").value; //telefono
    
    var ctrIDE = validarCedula(c_5);
    if(ctrIDE == 0 || ctrIDE == ""){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Cedula Ingresada Invalida",
        });
        return false;
                
       }  
    else if(c_5.length>10){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Se necesia 10 digitos para la cedula",
        });
        return false;
                
       }
    else if(c_5.length==0)
    {
        swal({
            title: "Error",
            icon:  "error",
            text:  "Se necesita un numero de cedula",
        });
        return false;
    }
    else if(isNaN(c_5)){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Cedula incorrecta",
        });
        return false;
            }
    
    var cad = document.getElementById("c_5").value.trim();
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;
if (cad !== "" && longitud === 10){
          for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
              var aux = cad.charAt(i) * 2;
              if (aux > 9) aux -= 9;
              total += aux;
            } else {
              total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
          }

          total = total % 10 ? 10 - total % 10 : 0;

          if (cad.charAt(longitud-1) == total) {
          }else{
                  swal({
                  title: "Error",
                  icon:  "error",
                  text:  "Cedula Inválida",
              });
              return false;
          }
        }

    
    if(c_1 ==="" || c_2 ==="" || c_5 ==="" || c_9 ==="" || c_10 ==="" || c_11 ==="" || c_12 ==="" || c_14 ===""){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Los campos de información del solicitante son obligatorios",
        });
        return false;       
       }    
    else if(c_1.length>30){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Nombre muy largo",
        });
        return false;   
            }
    else if(c_2.length>30){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Apellido muy largo",
        });
        return false;         
            }
    else if(c_9.length>20){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Profesión muy largo",
        });
        return false;   
            }
    else if(c_12.length<7 || c_12.length>10){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Ingrese el teléfono correctamente",
        });
        return false;     
            }
    else if(isNaN(c_12)){
        swal({
            title: "Error",
            icon:  "error",
            text:  "El campo teléfono debe contener solo números",
        });
        return false;             
            }
    else if(c_67 ==="" || c_68 ==="" || c_69 ==="" || c_70 ==="" || c_71 ===""){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Ingrese al menos una referencia bancaria y una referencia personal",
        });
        return false;         
            }
    else if(c_70.length>10){  
        swal({
            title: "Error",
            icon:  "error",
            text:  "Cedula muy larga",
        });
        return false;    
       }
    else if(isNaN(c_70)){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Cedula incorrecta",
        });
        return false;   
            }
    else if(c_71.length<7 || c_71.length>10){  
        swal({
            title: "Error",
            icon:  "error",
            text:  "Ingrese el teléfono correctamente",
        });
        return false;   
            }
    else if(isNaN(c_71)){
        swal({
            title: "Error",
            icon:  "error",
            text:  "El campo teléfono debe contener solo números",
        });
        return false;          
            }
    else if(c_78.length>10){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Cedula muy larga",
        });
        return false;  
       }
    else if(isNaN(c_78)){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Cedula incorrecta",
        });
        return false;
            }  
    else if(c_79.length>30){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Nombre muy largo",
        });
        return false;       
    }
    else if(c_80.length<7 || c_80.length>10){
        swal({
            title: "Error",
            icon:  "error",
            text:  "Ingrese el teléfono correctamente",
        });
        return false;       
            }
    else if(isNaN(c_80)){

        swal({
            title: "Error",
            icon:  "error",
            text:  "El campo teléfono debe contener solo números",
        });
                return false;             
            }
    else
    {
        return true; 
    }
    
}