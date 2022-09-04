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
    include("./functions/log-out-button.function.php");
    include("./classes/add-suspect.class.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="icon" href="./icons/icon.png">
    <title>Add to file - LSPD</title>
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
            <h1 id="h1">Add a person to the file</h1><hr>
            <a href="menu.php" id="a2">Return to the main menu</a>
            <form action="" method="post" style="font-size: 22px; width: 350px; margin-top: 0;">
                <table>
                    <tr>
                        <td>Name: <input type="text" name="imie"></td>
                    </tr>
                    <tr>
                        <td>Last name: <input type="text" name="nazwisko"></td>
                    </tr>
                    <tr>
                        <td>Reason: <input type="text" name="przewinienie"></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if(isset($_POST["imie"], $_POST["nazwisko"], $_POST["przewinienie"]))
                                {
                                    if(!empty($_POST["imie"]) && !empty($_POST["nazwisko"]) && !empty($_POST["przewinienie"]))
                                    {
                                        $addSuspect = new AddSuspect();
                                        $result = $addSuspect->add($_POST["imie"], $_POST["nazwisko"], $_POST["przewinienie"]);
                                        if($result)
                                        {
                                            echo "<p style='color: green; font-size: 18px;'>A person has been added to the file!</p>";
                                        }
                                        else
                                        {
                                            echo "<p style='color: red; font-size: 18px;'>Something went wrong!</p>";
                                        }
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Add" id="btn" style="margin-top: 5px;"></td>
                    </tr>
                </table>      
            </form>
            </div>     
        </div></center>
    </div>
    <div class="footer"></div>
</body>
</html>