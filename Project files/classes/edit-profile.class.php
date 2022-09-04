<?php
    session_start();  
    include("./classes/DB.class.php");
    class EditUser extends Database
    {
        private string $_pwd;
        private string $_repeat_pwd;
        private string $_firstName;
        private string $_lastName;

        function __construct($pwd, $repeat_pwd, $firstName, $lastName)
        {
            parent::__construct();
            $firstName = (strlen($firstName)>0) ? $firstName : $_SESSION['imie'];
            $lastName = (strlen($lastName)>0) ? $lastName : $_SESSION['nazwisko'];
            $this->_pwd = $pwd;
            $this->_repeat_pwd = $repeat_pwd;
            $this->_firstName = $firstName;
            $this->_lastName = $lastName;
        }

        public function changePassword() : void
        {
            if($this->_pwd != "")
            {
                if($this->_pwd == $this->_repeat_pwd)
                {
                    $db = $this->base;
                    $stmt = $db->prepare("UPDATE users SET haslo=? WHERE nr_odznaki=?");
                    $stmt->bind_param("si", $this->_pwd, $_SESSION['nr_odznaki']);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    $_SESSION["information"] = "Password has been changed!";
                    header("location: manage-user.php");
                }
                else
                {
                    $_SESSION["error"] = "Passwords don't match!";
                    header("location: manage-user.php");
                }
            }
        }

        public function changeFirstName() : void
        {
            if($this->_firstName != $_SESSION['imie'])
            {
                if(strlen($this->_firstName) > 0)
                {
                    $db = $this->base;
                    $stmt = $db->prepare("UPDATE users SET imie=? WHERE nr_odznaki=?");
                    $stmt->bind_param("si", $this->_firstName, $_SESSION['nr_odznaki']);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    $_SESSION["information1"] = "First name has been changed!";
                    $_SESSION['imie'] = $this->_firstName;
                    header("location: manage-user.php");
                }
                else
                {
                    $_SESSION["error1"] = "Name field cannot be empty!";
                    header("location: manage-user.php");
                }
            }
        }

        public function changeLastName() : void
        {
            if($this->_lastName != $_SESSION['nazwisko'])
            {
                if(strlen($this->_lastName) > 0)
                {
                    $db = $this->base;
                    $stmt = $db->prepare("UPDATE users SET nazwisko=? WHERE nr_odznaki=?");
                    $stmt->bind_param("si", $this->_lastName, $_SESSION['nr_odznaki']);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    $_SESSION["information2"] = "Last name has been changed!";
                    $_SESSION['nazwisko'] = $this->_lastName;
                    header("location: manage-user.php");
                }
                else
                {
                    $_SESSION["error2"] = "Surname field cannot be empty!";
                    header("location: manage-user.php");
                }
            }
        }

        function __destruct()
        {
            $db = $this->base;
            $db->close();
        }
    }
?>