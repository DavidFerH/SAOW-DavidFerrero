<?php
    class MagazineUtils {
        public function createMagazine($title, $number, $editorial, $date, $coverPath) {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "INSERT INTO revistas(TITULO, NUMERO, EDITORIAL, FECHA, PORTADA) VALUES ('$title', $number, '$editorial', '$date', '$coverPath')";
            mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
        }
    }
?>