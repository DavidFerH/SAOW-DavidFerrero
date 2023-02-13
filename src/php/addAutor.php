<?php
    include ('./AuthorUtils.php');
    $authorUtils = new AuthorUtils();

    $dni = $_REQUEST['DNI'];
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $descripcion = $_REQUEST['descripcion'];

    $authorUtils->CreateAuthor($dni, $nombre, $apellidos, $descripcion);

    header("Location: http://localhost/SAOW%20Codigo/ActividadEvaluable/createEntry.php");
?>