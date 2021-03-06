
<?php include_once 'includes/header.php'; ?>
<? include_once ("include/session.php"); ?>

    <div id="wrapper" class="frame flc">
    
        <div class="oneColumn">
            <div class="loginContainer">
                
                <?
                /**
                 * User has already logged in, so display relavent links, including
                 * a link to the admin center if the user is an administrator.
                 */
                 
                if($session->logged_in){
                ?>
                    <div class="module"><h3 class='header' style='margin-bottom: 0;'>My Account</h3></div>
                    <div class="login">
                <?
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
                <div class="header">Log In</div>
                <div class="login">
                <p class="info">Please enter your username and password to login</p>
                
                <form action="process.php" method="POST">

                    <p class="loginInfo">
                        Username:
                        <span class="form">
                        <input type="text" name="user" maxlength="30" onclick='this.value = "";'  style="width: 200px;" value="<? echo $form->value("user"); ?>"> <span class="error"><? echo $form->error("user"); ?></p>
                        <span>
                    </p>
                
                    <p class="loginInfo">
                        Password:
                        <span class="form" style="margin-left: 53px;">
                        <input type="password" name="pass" maxlength="30" onclick='this.value = "";'  style="width: 200px;" value="<? echo $form->value("pass"); ?>"> <span class="error"><? echo $form->error("pass"); ?>
                        </span>
                    </p>
                
                    <p class="loginInfo">    
                        
                    <input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "checked"; } ?>>
                        <span class="smallPrint">Remember me next time &nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="hidden" name="sublogin" value="1">
                        <span class="form" style="margin-left: 104px;">
                            <input type="submit" value="Login">
                        </span>
                    </p>
                </form>
                
                <a class="info" href="forgotpass.php">Forgot Password?</a>
                
                <? } ?>
	            </div>
	        </div>
        	
        </div> <!-- .oneColumn -->
	
    </div> <!--#wrapper -->

<?php include_once 'includes/footer.php'; ?>