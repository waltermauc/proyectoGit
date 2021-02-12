

 function validart(){
    var mont = document.getElementById('total').value;
    var montra = document.getElementById('ValorRetiro').value;
    if(montra > mont){
        alert('No se puede realisar esta transaccion');
    }
    alert('No se puede realisar esta transaccion');
    return false;
}

function buscarUsuario() {
    var cedula = document.getElementById("cedula").value;
    var cocaj = document.getElementById("codigoempleado").value;
    if (cedula == "" && cocaj == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");
            document.getElementById("informacion").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","../empleado/usuario.php?ced="+cedula+"&"+"cedu="+cocaj,true);
    
    xmlhttp.send();
    }
    return false;
}

function retiro() {
    var cedula = document.getElementById("cedula").value;
    var cocaj = document.getElementById("codigoempleado").value;
    if (cedula == "" && cocaj == "") {
        document.getElementById("opcion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }   
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");      
            document.getElementById("opcion").innerHTML = this.responseText;
        }
    };  
    xmlhttp.open("GET","../empleado/cajeraRetiro.php?ced="+cedula+"&"+"cedu="+cocaj,true);
    xmlhttp.send();
    }
    return false;
}

function deposito() {
    var cedula = document.getElementById("cedula").value;
    var cocaj = document.getElementById("codigoempleado").value;
    if (cedula == ""&& cocaj == "") {
        document.getElementById("opcion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");  
            document.getElementById("opcion").innerHTML = this.responseText;
        }
    };  
    xmlhttp.open("GET","../empleado/cajeraDeposito.php?ced="+cedula+"&"+"cedu="+cocaj,true);
    xmlhttp.send();
    }
    return false;
}