<?php
    include './src/php/ConectionCredentials.php'
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revista online UI1</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./src/images/favicon.png">
    <!-- Bootstrap 5 CSS stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="./src/css/entries.css">
</head>
<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="./src/images/logo.png" alt="Logo" style="width: 50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="createEntry.php">Publicar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Publicaciones</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="entries.php">Articulos</a></li>
                            <li><a class="dropdown-item" href="magazines.php">Revistas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid articlesMainContainer">
        <div class="row justify-content-center mt-4">
            <div class="col-8">
            <?php
                $mysqli = mysqli_connect($server, $user, $password, $DDBB) or die("Error on conection: " . mysqli_connect_error());
                
                $query = "SELECT * FROM articulos";
                $articulos = mysqli_query($mysqli, $query);
                
                while($articulo = $articulos->fetch_assoc()) {
                    $cod_art = $articulo['COD_ART'];
                    $titulo = $articulo['TITULO'];
                    $contenido = $articulo['CONTENIDO'];

                    $query = "SELECT * FROM autor_articulos WHERE COD_ART = $cod_art";
                    $autor_articulos = mysqli_query($mysqli, $query);
                    $autor_articulos = $autor_articulos->fetch_assoc();

                    $idAutor = $autor_articulos['DNI'];
                    $fechaPub = $autor_articulos['FECHA_PUB'];

                    $query = "SELECT * FROM autor WHERE DNI = '$idAutor'";
                    $autor = mysqli_query($mysqli, $query);
                    $autor = $autor->fetch_assoc();

                    $nombreAutor = $autor['NOMBRE'];
                    $apellidosAutor = $autor['APELLIDOS'];


                    echo "<div class='articleContainer'>" . 
                        "<h4>Titulo - " . $titulo . "<h4>" .
                        "<p>" . $contenido . "</p>" .
                        "<p>" . $nombreAutor . " " . $apellidosAutor . "</p>" . 
                        "<p>" . $fechaPub . "</p>"
                    . "</div>";
                }

                mysqli_close($mysqli);
            ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>