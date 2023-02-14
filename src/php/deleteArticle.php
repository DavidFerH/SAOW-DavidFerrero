<?php
    include ('./ArticleUtils.php');
    $articleUtils = new ArticleUtils();

    $cod_art = $_REQUEST['cod_art'];

    $articleUtils->DeleteArticle($cod_art);

    header("Location: http://localhost/SAOW%20Codigo/ActividadEvaluable/createEntry.php");
?>