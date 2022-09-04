<?php
    session_start();

    unset($_SESSION["nr_odznaki"]);
    unset($_SESSION["imie"]);
    unset($_SESSION["nazwisko"]);
    unset($_SESSION["admin"]);

    if(!isset($_SESSION["imie"], $_SESSION["nazwisko"], $_SESSION["nr_odznaki"], $_SESSION["admin"]))
    {
        header("location: index.php");
    }
?>