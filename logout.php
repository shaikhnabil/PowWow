<?php
    session_start();
    if($_POST['action'] == 'calling')
    {
        if(isset($_SESSION['userid']))
        {
            unset($_SESSION['userid']);
            session_destroy();
            echo "yes";
        }
    }

    if($_POST['action'] == 'checking')
    {
        if(isset($_SESSION['userid']))
            echo "yes";
        else
            echo "no";
    }
?>