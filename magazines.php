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
    <link rel="stylesheet" href="./src/css/magazines.css">
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

    <div class="container-fluid magazinesMainContainer">
        <div class="row justify-content-center mt-4">
            <div class="col-8">
            <?php
                $mysqli = mysqli_connect($server, $user, $password, $DDBB) or die("Error on conection: " . mysqli_connect_error());
                
                $query = "SELECT * FROM revistas";
                $revistas = mysqli_query($mysqli, $query);
                
                while($revista = $revistas->fetch_assoc()) {
                    $cod_rev = $revista['COD_REV'];
                    $titulo = $revista['TITULO'];
                    $numero = $revista['NUMERO'];
                    $portada = $revista['PORTADA'];

                    $query = "SELECT * FROM articulos WHERE COD_REV = $cod_rev";
                    $articulos = mysqli_query($mysqli, $query);

                    echo "<div class='magazineContainer'>" .
                        "<img src=" . $portada . ">" . 
                        "<h4>$titulo</h4>".
                        "<h5>Articulos relacionados: </h5>"
                        ?> <ul>
                        <?php
                            while($articulo = $articulos->fetch_assoc()) {
                                echo "<li>" . $articulo['TITULO'] . "</li>";
                            }
                        ?>
                    </ul>
                    </div>
                    <?php
                    
                }

                mysqli_close($mysqli);
            ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>