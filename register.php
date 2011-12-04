<?php include_once 'includes/header.php'; ?>

    <div id="wrapper" class="frame flc">
    
        <div class="oneColumn">
            <section class="classContainer">
                <div class="header">Register</div>
		    <div class="description">
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
			
				
				if($_COOKIE['Username'] == "") {?>
				
				<br />
				<div align="center" style="font-weight:bold;">
				<form action="register.php" method="POST">
				    <label for="Username">Username: </label><br><input type="text" name="Username" class="register"/><br />
				    <label for="Password">Password: </label><br><input type="password" name="Password" class="register"/><br />
				    <label for="Email">Email: </label><br><input type="text" name="Email" class="register"/><br />
				    <input type="submit" name="Submit" value="Create Account" class="button" style="width: 148px; height: 31px; padding-top: 0px; padding-bottom: 2px; margin-top: 15px;" />
				   
				</form>
				
				<?php } else echo "Already logged in.";
				
			    }
			?>
				</div>
			
			</div>
        	</section>
        	
        </div> <!-- .oneColumn -->
	
    </div> <!--#wrapper -->

<?php include_once 'includes/footer.php'; ?>