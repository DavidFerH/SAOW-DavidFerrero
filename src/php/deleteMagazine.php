<?php
    include ('./MagazineUtils.php');
    $authorUtils = new MagazineUtils();

    $COD_REV = $_REQUEST['COD_REV'];

    $authorUtils->deleteMagazine($COD_REV);

    header("Location: http://localhost/SAOW%20Codigo/ActividadEvaluable/createEntry.php");
?>