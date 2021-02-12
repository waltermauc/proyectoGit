function buscarPorDes() {
    var des = document.getElementById("des").value
    var loc = location.pathname
    if (des == "") {
        if (loc == "/examen/admin/vista/user/mensajesen.php") {
            location.href = "mensajesen.php";
        } else if (loc == "/examen/admin/vista/user/index.php") {
            location.href = "index.php";
        }
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 & this.status == 200) {
                //alert("llegue");
                document.getElementById("tbl").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../../controladores/user/buscar.php?des=" + des + "&url=" + loc, true);
        xmlhttp.send();
    }
    return false;
}