<?php
    class RemoveUser extends Database
    {
        function __construct(int $id, string $table)
        {
            parent::__construct();

            $db = $this->base;
            $stmt = $db->prepare("DELETE FROM $table WHERE id = ?");
            $stmt->bind_param("i", $id);
            $result = $stmt->execute();

            header("location: manage-$table.php");
        }
    }
?>