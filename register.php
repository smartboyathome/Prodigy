<?php
    if(isset($_POST['Submit']))
    {
        require_once "conf.php";
        require_once "dal/mysql.php";
        
        $db = new mysqlDAL;
		if(!$db->userExists($_POST['Username']))
		{
			$db->addUser($_POST['Username'], $_POST['Password'], $_POST['Email']);
			
			//This cookie is very insecure! A session DB is needed!
			setcookie("Username", $_POST['Username']);
		}
        
        $referrer = $_SERVER['HTTP_REFERER'];
        if(!empty($referrer)) header("Location: $referrer");
        else header("Location: /");
    }
    else
    {
        include_once "includes/header.php"; 
        
        if($_COOKIE['Username'] == "") {?>
        
        Register:<br />
        <form action="register.php" method="POST">
            <label for="Username">Username: </label><input type="text" name="Username" /><br />
            <label for="Password">Password: </label><input type="password" name="Password" /><br />
            <label for="Email">Email: </label><input type="text" name="Email" /><br />
            <input type="submit" name="Submit" value="Submit" />
        </form>
        
        <?php } else echo "Already logged in.";
        include_once "includes/footer.php";
    }
?>