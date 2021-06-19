<?php
    session_start();
    include("../Conexion/cn.php");
    if(isset($_POST['txtUsuario'])){
        $usuario = $_POST['txtUsuario'];
        $sql = "SELECT contrasena FROM usuarios WHERE usuario = '$usuario'";
        $f = mysqli_query($conexion, $sql);
        $a = mysqli_fetch_assoc($f);
        if(! $a){
            echo 'No existe el usuario';
        }
        else{
            echo 'Tu contraseña es '.$a['contrasena'];
        }
    }
    
?>