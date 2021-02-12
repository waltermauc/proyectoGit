<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Banquito</title>
</head>

<body>
    <?php
    session_start();
    $_SESSION['isLogged'] = FALSE;
    session_destroy();
    header("Location: ../index.html");  ?>
    ?>
</body>

</html>