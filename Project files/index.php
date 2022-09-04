<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 

        if(isset($_SESSION["imie"], $_SESSION["nazwisko"], $_SESSION["nr_odznaki"], $_SESSION["admin"]))
        {
            header("location: menu.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="icon" href="./icons/icon.png">
    <title>Log in - LSPD</title>
</head>
<body>
    <h1 class="lspd">Los Santos Police Department</h1>
    <div class="logo">
        <img id="logo" src="./icons/lspd.png">
    </div>
    <div class="container">
        <center><div class="log-in">
            <form action="menu.php" method="post">
                <h2>Log in</h2>
                <table>
                    <tr>
                        <td>Enter your badge number: <input type="number" name="odznaka"></td>
                    </tr>
                    <tr>
                        <td>Password: <input type="password" name="haslo"></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if(isset($_SESSION["error"]))
                                {
                                    $err = $_SESSION["error"];
                                    echo '<span id="error">' . $err . '</span>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Log in" id="btn"></td>
                    </tr>
                </table>          
            </form>
        </div></center>
    </div>
    <div class="footer"></div>
</body>
</html>