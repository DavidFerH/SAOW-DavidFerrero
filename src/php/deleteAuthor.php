<?php
    include ('./AuthorUtils.php');
    $authorUtils = new AuthorUtils();

    $DNI = $_REQUEST['DNI'];

    $authorUtils->DeleteAuthor($DNI);

    header("Location: http://localhost/SAOW%20Codigo/ActividadEvaluable/createEntry.php");
?>