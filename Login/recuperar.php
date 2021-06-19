<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperacion de contraseña</title>

<body>
    <form action="contrasena.php" method="post">
        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" autofocus="autofocus"
            placeholder="Escribe tu usuario">
        <input type="submit" class="btn btn-success btn-block" value="Recuperar" name="buscar" />
    </form>
</body>

</html>