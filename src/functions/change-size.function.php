<?php
    function container()
    {
        if($_SESSION["admin"])
        {
            echo "style='height:700px;'";
        }
        else
        {
            echo "style='height:500px;'";
        }
    }

    function table()
    {
        if($_SESSION["admin"])
        {
            echo "style='text-align: center; margin-top: 80px;'";
        }
        else
        {
            echo "style='text-align: center; margin-top: 100px;'";
        }
    }
?>