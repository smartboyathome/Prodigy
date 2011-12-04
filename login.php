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
    
        
        if($_COOKIE['Username'] == "") {?>
        
        <form action="login.php" method="POST">
            <input type="text" name="Username" value="User" style="width: 125px; margin-left: 125px;"/>
            <input type="password" name="Password" value="Pass" style="width: 125px;" />
            <input type="submit" name="Submit" value="Login" style="width: 95px; color: black; height: 25px; padding-top: 0px; " />
        </form>
        
        <?php } else echo "Already logged in"; 
        
    }
?>