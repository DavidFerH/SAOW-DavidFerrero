<?php
    include ('./AuthorUtils.php');
    include './ConectionCredentials.php';

    $authorUtils = new AuthorUtils();

    $IDautor = $_REQUEST['IDautor'];
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
        
        $query = "select * from autor where DNI = '$IDautor'";
        $data = mysqli_query($mysqli, $query);
        $data = $data->fetch_assoc();

        mysqli_close($mysqli);
    ?>

    <!-- Edit article -->
    <h3 class="text-center mt-4">Formulario para modificar un autor</h3>
    <!-- Form to add a new article -->
    <form class="row needs-validation justify-content-center mt-4" action="./processModifyAuthor.php" method="post">
        <div class="col-4">
            <input type="text" class="form-control" name="DNI" value="<?php echo $data['DNI'] ?>" aria-label="DNI" required>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" name="nombre" value="<?php echo $data['NOMBRE'] ?>" aria-label="Nombre" required>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" name="apellidos" value="<?php echo $data['APELLIDOS'] ?>" aria-label="Apellidos" required>
        </div>
        <div class="col-8 mt-2">
            <div class="form-floating">
                <textarea class="form-control" name="descripcion" id="descripcion" style="height: 400px" required><?php echo $data['DESCRIPCION'] ?></textarea>
                <label for="floatingTextarea2">Descripcion del autor</label>
            </div>
        </div>
        <div class="col-3 mt-2"></div>
        <div class="col-4">
            <button type="submit" class="btn submitBtn">Enviar</button>
        </div>
    </form>
    <form action="./deleteAuthor.php" method="post">
        <div class="col-1 mt-2">
            <input type="hidden" name="DNI" value="<?php echo $data["DNI"] ?>">
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-danger">Eliminar autor</button>
        </div>
    </form>

    <!-- Bootstrap JavaScript with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>