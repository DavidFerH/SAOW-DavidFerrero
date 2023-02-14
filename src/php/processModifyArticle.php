<?php
    include ('./ArticleUtils.php');
    $articleUtils = new ArticleUtils();

    $title = $_REQUEST['title'];
    $article = $_REQUEST['article'];
    $cod_art = $_REQUEST['cod_art'];

    $articleUtils->UpdateArticle($title, $article, $cod_art);

    header("Location: http://localhost/SAOW%20Codigo/ActividadEvaluable/createEntry.php");
?>