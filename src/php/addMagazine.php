<?php
    $title = $_REQUEST['title'];
    $editorial = $_REQUEST['editorial'];
    $number = $_REQUEST['number'];
    $date = $_REQUEST['publicationDate'];

    $image = $_FILES['coverImage'];
    $path = $_SERVER['DOCUMENT_ROOT'] . '/SAOW Codigo/ActividadEvaluable/src/covers' . '/' . $image['name'];

    move_uploaded_file($image['tmp_name'], $path);

    echo "Title: ". $title;
    echo "<br>";
    echo "Editorial: " . $editorial;
    echo "<br>";
    echo "Numero: " . $number;
    echo "<br>";
    echo "Fecha : " . $date;
    echo "<br>";
    echo "Ruta: " . $path;
?>