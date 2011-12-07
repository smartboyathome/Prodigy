<?php
    include_once("include/session.php");
    if($session->logged_in && !empty($_GET['ClassId']))
    {
        echo("GRAAAAAAAAH");
        $db = new mysqlDAL;
        echo("U SUK");
        $db->enrollUserInClass($session->username, $_POST['ClassId']);
        echo("I HATE U");
        $referrer = $_SERVER['HTTP_REFERER'];
        if(!empty($referrer)) header("Location: $referrer");
        else header("Location: index.php");
    }
?>