<?php
    include ('./ArticleUtils.php');
    $articleUtils = new ArticleUtils();

    $idAutor = $_REQUEST['author'];
    $date = $_REQUEST['publicationDate'];
    $title = $_REQUEST['title'];
    $article = $_REQUEST['article'];

    $articleUtils->AddArticle($idAutor, $date, $title, $article);

    header("Location: http://localhost/SAOW%20Codigo/ActividadEvaluable/createEntry.php");
?>