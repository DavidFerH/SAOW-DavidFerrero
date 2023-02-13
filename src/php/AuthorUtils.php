<?php
    class AuthorUtils {
        public function CreateAuthor($dni, $nombre, $apellidos, $descripcion) {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "INSERT INTO autor(DNI, NOMBRE, APELLIDOS, DESCRIPCION) VALUES ('$dni','$nombre','$apellidos','$descripcion')";
            mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
        }
    }
?>