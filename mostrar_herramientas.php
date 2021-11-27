<?php
require "conexion.php";
$herramientas="SELECT * FROM herramientas";
$resHerramientas=$conexion->query($herramientas);
?>

<html lang="es">
<head>
	<title>
		Mostrar Herramientas
	</title>
</head>
<body>
	<header>
		<h2 align="center">
			Mostrar Herramientas
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
			</tr>';
		}
		?>
	</table>
	<br>
</body>
</html>z
