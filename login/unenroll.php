<?php
    if(!empty($_COOKIE['Username']) && !empty($_POST['ClassId']))
    {
        $db = new mysqlDAL;
        $db->unenrollUserInClass($_COOKIE['Username'], $_POST['ClassId']);
        $referrer = $_SERVER['HTTP_REFERER'];
        if(!empty($referrer)) header("Location: $referrer");
        else header("Location: /");
    }
?>