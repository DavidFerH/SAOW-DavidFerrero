<?php
    include ('./MagazineUtils.php');
    include './ConectionCredentials.php';

    $magazineUtils = new MagazineUtils();

    $IDmagazine = $_REQUEST['IDmagazine'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revista online UI1</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <!-- Bootstrap 5 CSS stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="../css/modifyArticle.css">
</head>
<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php"><img src="../images/logo.png" alt="Logo" style="width: 50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../createEntry.php">Publicar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Publicaciones</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../../entries.php">Articulos</a></li>
                            <li><a class="dropdown-item" href="../../magazines.php">Revistas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php                                        
        $mysqli = mysqli_connect($server, $user, $password, $DDBB) or die("Error on conection: " . mysqli_connect_error());
        
        $query = "SELECT * FROM revistas WHERE COD_REV = $IDmagazine";
        $data = mysqli_query($mysqli, $query);
        $data = $data->fetch_assoc();

        $COD_REV = $data['COD_REV'];

        mysqli_close($mysqli);
    ?>

    <!-- Edit article -->
    <h3 class="text-center mt-4">Formulario para modificar una revista</h3>
    <!-- Form to add a new article -->
    <form class="row needs-validation justify-content-center mt-4" action="./processModifyMagazine.php" method="post" enctype="multipart/form-data">
        <!-- Name and surname of the author -->
        <div class="col-4">
            <input type="text" class="form-control" name="title" value="<?php echo $data['TITULO'] ?>" aria-label="Titulo" required>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" name="editorial" value="<?php echo $data['EDITORIAL'] ?>" aria-label="Editorial" required>
        </div>
        <div class="col-3">
            <input type="number" class="form-control" name="number" value="<?php echo $data['NUMERO'] ?>" aria-label="Numero" required>
        </div>
        <div class="col-4 mt-2">
            <input type="date" class="form-control" name="publicationDate" value="<?php echo $data['FECHA'] ?>" aria-label="Fecha de publicacion" required>
        </div>
        <div class="col-7 mt-2">
        <input type="hidden" name="COD_REV" value="<?php echo $data["COD_REV"] ?>">
        </div>
        <div class="col-4 mt-2">
            <input type="file" class="form-control" name="coverImage" placeholder="Portada" aria-label="Portada" disabled>
        </div>
        <div class="col-7 mt-2"></div>
        <div class="col-4">
            <button type="submit" class="btn submitBtn">Enviar</button>
        </div>
    </form>

    <h4 class="mt-4">Listado de articulos pertenecientes a la revista</h4>
    <ul>
        <?php
            $mysqli = mysqli_connect($server, $user, $password, $DDBB) or die("Error on conection: " . mysqli_connect_error());
        
            $query = "SELECT * FROM articulos WHERE COD_REV = $COD_REV";
            $articles = mysqli_query($mysqli, $query);
    
            mysqli_close($mysqli);

            while($article = $articles->fetch_assoc()) {
                echo "<li>" . $article['TITULO'] ."</li>";
            }
        ?>
    </ul>

    <form action="./linkArticleMagazine.php" method="post">
        <div class="col-5">
            <label for="articles">Seleccione el artículo a enlazar</label>
            <select id="articles" class="form-select" name="COD_ART" aria-label="Default select example">
                <?php
                    $mysqli = mysqli_connect($server, $user, $password, $DDBB) or die("Error on conection: " . mysqli_connect_error());
                    
                    $query = "SELECT * FROM articulos";
                    $articulos = mysqli_query($mysqli, $query);
        
                    mysqli_close($mysqli);
                    
                    while($articulo = $articulos->fetch_assoc()) {
                        echo "<option value=". $articulo['COD_ART'] .">" . $articulo['TITULO'] . "</option>";
                    }
                ?>
            </select>
        </div>
        <div class="col-1 mt-2">
            <input type="hidden" name="COD_REV" value="<?php echo $data["COD_REV"] ?>">
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-danger">Agregar a la revista</button>
        </div>
    </form>

    <form action="./deleteMagazine.php" method="post">
        <div class="col-1 mt-2">
            <input type="hidden" name="COD_REV" value="<?php echo $IDmagazine ?>">
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-danger">Eliminar revista</button>
        </div>
    </form>

    <!-- Bootstrap JavaScript with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>