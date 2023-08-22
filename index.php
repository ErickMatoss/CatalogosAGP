<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/navegador.css">
    <link rel="stylesheet" href="css/catalogos.css">

    <title>Catálogos AGP</title>
</head>
<body>
    <header>

    </header>
    <main>
        <?php 
            require "php/conexiondb.php";

            $clasificacion = "";
            $marca = "";

            if (isset($_POST['clasificacion'])) {
                $clasificacion = $_POST['clasificacion'];
            }

            if (isset($_POST['marca'])) {
                $marca = $_POST['marca'];
            }
            
            $consulta = "SELECT * FROM catalogos where clasificacion like '%$clasificacion%' and marca like '%$marca%' ";
            $resultado = mysqli_query($conexion, $consulta);
        ?>

        <nav class="navegador">
            <div class="navegador_logo">
                <img src="img/logoagp.png">
            </div>

            <div class="navegador_contenedor_opciones">
                <div class="navegador_opciones">
                    <div class="navegador_boton">Catálogos</div>
                </div>
                <div class="navegador_opciones">
                    <div class="navegador_boton">Directorio</div>
                </div>
            </div>
        </nav>

        <div class="contenido">
            <h1>Catálogos</h1>
            <div class="contenedor_catalogos">
                
                <form action="index.php" method="post" class="filtros_catalogos">
                    <div class="filtro">
                        <div>Clasificación</div>
                        <input type="text" name="clasificacion">
                    </div>
                    <div class="filtro">
                        <div>Marca</div>
                        <input type="text" name="marca">
                    </div>
                    <button type="submit">Buscar</button>
                </form>

                <table class="tabla_catalogos">
                    <thead>
                        <tr>
                            <th>Clasificación</th><th>Marca</th><th>URL</th><th>Archivo</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                    if ($resultado) {
                        while ($row = mysqli_fetch_assoc($resultado)) {?>
                        <tr>
                            <td><?php echo $row["clasificacion"] ?></td>
                            <td><?php echo $row["marca"] ?></td>
                            <td><a href="<?php echo $row["url"] ?>" target="_blanc" ><?php echo $row["url"] ?></a></td>
                            <td><a href="<?php echo 'http://192.168.1.11/catalogosagp/Catalogos/'.$row["clasificacion"].'/'.$row["archivo"] ?>" target="_blanc"><?php echo $row["archivo"] ?></a></td>
                        </tr>
                <?php
                    }
                        mysqli_free_result($resultado);
                    } else {
                        echo "Error en la consulta: " . mysqli_error($conexion);
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>