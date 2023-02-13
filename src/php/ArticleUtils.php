<?php
    class ArticleUtils {
        public function QueryAuthors() {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "SELECT * FROM AUTOR";
            $autores = mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
            
            return $autores;
        }

        public function AddArticle($idAutor, $date, $title, $article) {
            include ('Conection.php');

            $mysqli = ddbbConection();

            $query = "INSERT INTO articulos(TITULO, CONTENIDO) VALUES ('$title','$article')";
            mysqli_query($mysqli, $query);

            $query = "SELECT COD_ART FROM articulos WHERE TITULO = '$title'";
            $COD_ART = mysqli_query($mysqli, $query);
            $COD_ART = $COD_ART->fetch_assoc();
            $COD_ART = $COD_ART["COD_ART"];

            $query  = "INSERT INTO autor_articulos(DNI, COD_ART, FECHA_PUB) VALUES ('$idAutor','$COD_ART','$date')";
            mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
        }

        public function QueryArticles() {
            include ('Conection.php');

            $mysqli = ddbbConection();
            
            $query = "SELECT * FROM articulos";
            $articulos = mysqli_query($mysqli, $query);

            mysqli_close($mysqli);
            
            return $articulos;
        }
    }
?>