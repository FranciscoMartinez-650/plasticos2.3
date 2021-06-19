<?php
	require '../conexion/cn.php';
	
	$sql = "SELECT * FROM plastico";
	$resultado = $conexion->query($sql);
	$row = $resultado->fetch_assoc();
?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../css/miPerfil.css">
	</head>
	
	<body>
		
		<div class="container">
			<div class="row">
				<a href="nuevo.php" class="btn btn-primary">Nuevo Registro</a>
			</div>
</br>
			<div class="row table-responsive">
				<table id="customers">
					<thead>
						<tr>
							<th>Tipo de plasticos</th>
							<th>Cantidad en gramos</th>
							<th>Kilos por dia</th>
							<th>Fecha</th>
							<th>Total por semana</th>
							<th>¿Solo uso?</th>
							<th>Modificar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								
								<td><?php echo $row['tipo_plastico']; ?></td>
								<td><?php echo $row['cantidad_gramos']; ?></td>
								<td><?php echo $row['kilos_dia']; ?></td>
								<td><?php echo $row['fecha']; ?></td>
								<td><?php echo $row['total_semana']; ?></td>
								<td><?php echo $row['solo_uso']; ?></td>
								<td><a href="modificar.php?id=<?php echo $row['id_plasticos']; ?>" class="btn btn-warning">Modificar</a></td>
								<td><a href="eliminar.php?id=<?php echo $row['id_plasticos']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
		
	</body>
</html>