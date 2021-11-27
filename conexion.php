<?php
 $servidor="localhost";
 $usuario="itesmeit_itesmei";
 $clave="^5zE]hcvfLRc";
 $base="itesmeit_taller";
 $conexion = mysqli_connect($servidor,$usuario,$clave,$base);
 if($conexion -> connect_errno)
 {
 	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion->mysqli_connect_error());
 }
?>
