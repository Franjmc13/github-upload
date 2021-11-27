<?php
require "conexion.php";
$herramientas="SELECT * FROM herramientas";
$resHerramientas=$conexion->query($herramientas);
?>

<html lang="es">
    <head>
        <title>
            Actualizar Herramienta
        </title>
</head>
    </head>
    <body>
        <header>
            <h2 align=center>
                Actualizar Herramienta de la BD 
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
                    <td><input name="cat['.$registroHerramientas['Nombre'].']" value="'.$registroHerramientas['Categoria'].'"/></td>
                    <td><input name="tip['.$registroHerramientas['Nombre'].']" value="'.$registroHerramientas['Tipo'].'"/></td>
                    <td><input name="nom['.$registroHerramientas['Nombre'].']" value="'.$registroHerramientas['Nombre'].'" readonly/></td>
                    <td><input name="marc['.$registroHerramientas['Nombre'].']" value="'.$registroHerramientas['Marca'].'"/></td>
                    <td><input name="med['.$registroHerramientas['Nombre'].']" value="'.$registroHerramientas['Medida'].'"/></td>
                    <td><input name="cant['.$registroHerramientas['Nombre'].']" value="'.$registroHerramientas['Cantidad'].'"/></td>
                    <td><input name="sit['.$registroHerramientas['Nombre'].']" value="'.$registroHerramientas['Sitio'].'"/></td>
                    </tr>';
                }
                 ?>
            </table>
            <div align="center">
                <input type="submit" name="actualizar" value="Actualizar los registros"/>
            </div>
        </form>
        <?php
            if(isset($_POST['actualizar']))
            {
                foreach ($_POST['nom'] as $ids)
                 {
                    $editCat=mysqli_real_escape_string($conexion,$_POST['cat'][$ids]);
                    $editTip=mysqli_real_escape_string($conexion,$_POST['tip'][$ids]);
                    $editNom=mysqli_real_escape_string($conexion,$_POST['nom'][$ids]);
                    $editMarc=mysqli_real_escape_string($conexion,$_POST['marc'][$ids]);
                    $editMed=mysqli_real_escape_string($conexion,$_POST['med'][$ids]);
                    $editCant=mysqli_real_escape_string($conexion,$_POST['cant'][$ids]);
                    $editSit=mysqli_real_escape_string($conexion,$_POST['sit'][$ids]);
                    $actualizar=$conexion->query("UPDATE herramientas SET Categoria='$editCat', Tipo='$editTip', Nombre='$editNom', Marca='$editMarc', Medida='$editMed', Cantidad='$editCant', Sitio='$editSit' WHERE Nombre='$ids'");
                }
                header ("location:actualizar_herramientas.php");
            }
        ?>
    </body>
</html> 
