<?php
	
	require '../conexion/cn.php';

	if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['telefono']) && isset($_POST['fecha']) && isset($_POST['semana'])&& isset($_POST['hijos'])){
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $email = mysqli_real_escape_string($conexion, $_POST['email']);
        $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
        $fecha = mysqli_real_escape_string($conexion, $_POST['fecha']);
        $semana = mysqli_real_escape_string($conexion, $_POST['semana']);
        $hijos = mysqli_real_escape_string($conexion, $_POST['hijos']);
        $sql = "SELECT * FROM plastico where fecha = '$fecha'";
        $resultado = $conexion -> query($sql);

        $filas = $resultado ->num_rows;
        if($filas > 0){
            $_SESSION['Mensaje'] = ' ';
            header('location: nuevo.php');
        }
        else{
            $sql = "INSERT INTO plastico (tipo_plastico, cantidad_gramos, kilos_dia,fecha,total_semana,solo_uso) VALUES ('$nombre', '$email','$telefono','$fecha','$semana', '$hijos')";
            $resultado = $conexion -> query($sql);
            if($resultado > 0){
                $_SESSION['exito'] = 'Has sido registrado';
                header('location: nuevo.php');
            }
            else{
                $_SESSION['error'] = 'Error al registrar';
                header('location: registrar.php');
            }
        }
    }
?>
 
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>