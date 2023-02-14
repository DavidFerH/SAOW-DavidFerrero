<?php
    include ('./MagazineUtils.php');
    $magazineUtils = new MagazineUtils();

    $COD_REV = $_REQUEST['COD_REV'];
    $COD_ART = $_REQUEST['COD_ART'];

    echo $COD_ART;
    echo $COD_REV;

    $magazineUtils->linkArticleToMagazine($COD_REV, $COD_ART);

    header("Location: http://localhost/SAOW%20Codigo/ActividadEvaluable/createEntry.php");
?>