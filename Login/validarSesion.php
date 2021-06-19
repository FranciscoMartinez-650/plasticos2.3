<?php
    require '../conexion/cn.php';
    session_start();
    if(isset($_POST["txtUsuario"]) && isset(["txtPassword"])){
        
    $usuario = $_POST['txtUsuario'];
    $clave = $_POST['txtPassword'];
        
    $query = "SELECT COUNT(*) as contar from Usuarios where usuario = '$usuario' and contrasena = '$clave'";
    $consulta = mysqli_query($conexion, $query);
    $array = mysqli_fetch_array($consulta);
        var_dump($array);
    if($array['contar'] > 0){
        $_SESSION['usuario'] = $usuario; 
        header("location: ../menu/menu.php");
    }
    else{
        echo("algo salio mal xD");
        //header("location: login.php");
    }
   //$_SESSION('<script> alert("Error, datos erroneos");</script>');
}
?>