<?php
    function countRows($result)
    {
        $quantity = $result->num_rows;
        $text = "";

        switch($quantity)
        {
            case 1:
                $text = "";
                break;
            default:
                $text = "s";
                break;
        }

        $arr = ["text" => $text, "quantity" => $quantity];

        return $arr;
    }
?>