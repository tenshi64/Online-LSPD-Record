<?php
    include("./functions/log-out-button.function.php");
    include("./classes/edit-profile.class.php");

    if(!isset($_SESSION)) 
    { 
        session_start(); 

        if(!isset($_SESSION["imie"], $_SESSION["nazwisko"], $_SESSION["nr_odznaki"], $_SESSION["admin"]))
        {
            header("location: index.php");
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
    <title>Edit profile - LSPD</title>
</head>
<body>
    <h1 class="lspd">Los Santos Police Department</h1>
    <?php
        logOutButton();
    ?>
    <div class="logo">
        <img id="logo" src="./icons/lspd.png">
    </div>
    <div class="container">
        <center><div class="log-in">
            <a href="menu.php" id="a2">Return to the main menu</a>
            <form action="" method="post" style="margin-top: 100px;">
                <h1>Edit profile</h1>
                <table>
                    <tr>
                        <td>
                            <?php
                                if(isset($_SESSION["imie"]))
                                {
                                    echo "Change your name: <input type='text' name='imie' value={$_SESSION['imie']}>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if(isset($_SESSION["nazwisko"]))
                                {
                                    echo "Change your name: <input type='text' name='nazwisko'  style='margin-bottom: 20px;' value={$_SESSION['nazwisko']}>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Change Password: <input type="password" name="haslo"></td>
                    </tr>
                    <tr>
                        <td>Repeat password: <input type="password" name="re-haslo"></td>
                    </tr>
                    <tr>
                        <td><span style="font-size: 15px; color: darkgray">*All data must contain at least 1 character.</span></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if(isset($_SESSION["information"]))
                                {
                                    $info = $_SESSION["information"];
                                    echo '<span id="information">' . $info . '</span><br>';
                                }
                                if(isset($_SESSION["information1"]))
                                {
                                    $info = $_SESSION["information1"];
                                    echo '<span id="information">' . $info . '</span><br>';
                                }
                                if(isset($_SESSION["information2"]))
                                {
                                    $info = $_SESSION["information2"];
                                    echo '<span id="information">' . $info . '</span><br>';
                                }
                                if(isset($_SESSION["error"]))
                                {
                                    $err = $_SESSION["error"];
                                    echo '<span id="error">' . $err . '</span><br>';
                                }
                                if(isset($_SESSION["error1"]))
                                {
                                    $err = $_SESSION["error1"];
                                    echo '<span id="error">' . $err . '</span><br>';
                                }
                                if(isset($_SESSION["error2"]))
                                {
                                    $err = $_SESSION["error2"];
                                    echo '<span id="error">' . $err . '</span>';
                                }
                                unset($_SESSION['information']);
                                unset($_SESSION['information1']);
                                unset($_SESSION['information2']);
                                unset($_SESSION['error']);
                                unset($_SESSION['error1']);
                                unset($_SESSION['error2']);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Save" id="btn"></td>
                    </tr>
                </table>
                <?php
                    $edit = new EditUser((isset($_POST['haslo'])) ? str_replace(' ', '', $_POST['haslo']) : "", (isset($_POST['re-haslo'])) ? str_replace(' ', '', $_POST['re-haslo']) : "", (isset($_POST['imie'])) ? str_replace(' ', '', $_POST['imie']) : $_SESSION['imie'], (isset($_POST['nazwisko'])) ? str_replace(' ', '', $_POST['nazwisko']) : $_SESSION['nazwisko']);
                    if(isset($_POST['haslo'], $_POST['re-haslo']))
                    {
                        $edit->changePassword();
                    }
                    if(isset($_POST['imie']))
                    {
                        $edit->changeFirstName();
                    }
                    if(isset($_POST['nazwisko']))
                    {
                        $edit->changeLastName();
                    }
                ?>
            </form>
        </div></center>
    </div>
    <div class="footer"></div>
</body>
</html>