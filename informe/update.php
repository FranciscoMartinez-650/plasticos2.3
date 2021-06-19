<?php
	
	require '../conexion/cn.php';
	
	if(isset($_POST['actualizar'])){
		$id = $_GET['id'];
		$plastico = $_SESSION['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $fecha = $_POST['fecha'];
        $semana = $_POST['semana'];
		$hijos = $_POST['hijos'];
		$sql = "UPDATE plastico SET tipo_plastico='$plastico', cantidad_gramos='$email', kilos_dia='$telefono', fecha='$fecha', total_semana='$semana', solo_uso='$hijos' WHERE id_plasticos = '$id'";
		mysqli_query($conexion, $sql);
		header("location: index.php");
	}else{
		echo "<script> alert('Ocurrio un error'); </script>";
	}
	
	
?>