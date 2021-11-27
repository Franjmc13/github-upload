<?php
	/// Inluir la conexión a la BD ///
	require "conexion.php";
	/// Consultar la BD ///
	$herramientas="SELECT * FROM herramientas";
	$resHerramientas=$conexion->query($herramientas);

	$categoria=$_POST['Categoria'];
	if(isset($_POST['generar_reporte']))
	{
		//// Nombre del archivo 
		header('Content-Type:text/csv; charset=latin1');
		header('Content-Disposition: attachment; filename="Reporte_Herramientas.csv"');
		/// Salida del archivo
		$salida = fopen('php://output','w');
		// Encabezados
		fputcsv($salida, array('Categoria','Tipo','Nombre','Marca','Medida','Cantidad','Sitio'));
		/// Query para el reporte 
		$reporteCSV=$conexion->query("SELECT * FROM herramientas WHERE Categoria = '$categoria'");
		while($filaR = $reporteCSV->fetch_assoc())
			fputcsv($salida,array($filaR['Categoria'],
									$filaR['Tipo'],
									$filaR['Nombre'],
									$filaR['Marca'],
									$filaR['Medida'],
									$filaR['Cantidad'],
									$filaR['Sitio']));
	}
?>
