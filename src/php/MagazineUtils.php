<?php
    class MagazineUtils {
        public function createMagazine($title, $number, $editorial, $date, $coverPath) {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "INSERT INTO revistas(TITULO, NUMERO, EDITORIAL, FECHA, PORTADA) VALUES ('$title', $number, '$editorial', '$date', '$coverPath')";
            mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
        }

        public function deleteMagazine($COD_REV) {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "DELETE FROM revistas WHERE COD_REV = $COD_REV";
            mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
        }

        public function UpdateMagazine($COD_REV, $title, $editorial, $number, $FECHA_PUB) {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "UPDATE revistas set TITULO = '$title', EDITORIAL = '$editorial', NUMERO = '$number', FECHA = '$FECHA_PUB' WHERE COD_REV = $COD_REV";
            mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
        }

        public function linkArticleToMagazine($COD_REV, $COD_ART) {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "UPDATE articulos set COD_REV = $COD_REV WHERE COD_ART = $COD_ART";
            mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
        }
    }
?>