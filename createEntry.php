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
    <link rel="stylesheet" href="./src/css/createEntry.css">
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

    <!-- Nav Tab with forms -->
    <div class="container-fluid d-flex">
        <div class="row mt-3">
            <div class="col-12">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-article-tab" data-bs-toggle="pill" data-bs-target="#v-pills-article" type="button" role="tab" aria-controls="v-pills-article" aria-selected="true">Añadir articulo</button>
                        <button class="nav-link" id="v-pills-magazine-tab" data-bs-toggle="pill" data-bs-target="#v-pills-magazine" type="button" role="tab" aria-controls="v-pills-magazine" aria-selected="false">Añadir revista</button>
                        <button class="nav-link" id="v-pills-authors-tab" data-bs-toggle="pill" data-bs-target="#v-pills-authors" type="button" role="tab" aria-controls="v-pills-authors" aria-selected="false">Añadir autor</button>
                        <button class="nav-link" id="v-pills-manageArticles-tab" data-bs-toggle="pill" data-bs-target="#v-pills-manageArticles" type="button" role="tab" aria-controls="v-pills-manageArticles" aria-selected="false">Gestionar articulos</button>
                        <button class="nav-link disabled" id="v-pills-manageMagazines-tab" data-bs-toggle="pill" data-bs-target="#v-pills-manageMagazines" type="button" role="tab" aria-controls="v-pills-manageMagazines" aria-selected="false">Gestionar revistas</button>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- Tab pane to add an article -->
                        <div class="tab-pane fade show active" id="v-pills-article" role="tabpanel" aria-labelledby="v-pills-article-tab">
                            <h3>Formulario para añadir un nuevo artículo científico</h3>
                            <!-- Form to add a new article -->
                            <form class="row needs-validation justify-content-center mt-4" action="./src/php/addArticle.php" method="post">
                                <div class="col-5">
                                <label for="author">Seleccione el autor</label>
                                <select id="author" class="form-select" name="author" aria-label="Default select example">
                                    <?php
                                        include './src/php/ArticleUtils.php';
                                        $articleUtils = new ArticleUtils();
                                        
                                        $authors = $articleUtils->QueryAuthors();

                                        while($autor = $authors->fetch_assoc()) {
                                            echo "<option value=". $autor['DNI'] .">" . $autor['NOMBRE'] . " " . $autor['APELLIDOS'] . "</option>";
                                        }

                                        unset($articleUtils);
                                    ?>
                                </select>
                                    <!-- <input type="text" class="form-control" name="Autor" placeholder="Autor" aria-label="Autor" required> -->
                                </div>
                                <div class="col-5">
                                    
                                </div>
                                <div class="col-5 mt-2">
                                    <input type="date" class="form-control" name="publicationDate" placeholder="Fecha de publicacion" aria-label="Fecha de publicacion" required>
                                </div>
                                <div class="col-5 mt-2"></div>
                                <div class="col-10 mt-2">
                                    <input type="text" class="form-control" name="title" placeholder="Titulo del articulo" aria-label="Titulo del articulo" required>
                                </div>
                                <div class="col-10 mt-2">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="article" placeholder="Escriba aqui su articulo" id="content" style="height: 400px" required></textarea>
                                        <label for="floatingTextarea2">Cuerpo del articulo</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn submitBtn">Enviar</button>
                                </div>
                            </form>
                        </div>
                        <!-- Tab pane to add a magazine -->
                        <div class="tab-pane fade" id="v-pills-magazine" role="tabpanel" aria-labelledby="v-pills-magazine-tab">
                            <h3>Formulario para añadir una nueva revista científica</h3>
                            <!-- Form to add a new magazine -->
                            <form class="row needs-validation justify-content-center mt-4" action="./src/php/addMagazine.php" method="post" enctype="multipart/form-data">
                                <!-- Name and surname of the author -->
                                <div class="col-4">
                                    <input type="text" class="form-control" name="title" placeholder="Titulo" aria-label="Titulo" required>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="editorial" placeholder="Editorial" aria-label="Editorial" required>
                                </div>
                                <div class="col-3">
                                    <input type="number" class="form-control" name="number" placeholder="Numero" aria-label="Numero" required>
                                </div>
                                <div class="col-4 mt-2">
                                    <input type="date" class="form-control" name="publicationDate" placeholder="Fecha de publicacion" aria-label="Fecha de publicacion" required>
                                </div>
                                <div class="col-7 mt-2"></div>
                                <div class="col-4 mt-2">
                                    <input type="file" class="form-control" name="coverImage" placeholder="Portada" aria-label="Portada" required>
                                </div>
                                <div class="col-7 mt-2"></div>
                                <div class="col-4">
                                    <button type="submit" class="btn submitBtn">Enviar</button>
                                </div>
                            </form>
                        </div>
                        <!-- Tab pane to add an author -->
                        <div class="tab-pane fade" id="v-pills-authors" role="tabpanel" aria-labelledby="v-pills-authors-tab">
                            <h3>Formulario para añadir un nuevo autor</h3>
                            <!-- Form to add a new author -->
                            <form class="row needs-validation justify-content-center mt-4" action="./src/php/addAutor.php" method="post" enctype="multipart/form-data">
                                <!-- Name and surname of the author -->
                                <div class="col-4">
                                    <input type="text" class="form-control" name="DNI" placeholder="DNI" aria-label="DNI" required>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" aria-label="Nombre" required>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" aria-label="Apellidos" required>
                                </div>
                                <div class="col-8 mt-2">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="descripcion" placeholder="Escriba aqui su descripción" id="descripcion" style="height: 400px" required></textarea>
                                        <label for="floatingTextarea2">Descripcion del autor</label>
                                    </div>
                                </div>
                                <div class="col-3 mt-2"></div>
                                <div class="col-4">
                                    <button type="submit" class="btn submitBtn">Enviar</button>
                                </div>
                            </form>
                        </div>
                        <!-- Tab pane to manage articles -->
                        <div class="tab-pane fade" id="v-pills-manageArticles" role="tabpanel" aria-labelledby="v-pills-manageArticles-tab">
                            <h3>Formulario para modificar un artículo científico</h3>
                            <?php
                                include './src/php/ArticleUtils.php';
                                $articleUtils = new ArticleUtils();

                                $articles = $articleUtils->QueryArticles();

                                while($article = $articles->fetch_assoc()) {
                                    echo("Articulo: " . $article["TITULO"]);
                                }

                                unset($articleUtils);
                            ?>
                            <!-- Form to add a new article -->
                            <form class="row needs-validation justify-content-center mt-4" action="./src/php/modifyArticle.php" method="post">
                                <div class="col-5">
                                <label for="articles">Seleccione el artículo a modificar</label>
                                <select id="articles" class="form-select" name="author" aria-label="Default select example">
                                    
                                </select>
                                    <!-- <input type="text" class="form-control" name="Autor" placeholder="Autor" aria-label="Autor" required> -->
                                </div>
                                <div class="col-5">
                                    
                                </div>
                                <div class="col-5 mt-2">
                                    <input type="date" class="form-control" name="publicationDate" placeholder="Fecha de publicacion" aria-label="Fecha de publicacion" required>
                                </div>
                                <div class="col-5 mt-2"></div>
                                <div class="col-10 mt-2">
                                    <input type="text" class="form-control" name="title" placeholder="Titulo del articulo" aria-label="Titulo del articulo" required>
                                </div>
                                <div class="col-10 mt-2">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="article" placeholder="Escriba aqui su articulo" id="content" style="height: 400px" required></textarea>
                                        <label for="floatingTextarea2">Cuerpo del articulo</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn submitBtn">Enviar</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-manageMagazines" role="tabpanel" aria-labelledby="v-pills-manageMagazines-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>