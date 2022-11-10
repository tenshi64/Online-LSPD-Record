<?php
    include("./classes/DB.class.php");
    include("./classes/remove-user.class.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 

        if(!isset($_SESSION["imie"], $_SESSION["nazwisko"], $_SESSION["nr_odznaki"], $_SESSION["admin"]))
        {
            header("location: index.php");
        }
        else
        {
            $removeUser = new RemoveUser($_GET["id"], $_GET["table"]);
        }
    }
?>