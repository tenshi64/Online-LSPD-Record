<?php
    function logOutButton()
    {
        if(isset($_SESSION["imie"], $_SESSION["nazwisko"], $_SESSION["nr_odznaki"], $_SESSION["admin"]))
        {
            $imie = $_SESSION["imie"];
            $nazwisko = $_SESSION["nazwisko"];
            $admin = $_SESSION["admin"];
            if($admin)
            {
                echo "<span id='info'>Logged in as $imie $nazwisko | <span id='admin'>Admin</span><br>";
                echo "<a href='log-out.php' id='a3'>Log out</a></span>";
            }
            else
            {
                echo "<span id='info'>Logged in as $imie $nazwisko<br>";
                echo "<a href='log-out.php' id='a3'>Log out</a></span>";
            }
        }
        else
        {
            header("location: index.php");
        }
        if(isset($_POST['odznaka'], $_POST['haslo']))
        {
            if(!empty($_POST['odznaka']) && !empty($_POST['haslo']))
            {
                $badge = $_POST['odznaka'];
                $password = $_POST['haslo'];

                $user = new LogIn($badge, $password);
                $checkBadge = $user->matchBadge();
                $checkPassword = $user->matchPassword();

                $imie = $user->getFirstName();
                $nazwisko = $user->getLastName();
                $admin = $user->isAdmin();

                if($checkBadge && $checkPassword)
                {
                    if($admin)
                    {
                        echo "<span id='info'>Logged in as $imie $nazwisko | <span id='admin'>Admin</span><br>";
                        echo "<a href='log-out.php'>Log out</a></span>";
                    }
                    else
                    {
                        echo "<span id='info'>Logged in as $imie $nazwisko<br>";
                        echo "<a href='log-out.php'>Log out</a></span>";
                    }
                    $_SESSION["nr_odznaki"] = $badge;
                    $_SESSION["imie"] = $imie;
                    $_SESSION["nazwisko"] = $nazwisko;
                    $_SESSION["admin"] = $admin;
                }
                else
                {
                    $_SESSION['error'] = "Password or badge number is incorrect!";
                    if(isset($_SESSION['error']))
                    {
                        header("location: index.php");
                    }
                }
                unset($user);
            }
            else
            {
                $_SESSION['error'] = "Fill in all text fields!";
                if(isset($_SESSION['error']))
                {
                    header("location: index.php");
                }
            }
        }
    }
?>