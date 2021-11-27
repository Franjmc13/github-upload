<?php
require "conexion.php";
$sitios="SELECT * FROM sitios";
$resSitios=$conexion->query($sitios);
?>

<html lang="es">
	<head>
		<title>
			Mostrar Sitios
		</title>
</head>
	<body>
		<header>
			<h2 align=center>
				Mostrar Sitios
			</h2>
		</header>
		<table align=center>
			<tr>
				<th>Sitio</th>
				<th>Condicion</th>
			</tr>
			<?php 
			while($registroSitios = $resSitios->fetch_array(MYSQLI_BOTH))
			{
				echo'<tr>
				<td>'.$registroSitios['Sitio'].'</td>
				<td>'.$registroSitios['Condicion'].'</td>
				</tr>';
			}
			 ?>
		</table>
		<br>
	</body>
</html> 
