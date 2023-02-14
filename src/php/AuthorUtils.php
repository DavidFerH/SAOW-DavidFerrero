<?php
    class AuthorUtils {
        public function CreateAuthor($dni, $nombre, $apellidos, $descripcion) {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "INSERT INTO autor(DNI, NOMBRE, APELLIDOS, DESCRIPCION) VALUES ('$dni','$nombre','$apellidos','$descripcion')";
            mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
        }

        public function UpdateAuthor($DNI, $nombre, $apellidos, $descripcion) {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "UPDATE autor set NOMBRE = '$nombre', APELLIDOS = '$apellidos', DESCRIPCION = '$descripcion' WHERE DNI = '$DNI'";
            mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
        }
        
        public function DeleteAuthor($DNI) {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "DELETE FROM autor WHERE DNI = $DNI";
            mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
        }
    }
?>