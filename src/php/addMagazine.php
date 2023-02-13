<?php
    include ('./MagazineUtils.php');
    $magazineUtils = new MagazineUtils();

    $title = $_REQUEST['title'];
    $number = $_REQUEST['number'];
    $editorial = $_REQUEST['editorial'];
    $date = $_REQUEST['publicationDate'];

    $image = $_FILES['coverImage'];
    $coverPath = $_SERVER['DOCUMENT_ROOT'] . '/SAOW Codigo/ActividadEvaluable/src/covers' . '/' . $image['name'];

    move_uploaded_file($image['tmp_name'], $coverPath);

    $magazineUtils->createMagazine($title, $number, $editorial, $date, $coverPath);

    // header("Location: http://localhost/SAOW%20Codigo/ActividadEvaluable/createEntry.php");

    echo "Title: ". $title;
    echo "<br>";
    echo "Editorial: " . $editorial;
    echo "<br>";
    echo "Numero: " . $number;
    echo "<br>";
    echo "Fecha : " . $date;
    echo "<br>";
    echo "Ruta: " . $coverPath;
?>