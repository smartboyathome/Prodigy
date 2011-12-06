
<? include_once("include/session.php"); ?>

                                
                                <?
                                /**
                                 * User has already logged in, so display relavent links, including
                                 * a link to the admin center if the user is an administrator.
                                 */
                                if($session->logged_in){
                                  
                                   echo "<li><a href=\"userinfo.php?user=$session->username\">My Account</a> </li>";
                                       
                                   if($session->isAdmin()){
                                      echo "<li><a href=\"admin.php\">Admin Center</a></li>";
                                   }
                                   echo "<li><a href=\"process.php\">Logout</a><li>";
                                }
                                else{
                                
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
                                <? echo "<li><a href=\"register.php\">Sign Up</a></li>"; ?>
                                <li><form action="process.php" method="POST">
                                         <input type="text" name="user" value="User" style="width: 125px; margin-left: 125px;"/>
                                        <input type="password" name="pass" value="Pass" style="width: 125px;" />
                                        <input type="hidden" name="sublogin" value="1">
                                        <input type="submit" name="submit" value="Login" style="width: 95px; color: black; height: 25px; padding-top: 0px; " />
                               </form></li>
        
                <? } ?>
                
			      
			
	
