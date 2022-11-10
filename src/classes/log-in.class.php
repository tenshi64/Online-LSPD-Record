<?php
    class LogIn extends Database
    {
        private string $_password;
        private int $_badgeNumber;
        function __construct(int $badgeNumber, string $password)
        {
            parent::__construct();
            $this->_badgeNumber = $badgeNumber;
            $this->_password = $password;
        }

        public function matchBadge() : bool
        {
            $database = $this->base;
            $stmt = $database->prepare('SELECT nr_odznaki FROM users WHERE nr_odznaki=?');
            $stmt->bind_param('i', $this->_badgeNumber);
            $stmt->execute();

            $result = $stmt->get_result();

            $quantity = $result->num_rows;

            if($quantity>0)
            {
                return true;
            }
            return false;
        }

        public function matchPassword() : bool
        {
            $database = $this->base;
            $stmt = $database->prepare('SELECT haslo FROM users WHERE haslo=?');
            $stmt->bind_param('s', $this->_password);
            $stmt->execute();

            $result = $stmt->get_result();

            $quantity = $result->num_rows;

            if($quantity>0)
            {
                return true;
            }
            return false;
        }

        public function getFirstName() : string
        {
            $database = $this->base;
            $stmt = $database->prepare('SELECT imie FROM users WHERE haslo=? AND nr_odznaki=?');
            $stmt->bind_param('si', $this->_password, $this->_badgeNumber);
            $stmt->execute();

            $result = $stmt->get_result();

            $quantity = $result->num_rows;

            if($quantity>0)
            {
                return $result->fetch_row()[0];
            }
            return false;
        }

        public function getLastName() : string
        {
            $database = $this->base;
            $stmt = $database->prepare('SELECT nazwisko FROM users WHERE haslo=? AND nr_odznaki=?');
            $stmt->bind_param('si', $this->_password, $this->_badgeNumber);
            $stmt->execute();

            $result = $stmt->get_result();

            $quantity = $result->num_rows;

            if($quantity>0)
            {
                return $result->fetch_row()[0];
            }
            return false;
        }

        public function isAdmin() : bool
        {
            $database = $this->base;
            $stmt = $database->prepare('SELECT admin FROM users WHERE haslo=? AND nr_odznaki=?');
            $stmt->bind_param('si', $this->_password, $this->_badgeNumber);
            $stmt->execute();

            $result = $stmt->get_result();

            $quantity = $result->num_rows;

            if($quantity>0)
            {
                return ($result->fetch_row()[0]==1) ? true : false;
            }
        }

        function _destruct()
        {
            $database = $this->base;
            $database->close();
        }
    }
?>