<?php
    include("../conexion/cn.php");
    session_start();
/*     $nombre = mysqli_real_escape_string($conexion, $_POST['txtUsuario']);
    $password = mysqli_real_escape_string($conexion, $_POST['txtPassword']);
    $passwordEncriptada = sha1($password);
    $cmd = $conexion->prepare("select * from cafeticultor ".
    " where usuario='$nombre' and pwd='$passwordEncriptada'");
    $cmd->bind_param("ss",$nombre,$passwordEncriptada);
    $cmd->execute();
    $cmd->store_result();
    $cmd->bind_result($usuario,$passwordEncriptada);
    $cmd->fetch();

    if($cmd->num_rows > 0){
       $_SESSION['autenticado'] = true;
       $_SESSION['usuario'] = $nombre;
       $_SESSION['IdUsuario'] = $Id;
       header("location: ../index.html");
    }
    else{
        //acción cuando es incorrecto
        header("location: Login.php?status=400");
    } */
/* 
    if(!empty($_POST)){
        $usuario = mysqli_real_escape_string($conexion, $_POST['txtUsuario']);
        $password = mysqli_real_escape_string($conexion, $_POST['txtPassword']);
        $sql = "SELECT id_Agricultor FROM Cafeticultor WHERE usuario = '$usuario' AND pwd = '$password'";
        $resultado = $conexion->query($sql);
        $rows = $resultado->num_rows;
        if($rows > 0){
            $row = $resultado->fetch_assoc();
            $_SESSION['idUsuario'] = $row['id_Agricultor'];
            echo "<script> alert('FUNCIONA!!!')</script>";
            header("Location: ../index.html");
        } 
        else{
            header("location: Login.php?status=400");

        }
    } */
    if(isset($_POST['user']) && isset($_POST['pass'])){
        $user = mysqli_real_escape_string($conexion, $_POST['user']);
        $pass = mysqli_real_escape_string($conexion, $_POST['pass']);
        $sql = "SELECT id_usuario FROM usuarios where usuario = '$user'";
        $resultado = $conexion -> query($sql);

        $filas = $resultado ->num_rows;
        if($filas > 0){
            $_SESSION['Mensaje'] = 'El usuario ya existe';
            header('location: login.php');
        }
        else{
            $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$user', '$pass')";
            $resultado = $conexion -> query($sql);
            if($resultado > 0){
                $_SESSION['exito'] = 'Has sido registrado';
                header('location: login.php');
            }
            else{
                $_SESSION['error'] = 'Error al registrarse';
                header('location: registrar.php');
            }
        }
    }
?>