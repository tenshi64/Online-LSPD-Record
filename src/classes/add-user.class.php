<?php
    class AddUser extends Database
    {
        function __construct()
        {
            parent::__construct();
        }

        function add(string $name, string $surname, string $password, string $badge, string $admin)
        {
            $db = $this->base;
            $stmt = $db->prepare("SELECT nr_odznaki FROM users WHERE nr_odznaki = ?");
            $stmt->bind_param("i", $badge);
            $stmt->execute();

            $result = $stmt->get_result();
            $quantity = $result->num_rows;

            if($quantity > 0)
            {
                return "badge";
            }
            else
            {
                $stmt = $db->prepare("INSERT INTO users(imie, nazwisko, haslo, nr_odznaki, admin) VALUES(?, ?, ?, ?, ?)");
                $stmt->bind_param("sssii", $name, $surname, $password, $badge, $admin);
                $status = $stmt->execute();
    
                if($status)
                {
                    return "good";
                }
                else
                {
                    return "err";
                }
            }
        }
    }
?>