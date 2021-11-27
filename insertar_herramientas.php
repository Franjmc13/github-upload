<?php
require "conexion.php";
$herramientas="SELECT * FROM herramientas order by Nombre";
$resHerramientas=$conexion->query($herramientas);
?>
<html lang="es">
    <head>
        <title>
            Insertar Herramientas
        </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <header>
            <h2 align=center>
                Insertar herramienta en la BD 
            </h2>
        </header>
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
                </tr>';
            }
             ?>
        </table>    
        <form method="post">
            <h3 align = center> Agregar Nueva Herramienta </h3>
            <table align = center>
                <tr>
                    <td><input required name="Categoria" placeholder="Categoria"/></td>
                    <td><input required name="Tipo" placeholder="Tipo"/></td>
                    <td><input required name="Nombre" placeholder="Nombre"/></td>
                    <td><input required name="Marca" placeholder="Marca"/></td>
                    <td><input required name="Medida" placeholder="Medida"/></td>
                    <td><input required name="Cantidad" placeholder="Cantidad"/></td>
                    <td><input required name="Sitio" placeholder="Sitio"/></td>
                </tr>
            </table>
            <div align = center>
                    <input type="submit" name="insertar" value="Insertar Herramienta"/>
            </div>
        </form>
        <?php 
            if(isset($_POST['insertar']))
            {
                $cat = $_POST['Categoria'];
                $tip = $_POST['Tipo'];
                $nom = $_POST['Nombre'];
                $marc = $_POST['Marca'];
                $med = $_POST['Medida'];
                $cant = $_POST['Cantidad'];
                $sit = $_POST['Sitio'];
                mysqli_query($conexion,"insert into herramientas (Categoria, Tipo, Nombre, Marca, Medida, Cantidad, Sitio) 
                    values ('$cat', '$tip', '$nom', '$marc', '$med', '$cant', '$sit')") or die (mysqli_error($conexion));
                header ("location:insertar_herramientas.php");
            }
        ?>
    </body>
</html>
