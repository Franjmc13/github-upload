<?php
require "conexion.php";
$Sitios="SELECT * FROM sitios";
$resSitios=$conexion->query($Sitios);
?>
<html lang="es">
	<head>
		<title>
			Insertar Sitios 
		</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<header>
			<h2 align=center>
				Insertar Sitios
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
		<form method="post">
			<h3 align = center> Agregar Nuevo Sitio </h3>
			<table align = center>
				<tr>
					<td><input required name="Sitio" placeholder="Sitio"/></td>
					<td><input required name="Condicion" placeholder="Condicion"/></td>
				</tr>
			</table>
			<div align = center>
					<input type="submit" name="insertar" value="Insertar Sitio"/>
			</div>
		</form>
		<?php 
			if(isset($_POST['insertar']))
			{
				$sit = $_POST['Sitio'];
				$cond = $_POST['Condicion'];
				mysqli_query($conexion,"insert into sitios (Sitio, Condicion) 
					values ('$sit', '$cond')") or die (mysqli_error($conexion));
				header ("location:insertar_sitios.php");
			}
		?>
	</body>
</html>
