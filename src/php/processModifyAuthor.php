<?php
    include ('./AuthorUtils.php');
    $authorUtils = new AuthorUtils();

    $DNI = $_REQUEST['DNI'];
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $descripcion = $_REQUEST['descripcion'];

    $authorUtils->UpdateAuthor($DNI, $nombre, $apellidos, $descripcion);

    header("Location: http://localhost/SAOW%20Codigo/ActividadEvaluable/createEntry.php");
?>