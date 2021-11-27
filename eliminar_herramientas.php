<?php
require "conexion.php";
$herramientas="SELECT * FROM herramientas";
$resHerramientas=$conexion->query($herramientas);
?>

<html lang="es">
<head>
    <title>
        Eliminar Herramienta
    </title>
</head>
<body>
    <header>
            <h2 align=center>
                Eliminar herramienta de la BD 
            </h2>
        </header>
        <form method="post"> 
        <table align=center>
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
                <td><input type="checkbox" name="eliminar[]" value="'.$registroHerramientas['Nombre'].'"/></td>
                </tr>';
            }
            ?>
        </table>
        <div align = "center">
            <input type="submit" name="borrar" value="Eliminar Herramienta" onclick="reload()"/>
            <button> Actualizar </button>
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
                        $borrarHerramienta = $conexion->query("DELETE FROM herramientas WHERE Nombre='$id_borrar'");
                    }
                }
            }
        ?>
    </form>
</body>
</html>
