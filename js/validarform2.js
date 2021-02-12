function validarform2(){

    var c_2 = document.getElementById("c_2").value.trim(); //monto
    var c_3 = document.getElementById("c_3").value.selectedItem; //cuotas
    var c_3 = document.getElementById("c_3");
    var selCuo  = c_3.options[c_3.selectedIndex].text;
    //var c_4 = document.getElementById("c_4").value; //destino
    //datos cliente
    var c_5 = document.getElementById("c_5").value.trim(); //nombres
    var cedula = document.getElementById("c_6").value; //cedula
    var email = document.getElementById("c_7").value.trim(); //email
    var c_9 = document.getElementById("c_9").value.selectedItem; //estado civil
    var estaCiv = document.getElementById("c_9");
    var selCiv  = estaCiv.options[estaCiv.selectedIndex].text;
    var domicilio = document.getElementById("c_10").value.trim(); //domicilio
    var celular = document.getElementById("c_12").value.trim(); //celular
    var c_13 = document.getElementById("c_13").value.selectedItem; //Ocup
    var ocup = document.getElementById("c_13");
    var selOcup  = ocup.options[ocup.selectedIndex].text;
    
    // var cedula = '2222222221';

    //Preguntamos si la cedula consta de 10 digitos
    if(cedula.length == 10){

        //Obtenemos el digito de la region que sonlos dos primeros digitos
        var digito_region = cedula.substring(0,2);

        //Pregunto si la region existe ecuador se divide en 24 regiones
        if( digito_region >= 1 && digito_region <=24 ){

            // Extraigo el ultimo digito
            var ultimo_digito   = cedula.substring(9,10);

            //Agrupo todos los pares y los sumo
            var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));

            //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
            var numero1 = cedula.substring(0,1);
            var numero1 = (numero1 * 2);
            if( numero1 > 9 ){ var numero1 = (numero1 - 9); }

            var numero3 = cedula.substring(2,3);
            var numero3 = (numero3 * 2);
            if( numero3 > 9 ){ var numero3 = (numero3 - 9); }

            var numero5 = cedula.substring(4,5);
            var numero5 = (numero5 * 2);
            if( numero5 > 9 ){ var numero5 = (numero5 - 9); }

            var numero7 = cedula.substring(6,7);
            var numero7 = (numero7 * 2);
            if( numero7 > 9 ){ var numero7 = (numero7 - 9); }

            var numero9 = cedula.substring(8,9);
            var numero9 = (numero9 * 2);
            if( numero9 > 9 ){ var numero9 = (numero9 - 9); }

            var impares = numero1 + numero3 + numero5 + numero7 + numero9;

            //Suma total
            var suma_total = (pares + impares);

            //extraemos el primero digito
            var primer_digito_suma = String(suma_total).substring(0,1);

            //Obtenemos la decena inmediata
            var decena = (parseInt(primer_digito_suma) + 1)  * 10;

            //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
            var digito_validador = decena - suma_total;

            //Si el digito validador es = a 10 toma el valor de 0
            if(digito_validador == 10)
                var digito_validador = 0;

            //Validamos que el digito validador sea igual al de la cedula
            if(digito_validador == ultimo_digito){
            }else{
                swal({
                    title: "Error",
                    icon:  "error",
                    text:  "La cedula: " + cedula + " es incorrecta",
                });
                return false;
            }

        }else{
            swal({
                title: "Error",
                icon:  "error",
                text:  "Esta cedula no pertenece a ninguna region",
            });
            return false;
        }
    }else{
        swal({
            title: "Error",
            icon:  "error",
            text:  "Esta cedula no tiene 10 Digitos",
        });
        return false;
    }    


    var monto = c_2.length;
    var nombres = c_5.length;
    var email = email.length;
    var domicilio = domicilio.length;
    var celular = celular.length;
    
    
    
    
    if(monto == 0)
    {
        swal({
            title: "Error",
            icon:  "error",
            text:  "Ingrese un monto",
        });
        return false;
    }
    else if(selCuo == "-- Seleccione Plazo --")
    {
        swal({
            title: "Error",
            icon:  "error",
            text:  "Seleccione un Plazo",
        });
        return false;
    } 
    else if(nombres == 0)
    {
        swal({
            title: "Error",
            icon:  "error",
            text:  "Ingrese un nombre",
        });
        return false;
    }
    else if(email == 0)
    {
        swal({
            title: "Error",
            icon:  "error",
            text:  "Ingrese un correo",
        });
        return false;
    }
    else if(domicilio == 0)
    {
        swal({
            title: "Error",
            icon:  "error",
            text:  "Ingrese un domicilio",
        });
        return false;
    }
    else if(celular == 0)
    {
        swal({
            title: "Error",
            icon:  "error",
            text:  "Ingrese un numero de celular",
        });
        return false;
    }
    else if(estaCiv == "-- Seleccione Estado Civil --")
    {
        swal({
            title: "Error",
            icon:  "error",
            text:  "Seleccione Estado Civil",
        });
        return false;
    }
    else if(estaCiv == "-- Seleccione Ocupacion --")
    {
        swal({
            title: "Error",
            icon:  "error",
            text:  "Seleccione una Ocupacion",
        });
        return false;
    }
    else
    {
        return true;
    }

}