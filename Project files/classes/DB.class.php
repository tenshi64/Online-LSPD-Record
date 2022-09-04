<?php
    class Database
    {
        protected object $base;
        function __construct()
        {
            $this->base = new mysqli("localhost", "root", "", "kartoteka");
            if($this->base->connect_errno)
            {
                echo "Failed to connect to the database!";
            }
        }
    }
?>