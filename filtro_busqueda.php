<?php
require "conexion.php";
$where="";
$categoria="";
$limit="";
if (isset($_POST['buscar']))
{
	$categoria=$_POST['xcategoria'];
	$limit=$_POST['xregistros'];
	if(empty($_POST['xcategoria']))
	{
		$where="where Categoria like '".$categoria."%'";
	}
	else
	{
		$where="where Categoria like '".$categoria."%'";
	}

}
$herramientas="SELECT * FROM herramientas $where $limit";
$resCategoria=$conexion->query($herramientas);
if(mysqli_num_rows($resCategoria)==0)
{
	$mensaje="<h1>NO hay registros que coincidan con su criterio de búsqueda</h1>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title> Filtro de búsqueda </title>
</head>
<body>
	<div align="center">
	<header>
		Filtro de búsqueda
	</header>
	<section>
		<form method="post">
			<input type="text" placeholder="Categoria..." name="xcategoria">
			<select name="xregistros">
				<option value="limit 1">1</option>
				<option value="limit 3">3</option>
				<option value="limit 6">6</option>
				<option value="limit 9">9</option>
			</select>
			<button name="buscar" type="submit">Buscar</button>
		</form>
		<br>
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
				while($registroCategorias = $resCategoria->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						<td>'.$registroCategorias['Categoria'].'</td>
						<td>'.$registroCategorias['Tipo'].'</td>
						<td>'.$registroCategorias['Nombre'].'</td>
						<td>'.$registroCategorias['Marca'].'</td>
						<td>'.$registroCategorias['Medida'].'</td>
						<td>'.$registroCategorias['Cantidad'].'</td>
						<td>'.$registroCategorias['Sitio'].'</td>
						</tr>';
				}
			?>
		</table>
	</section>
	</div>
</body>
</html>
