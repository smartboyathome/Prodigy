<?php
    if(!empty($_COOKIE['Username']) && !empty($_GET['ClassId']))
    {
        $db = new mysqlDAL;
        $db->enrollUserInClass($_COOKIE['Username'], $_POST['ClassId']);
        $referrer = $_SERVER['HTTP_REFERER'];
        if(!empty($referrer)) header("Location: $referrer");
        else header("Location: /");
    }
?>