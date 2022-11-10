<?php
    include("./functions/result-quantity.function.php");

    function searchResults()
    {
        if(isset($_POST['imie']) || isset($_POST['nazwisko']) || isset($_POST['przewinienie']))
        {
            if(!empty($_POST['imie']) || !empty($_POST['nazwisko']) || !empty($_POST['przewinienie']))
            {
                $search = new Search($_POST['imie'], $_POST['nazwisko'], $_POST['przewinienie']);
                $result = $search->searchPerson();
                if($result && $result->num_rows>0)
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
                    echo "<h3>{$arr['quantity']} result{$arr['text']} found...</h3>";
                    $counter=1;
                    while($row = $result->fetch_row())
                    {
                        DrawTable($counter, 5, array($row[0], $row[1], $row[2], $row[3]));
                        $counter++;
                    }
                    echo "</table>";
                }
                else
                {
                    echo "This person was not found in the directory!";
                }
                unset($search);
            }
            else
            {
                echo "Enter the name or surname of the person you are looking for.";
            }
        }
        else
        {
            echo "Enter the name or surname of the person you are looking for.";
        }
    } 
?>