<?php
require "conexion.php";
$Sitios="SELECT * FROM sitios";
$resSitios=$conexion->query($Sitios);
?>

<html lang="es">
	<head>
		<title>
			Editar Sitios
		</title>
</head>
	</head>
	<body>
		<header>
			<h2 align=center>
				Editar Sitios
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
					<td><input name="sit['.$registroSitios['Sitio'].']" value="'.$registroSitios['Sitio'].'" readonly/></td> 
					<td><input name="cond['.$registroSitios['Sitio'].']" value="'.$registroSitios['Condicion'].'"/></td>
					</tr>';
				}
				 ?>
			</table>
			<div align="center">
				<input type="submit" name="actualizar" value="Actualizar los Sitios"/>
			</div>
		</form>
		<?php
			if(isset($_POST['actualizar']))
			{
				foreach ($_POST['sit'] as $idc)
				 {
					$editSit=mysqli_real_escape_string($conexion,$_POST['sit'][$idc]);
					$editCond=mysqli_real_escape_string($conexion,$_POST['cond'][$idc]);
					$actualizar=$conexion->query("UPDATE sitios SET Sitio='$editSit', Condicion='$editCond' WHERE Sitio='$idc'");
				}
				header ("location:actualizar_sitios.php");
			}
		?>
	</body>
</html> 
