<?php
require "conexion.php";
$query = "SELECT herramientas.Categoria, herramientas.Tipo, herramientas.Nombre, herramientas.Marca, herramientas.Medida, herramientas.Cantidad, herramientas.Sitio FROM herramientas INNER JOIN sitios on herramientas.Sitio = sitios.Sitio";
$consulta=$conexion->query($query);
?>

<html lang="es">
<head>
	<title>
		Consulta de Herramientas
	</title>
</head>
<body>
	<header>
		<h2 align="center">
			Mostrar herramientas
		</h2>
	</header>
	<table align="center">
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
			while ($fila=$consulta->fetch_array())
			{
				echo '
					<tr>
						<td>'.$fila['Categoria'].'</td>
						<td>'.$fila['Tipo'].'</td>
						<td>'.$fila['Nombre'].'</td>
						<td>'.$fila['Marca'].'</td>
						<td>'.$fila['Medida'].'</td>
						<td>'.$fila['Cantidad'].'</td>
						<td>'.$fila['Sitio'].'</td>
					</tr>
				';
			}
		?>
	</table>
</body>
</html>
