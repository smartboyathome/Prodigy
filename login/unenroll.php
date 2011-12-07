
<?php
    include_once("include/session.php");

    if($session->logged_in && !empty($_GET['ClassId']))
    {
        $db = new mysqlDAL;
        $db->unenrollUserInClass($session->username, $_POST['ClassId']);
        $referrer = $_SERVER['HTTP_REFERER'];
        if(!empty($referrer)) header("Location: $referrer");
        else header("Location: index.php");
    }
?>