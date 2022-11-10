<?php
    class SelectAll extends Database
    {
        function __construct(string $rows, string $table)
        {
            parent::__construct();
            $db = $this->base;
            $result = $db->query("SELECT $rows FROM $table");

            if($result->num_rows > 0)
            {
                echo "<table border='1' style='pointer-events:initial;margin-top: 20px; margin-bottom: 20px; border-color: rgb(252, 198, 22); border-style: solid; border-width: 5px;'>";
                echo "<tr>";
                echo "<th>ID.</th>"; 
                echo "<th>Name</th>"; 
                echo "<th>Surname</th>";
                echo "<th>Reason</th>";
                echo "<th>Date</th>";
                echo "</tr>";
                $arr = countRows($result);
                echo "<h3>{$arr['quantity']} result{$arr['text']} found.</h3>";
                while($row = $result->fetch_row())
                {
                    DrawTable($row[0], 6, array($row[1], $row[2], $row[3], $row[4], "<a href='remove-suspect.php?id=$row[0]&table=$table'>Delete</a>"));
                }
                echo "</table>";
            }     
            else
            {
                $arr = countRows($result);
                echo "<h3>{$arr['quantity']} result{$arr['text']} found...</h3>";
            }
        }
    }
?>