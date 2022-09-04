<?php
    function DrawTable($counter, $quantity, $data)
    {
        echo "<tr>";
        for($i = 0; $i < $quantity; $i++)
        {
            if($i==0)
            {
                echo "<td>";
                echo $counter;
                echo "</td>";
            }
            else
            {
                echo "<td>";
                echo $data[$i-1];
                echo "</td>";
            }
        }
        echo "</tr>";
    }
?>