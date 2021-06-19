    <!-- Iniciar una nueva sesión o reanudar la existente-->
    <?php
//session_start();
//if(!isset($_SESSION['Autenticado'])){
//    header("location: Login.php?status=500");
//}
include "../Conexion/cn.php";
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Informe</title>
        <?php
include "../Layout/estilos.php";
?>
    </head>

    <body>
        <?php
include "../Layout/header.php";
?>
        <?php

//AQUI VAMOS A PROGRAMAR LA PARTE DE LA CARGA DE LA INFORMACION ALMACENADA
/*             if(!isset($_GET['Id'])){

$cmd = $conexion->prepare("select * from Cafeticultor where id_Agricultor=?");
$cmd->bind_param("i",$id_Agricultor);
$cmd->execute();
$cmd->bind_result($id_Agricultor,$nombre,$apepat,$apemat,$numeroCel);
$cmd->store_result();
$cmd->fetch();
$cmd->close();
} */
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * FROM informacion WHERE id_usuario = $id";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_array($resultado);
        $idUsuario = $fila['id_usuario'];
        $nombre = $fila['nombre'];
        $apepat = $fila['apepat'];
        $apemat = $fila['apemat'];
        $numeroCel = $fila['numeroCel'];
        $usuario = $fila['usuario'];
        $pwd = $fila['contrasena'];
    }
}

?>

        <ul>
            <!---->
            <!-- <form class="container" method="post" action="Actualizar.php">
                    <div class="col-md-4">
                        <label>Nombre </label>
                        <input type="text" name="txtnombre" id="" class="form-control" value="">
                    </div>
                    </br></br>
                    <div class="col-md-4">
                        <label>Apellido Paterno</label>
                        <input type="text" name="txtapepat" id="" class="form-control" value="">
                    </div>
                    </br></br>
                    <div class="col-md-4">
                        <label>Apellido Materno</label>
                        <input type="text" name="txtapemat" id="" class="form-control" value="">
                    </div>
                    </br></br>
                    <div class="col-md-4">
                        <label>Numero Celular</label>
                        <input type="text" name="txtNum" id="" class="form-control" value="">
                    </div>
                </div>
                </div> -->
                <div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="Actualizar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="txtNombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar nombre">
                    </div>
                    <div class="form-group">
                    <input type="text" name="txtApepat" value="<?php echo $apepat ?>" class="form-control" placeholder="Actualizar apellido paterno">
                    </div>
                    <div class="form-group">
                    <input type="text" name="txtApemat" value="<?php echo $apemat ?>" class="form-control" placeholder="Actualizar apellido materno">
                    </div>
                    <div class="form-group">
                    <input type="text" name="txtNumCel" value="<?php echo $numeroCel ?>" class="form-control" placeholder="Actualizar numero de celular">
                    </div>
                    <div class="form-group">
                    <input  href="Informacion.php"type="submit" value="Actualizar" class="btn btn-success" name="actualizar">
                    <input  href="Informacion.php"type="submit" value="Regresar" class="btn btn-danger" name="regresar">
                    </div>
                    <!-- <button href="Info/Informacion.php" class="btn btn-danger">Regresar</button> -->

                </form>
            </div>
        </div>
    </div>
</div>
                <br />
                <p>
                    <center>
                        <!-- <input  href="Informacion.php"type="submit" value="Actualizar" class="btn btn-success">
                        <input  href="Informacion.php"type="submit" value="Regresar" class="btn btn-success"> -->
                        <!--<a href="../Info/Informacion.html" class="btn btn-dark">Pagina Principal</a>-->
                    </center>
                </p>
                </br></br></br></br>
            </form>
            <?php include "../Layout/scripts.php";
?>

            <!--$_SESSION-->

    </body>

    </html>