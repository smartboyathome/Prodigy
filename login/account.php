<?php include_once 'includes/header.php'; ?>
<? include("include/session.php"); ?>

    <div id="wrapper" class="frame flc">
    
        <div class="oneColumn">
            <div class="twoColumn" style="border-right: 1px solid #CCC; margin-right: 15px;">
                <div class="header">Log In</div>
                <div class="login">
                <p class="info">Please enter your username and password to login</p>
                
                <?
                /**
                 * User has already logged in, so display relavent links, including
                 * a link to the admin center if the user is an administrator.
                 */
                if($session->logged_in){
                   echo "<h1>Logged In</h1>";
                   echo "Welcome <b>$session->username</b>, you are logged in. <br><br>"
                       ."[<a href=\"userinfo.php?user=$session->username\">My Account</a>] &nbsp;&nbsp;"
                       ."[<a href=\"accountedit.php\">Edit Account</a>] &nbsp;&nbsp;";
                   if($session->isAdmin()){
                      echo "[<a href=\"admin.php\">Admin Center</a>] &nbsp;&nbsp;";
                   }
                   echo "[<a href=\"process.php\">Logout</a>]";
                }
                else{
                ?>
                
                
                <?
                /**
                 * User not logged in, display the login form.
                 * If user has already tried to login, but errors were
                 * found, display the total number of errors.
                 * If errors occurred, they will be displayed.
                 */
                if($form->num_errors > 0){
                   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
                }
                ?>
                
                <form action="process.php" method="POST">

                    <p class="loginInfo">
                        Username:
                        <span class="form">
                        <input type="text" name="user" maxlength="30" style="width: 200px;" value="<? echo $form->value("user"); ?>"><? echo $form->error("user"); ?>
                        <span>
                    </p>
                
                    <p class="loginInfo">
                        Password:
                        <span class="form">
                        <input type="password" name="pass" maxlength="30" style="width: 200px;" value="<? echo $form->value("pass"); ?>"><? echo $form->error("pass"); ?>
                        </span>
                    </p>
                
                    <p class="loginInfo">    
                        
                    <input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "checked"; } ?>>
                        <span class="smallPrint">Remember me next time &nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="hidden" name="sublogin" value="1">
                        <span class="form">
                            <input type="submit" value="Login">
                        </span>
                    </p>
                </form>
                
                <a class="info" href="forgotpass.php">Forgot Password?</a>
                
                <? } ?>
	            </div>
			</div>
			
			<div class="twoColumn">
                <h3 class="header" style="text-align: center">No Account Yet?</h3>
			    <a class="button" style="margin-left: 175px;" href="register.php">Sign-Up!</a>
			</div>
        	
        </div> <!-- .oneColumn -->
	
    </div> <!--#wrapper -->

<?php include_once 'includes/footer.php'; ?>