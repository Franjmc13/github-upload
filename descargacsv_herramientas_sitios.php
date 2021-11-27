<?php 
	/// Conexión a la BD ///
	require "conexion.php";
	$herramientas="SELECT * FROM herramientas";
	$resHerramientas=$conexion->query($herramientas);
?>

<html lang="es">
	<head>
		<title>Descargar reporte CSV por Categorias</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div align="center">
		<header>
			<h2>Descargar reporte CSV por Categorias</h2>
		</header>
		<section>
			<table>
				<tr>
					<th>Categoria</th>
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Medida</th>
					<th>Cantidad</th>
					<th>Sitio</th>
				</tr>
				<?php 
					while($registroHerramientas = $resHerramientas->fetch_array(MYSQLI_BOTH))
					{
						echo'<tr>
							<td>'.$registroHerramientas['Categoria'].'</td>
							<td>'.$registroHerramientas['Tipo'].'</td>
							<td>'.$registroHerramientas['Nombre'].'</td>
							<td>'.$registroHerramientas['Marca'].'</td>
							<td>'.$registroHerramientas['Medida'].'</td>
							<td>'.$registroHerramientas['Cantidad'].'</td>
							<td>'.$registroHerramientas['Sitio'].'</td>
							</tr>';
					}
				 ?>
			</table>
		</section>
		<!-- Formulario -->
		<form method="post" action="reporte.php">
			<input required name="Categoria" placeholder="Categoria"/>
			<input type="submit" name="generar_reporte">
		</form>
		<br>
		</div>
	</body>
</html> 
