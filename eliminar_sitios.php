<?php
require "conexion.php";
$Sitios="SELECT * FROM sitios";
$resSitios=$conexion->query($Sitios);
?>

<html lang="es">
	<head>
		<title>
			Eliminar Sitios
		</title>
</head>
	</head>
	<body>
		<header>
			<h2 align=center>
				Eliminar Sitios
			</h2>
		</header>
		<form method="post">
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
				<td><input type="checkbox" name="eliminar[]" value="'.$registroSitios['Sitio'].'"/></td>
				</tr>';
			}
			?>
		</table>
		<div align = "center">
			<input type="submit" name="borrar" value="Eliminar Sitios" onclick="reload()"/>
		</div>
		<?php 
			if(isset($_POST['borrar']))		
			{
				if(empty($_POST['eliminar']))
				{
					echo '<h2 align="center"> No se ha seleccionado ningún registro </h2>';
				}
				else
				{
					foreach ($_POST['eliminar'] as $id_borrar) 
					{
						$borrarGrupos = $conexion->query("DELETE FROM sitios WHERE Sitio='$id_borrar'");
					}
					header ("location:eliminar_sitios.php");
				}
			}
		?>
	</form>
	</body>
</html> 
