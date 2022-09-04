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
    include("./classes/log-in.class.php");
    include("./functions/log-out-button.function.php");
    include("./functions/change-size.function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="icon" href="./icons/icon.png">
    <title>Main menu - LSPD</title>
</head>
<body>
    <h1 class="lspd">Los Santos Police Department</h1>
    <?php
        logOutButton();
    ?>
    <div class="logo">
        <img id="logo" src="./icons/lspd.png">
    </div>
    <div class="container" <?php container();?>>
        <center><div class="log-in" <?php container();?>>
            <table <?php table();?>>
                <tr>
                    <td><h1 id="h1">File</h1><hr></td>
                </tr>
                <tr>
                    <td><a id="a1" href="add-suspect.php">Add a person to the file</a></td>
                </tr>
                <tr>
                    <td><a id="a1" href="search.php">Search the file</a></td>
                </tr>
                <tr>
                    <td><a id="a1" href="manage-user.php">Edit profile</a></td>
                </tr>
                <?php
                    if(isset($_SESSION["admin"]))
                    {
                        if($_SESSION["admin"])
                        {
                            echo "<tr>";
                            echo "<td><h1 id='h1'>Administration</h1><hr></td>";
                            echo "</tr>";  
                            echo "<tr>";
                            echo "<td><a id='a1' href='manage-users.php'>Manage users</a></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td><a id='a1' href='add-user.php'>Add a user</a></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td><a id='a1' href='manage-files.php'>Manage the file</a></a></td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </div></center>
    </div>
    <div class="footer"></div>
</body>
</html>