//----------Funciones Pagina Web--------------//
function validarChat()
{
    var nombres = document.getElementById('ms1').value.trim();
    var email   = document.getElementById('ms2').value.trim();
    var tel     = document.getElementById('ms3').value.trim();
    var direcci = document.getElementById('ms4').value.trim();
    var ciudad  = document.getElementById('ms5').value.trim();
    var tema    = document.getElementById('ms6').value.trim();
    var mensaje = document.getElementById('ms7').value.trim();
    if(nombres=='' || email=='' || tel=='' || direcci=='' || ciudad=='' || tema=='' || mensaje=='')
    {
        swal({
            title: "Error",
            icon:  "error",
            text:  "Por favor ingrese todos los datos para continuar",
        });
    }
    else
    {
        pregunta();
    }
}

function cadena()
{
    var nombres = document.getElementById('ms1').value;
    var email = document.getElementById('ms2').value;
    var tel = document.getElementById('ms3').value;
    var direcci = document.getElementById('ms4').value;
    var ciudad = document.getElementById('ms5').value;
    var tema = document.getElementById('ms6').value;
    var mensaje = document.getElementById('ms7').value;
    var cadena = "nombres="+nombres+"&email="+email+"&tel="+tel+"&direcci="+direcci+"&ciudad="+ciudad+"&tema="+tema+"&mensaje="+mensaje;
    return cadena;
}

function pregunta_()
{
    swal({
        title: "Está seguro de enviar el mensaje?",
        icon: "warning",
        buttons: true,
    })
        .then((enviar) => {
        if (enviar) {
            var string = cadena();
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    var datos = ajax.responseText;
                    alert(datos);
                }
            };
            ajax.open("POST", "enviarChat.php", true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send(string);
            swal("Mensaje enviado correctamente", {
                icon: "success",
            }); 
            document.getElementById('ms1').value='';
            document.getElementById('ms2').value='';
            document.getElementById('ms3').value='';
            document.getElementById('ms4').value='';
            document.getElementById('ms5').value='';
            document.getElementById('ms6').value='';
            document.getElementById('ms7').value=''; 
        } else {
            swal("Mensaje no enviado",{
                icon: "error",
            });
        }
    });
}



function pregunta()
{
    swal({
        title: "Está seguro de enviar el mensaje?",
        icon: "warning",
        buttons: true,
    })
        .then((enviar) => {
        if (enviar) {
            var valor=1;   

            var nombres = document.getElementById('ms1').value;
            var email   = document.getElementById('ms2').value;
            var tel     = document.getElementById('ms3').value;
            var direcci = document.getElementById('ms4').value;
            var ciudad  = document.getElementById('ms5').value;
            var tema    = document.getElementById('ms6').value;
            var mensaje = document.getElementById('ms7').value;
            cadena ="procesa="+valor+"&nombres="+nombres+"&email="+email+"&tel="+tel+"&direcci="+direcci+"&ciudad="+ciudad+"&tema="+tema+"&mensaje="+mensaje;

            ajax=objetoAjax();
            ajax.open("POST", "enviarChat.php",true);
            ajax.onreadystatechange=function()
            {
                if (ajax.readyState==4)
                {
                    var rps   = ajax.responseText.split("|");    
                    var error = rps[0]; //1 (OK) - 0 (ERROR)
                    var mjs   = rps[1];
                   if(error == 0)
                    {                           
                        swal({
                            title: "ERROR",
                            icon:  "error",
                            text:  mjs,
                        });                                                        
                    }
                    else
                    {
                        swal("Enhorabuena el mensaje ha sido enviado con éxito", {
                            icon: "success",
                        }); 
                        document.getElementById('ms1').value='';
                        document.getElementById('ms2').value='';
                        document.getElementById('ms3').value='';
                        document.getElementById('ms4').value='';
                        document.getElementById('ms5').value='';
                        document.getElementById('ms6').value='';
                        document.getElementById('ms7').value=''; 
                    }

                }
            }
            ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            ajax.send(cadena)    
        }
        else {
            swal("Mensaje no enviado",{
                icon: "error",
            });
        }
    });
}  



function objetoAjax()
{
    try
    {
        req = new XMLHttpRequest(); /* p.e. Firefox */
    }
    catch(err1)
    {
        try
        {
            req = new ActiveXObject('Msxml2.XMLHTTP'); /* algunas versiones IE */
        }
        catch (err2)
        {
            try
            {
                req = new ActiveXObject("Microsoft.XMLHTTP"); /* algunas versiones IE */
            }
            catch (err3)
            {
                req = false;
            }
        }
    }
    return req;
}
/*function mostrarpdf(archivo)
{
  ajax=objetoAjax();
  ajax.open("POST", "verPdf.php", true);
  ajax.onreadystatechange = function(){
    if(ajax.readyState == 4 && ajax.status == 200)
    {
      var response = ajax.responseText;
      //alert(response);
      $(document).ready(function(){
      	Loading();
        $('center').html('<embed src="images/pdf/Transparencia/'+response+'" width="100%" height="100%" id="emb" />');
        });
    }
  };
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  ajax.send("archivo="+archivo);
}*/
function mostrarpdf(archivo,year,mes,tipo)
{
    var ruta='';
    
    
    ruta = year+'/'+mes+'/'+tipo+'/'+archivo;
 
    $(document).ready(function()
                      {
        //web
        var html = '<embed src="../images/pdf/Transparencia/'+ruta+'" width="100%" height="100%" id="emb" type="application/pdf"/>';
        //localhost
        //var html = '<embed src="images/pdf/Transparencia/'+ruta+'" width="100%" height="100%" id="emb" type="application/pdf"/>';
        Loading();
        $('#panel').html(html);
    });
}

function mostrarpdf2(archivo)
{
    var ruta='';
    
    ruta = 'costos/'+archivo;
              
    $(document).ready(function()
                      {
        //web
        var html = '<embed src="../images/pdf/Transparencia/'+ruta+'" width="100%" height="100%" id="emb" type="application/pdf"/>';
        //localhost
        //var html = '<embed src="images/pdf/Transparencia/'+ruta+'" width="100%" height="100%" id="emb" type="application/pdf"/>';
        Loading();
        $('#panel').html(html);
    });
}

function Loading()
{
    jQuery().ready(function ()
                   {
        EasyLoading.show(
            {
                type: EasyLoading.TYPE["LINE_SCALE_PULSE_OUT_RAPID"],
                text: "Cargando",
                timeout: 500
            })
    });
}
//<!--deshabilitar ctrl+u -->
//Este script permite deshabilitar:
// El Ctrl + N y Ctrl + U
var controlprecionado = 0;
function desactivarCrlAlt(teclaactual)
{
    var desactivar = false;
    if (controlprecionado==17)
    {
        if (teclaactual==78 || teclaactual==85 )
        {
            desactivar=true;
        }
    }
    if (teclaactual==17)controlprecionado=teclaactual;
    if (teclaactual==18)altprecionado=teclaactual;
    return desactivar;
}

document.onkeydown = function()
{
    //alert(window.event.keyCode);
    if (window.event && desactivarCrlAlt(window.event.keyCode))
    {
        return false;
    }

    document.onkeydown = function(e)
    {
        if (e.ctrlKey &&(e.keyCode === 85 ))
        {
            return false;
        }
    }
}
