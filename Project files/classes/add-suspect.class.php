<?php
    class AddSuspect extends Database
    {
        function __construct()
        {
            parent::__construct();
        }

        function add(string $name, string $surname, string $reason)
        {
            $db = $this->base;
            $stmt = $db->prepare("INSERT INTO files(imie, nazwisko, przewinienie, data) VALUES(?, ?, ?, current_date())");
            $stmt->bind_param("sss", $name, $surname, $reason);
            $status = $stmt->execute();

            return $status;
        }
    }
?>