<?php

$carpeta = "archivos/";

if (isset($_FILES["archivo"])) {

    $archivo = $_FILES["archivo"];

    // Comprobar que no haya errores
    if ($archivo["error"] == 0) {

        // Obtener extensión
        $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));

        // Tipos permitidos
        $permitidos = ["jpg", "jpeg", "png", "pdf"];

        if (in_array($extension, $permitidos)) {

            // Cambiar nombre para evitar archivos repetidos
            $nombre = uniqid() . "." . $extension;

            // Guardar archivo
            if (move_uploaded_file($archivo["tmp_name"], $carpeta . $nombre)) {

                echo "<h2>Archivo subido correctamente.</h2>";
                echo "<a href='index.html'>Volver</a>";

            } else {

                echo "<h2>Error al guardar el archivo.</h2>";
            }

        } else {

            echo "<h2>Error: tipo de archivo no permitido.</h2>";
            echo "<p>Solo se permiten JPG, PNG y PDF.</p>";
            echo "<a href='index.html'>Volver</a>";
        }

    } else {

        echo "<h2>Error al subir el archivo.</h2>";
        echo "<a href='index.html'>Volver</a>";
    }

} else {

    echo "<h2>No seleccionaste ningún archivo.</h2>";
    echo "<a href='index.html'>Volver</a>";
}

?>