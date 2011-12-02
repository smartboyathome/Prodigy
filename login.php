<?php
    if(isset($_POST['Submit']))
    {
        require_once "conf.php";
        require_once "dal/mysql.php";
        
        $db = new mysqlDAL;
        if($db->checkUser($_POST['Username'], $_POST['Password']))
        {
            //This cookie is very insecure! A session DB is needed!
            setcookie("Username", $_POST['Username']);
            
            $referrer = $_SERVER['HTTP_REFERER'];
            if(!empty($referrer)) header("Location: $referrer");
            else header("Location: /");
        }
        else
        {
            header("Location: login.php");
        }
    }
    else
    {
        include_once "includes/header.php"; 
        
        if($_COOKIE['Username'] == "") {?>
        Login:<br />
        <form action="login.php" method="POST">
            <label for="Username">Username: </label><input type="text" name="Username" /><br />
            <label for="Password">Password: </label><input type="password" name="Password" /><br />
            <input type="submit" name="Submit" value="Submit" />
        </form>
        
        <?php } else echo "Already logged in"; 
        include_once "includes/footer.php";
    }
?>