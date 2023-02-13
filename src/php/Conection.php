<?php
    function ddbbConection() {
        $server = "localhost";
        $user = "root";
        $password = "";
        $DDBB = "ddbb_revistaonline";

        $mysqli = mysqli_connect($server, $user, $password, $DDBB) or die("Error on conection: " . mysqli_connect_error());

        return $mysqli;
    }
?>