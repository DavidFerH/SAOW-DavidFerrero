<?php
    include ('./MagazineUtils.php');
    $authorUtils = new MagazineUtils();

    $COD_REV = $_REQUEST['COD_REV'];
    $title = $_REQUEST['title'];
    $editorial = $_REQUEST['editorial'];
    $number = $_REQUEST['number'];
    $FECHA_PUB = $_REQUEST['publicationDate'];

    $authorUtils->UpdateMagazine($COD_REV, $title, $editorial, $number, $FECHA_PUB);
    

    header("Location: http://localhost/SAOW%20Codigo/ActividadEvaluable/createEntry.php");
?>