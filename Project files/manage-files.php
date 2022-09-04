<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 

        if(!isset($_SESSION["imie"], $_SESSION["nazwisko"], $_SESSION["nr_odznaki"], $_SESSION["admin"]))
        {
            header("location: index.php");
        }
    }
    include("./classes/DB.class.php");
    include("./classes/search.class.php");
    include("./functions/result-table.function.php");
    include("./functions/log-out-button.function.php");
    include("./functions/change-size.function.php");
    include("./classes/select-all.class.php");
    include("./functions/result-quantity.function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="icon" href="./icons/icon.png">
    <title>Manage the file - LSPD</title>
    <script src="./scripts/script.js"></script>
</head>
<body>
    <h1 class="lspd">Los Santos Police Department</h1>
    <?php
        logOutButton();
    ?>
    <div class="logo">
        <img id="logo" src="./icons/lspd.png">
    </div>
    <div class="container" id="container">
        <center><div class="log-in" id="log-in">
            <h1 id="h1">Manage the file</h1><hr>
            <a href="menu.php" id="a2">Return to the main menu</a>
            <div class="results" style="width: 900px;" id="results">
                <?php
                    $selectAll = new SelectAll("id, imie, nazwisko, przewinienie, data", "files");
                ?>
            </div>
            <?php echo "<script>changeSize();</script>"?>
        </div></center>
    </div>
    <div class="footer"></div>
</body>
</html>