<?php include_once 'includes/header.php'; ?>
<? include_once("include/session.php"); ?>

    <div id="wrapper" class="frame flc">
    
        <div class="oneColumn">
            <section class="classContainer">
                <div class="header">Register</div>
		    <div class="description">
		<?
			/**
			 * The user is already logged in, not allowed to register.
			 */
			if($session->logged_in){
			   echo "<h1>Registered</h1>";
			   echo "<p>We're sorry <b>$session->username</b>, but you've already registered. <br>"
			       ."<a href=\"index.php\">Home</a>.</p>";
			}
			/**
			 * The user has submitted the registration form and the
			 * results have been processed.
			 */
			else if(isset($_SESSION['regsuccess'])){
			   /* Registration was successful */
			   if($_SESSION['regsuccess']){
			      echo "<h1>Registered!</h1>";
			      echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your account has been created, "
				  ."you may now <a href=\"index.php\">log in</a>.</p>";
			   }
			   /* Registration failed */
			   else{
			      echo "<h1>Registration Failed</h1>";
			      echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
				  ."could not be completed.<br>Please try again at a later time.</p>";
			   }
			   unset($_SESSION['regsuccess']);
			   unset($_SESSION['reguname']);
			}
			/**
			 * The user has not filled out the registration form yet.
			 * Below is the page with the sign-up form, the names
			 * of the input fields are important and should not
			 * be changed.
			 */
			else{
			?>
			
			
			<?
			if($form->num_errors > 0){
			   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
			}
			?>
			<form action="process.php" method="POST">
			<table class="editAccount" border="0" cellspacing="0" cellpadding="3">
			<tr>
			    <td>Username:</td>
			    <td><input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"></td><td><? echo $form->error("user"); ?></td>
			</tr>
			<tr>
			    <td>Password:</td>
			    <td><input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"></td><td><? echo $form->error("pass"); ?></td>
			</tr>
			<tr>
			    <td>Email:</td>
			    <td><input type="text" name="email" maxlength="50" value="<? echo $form->value("email"); ?>"></td>
			    <td><? echo $form->error("email"); ?></td>
			</tr>
			<tr><td colspan="2" align="center">
			<input type="hidden" name="subjoin" value="1">
			<input type="submit" class="button" value="Create Account" style="width: 148px; height: 31px; padding-top: 0px; padding-bottom: 2px; margin-top: 15px; margin-left: 205px;" ></td></tr>
		    
			</table>
			</form>
			<?
			}
			?>

				
			
			</div>
        	</section>
        	
        </div> <!-- .oneColumn -->
	
    </div> <!--#wrapper -->

<?php include_once 'includes/footer.php'; ?>