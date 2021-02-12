function comprobar(obj)
{   
    if (obj.checked)
        document.getElementById('Submit').disabled = false;
    else
        document.getElementById('Submit').disabled = true;
}