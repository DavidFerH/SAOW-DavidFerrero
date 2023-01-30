<?php
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    $date = $_REQUEST['publicationDate'];
    $title = $_REQUEST['title'];
    $article = $_REQUEST['article'];

    echo "Name: ". $name . " Surname: " . $surname;
    echo "<br>";
    echo "Date: " . $date;
    echo "<br>";
    echo "Title: " . $title;
    echo "<br>";
    echo "Article : " . $article;
?>