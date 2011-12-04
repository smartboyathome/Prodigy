<?php include_once 'includes/header.php'; ?>
<? include("include/session.php"); ?>

    <div id="wrapper" class="frame flc">
    
        <div class="oneColumn">
            <section class="classContainer">
                <div class="header">Edit Account</div>
		            <div class="module" style="margin-top: 15px;">
		
                                             <?
                  /**
                   * User has submitted form without errors and user's
                   * account has been edited successfully.
                   */
                  if(isset($_SESSION['useredit'])){
                     unset($_SESSION['useredit']);
                     
                     echo "<p><b>$session->username</b>, your account has been successfully updated. "
                         ."<a href=\"account.php\">Main</a>.</p>";
                  }
                  else{
                  ?>
                  
                  <?
                  /**
                   * If user is not logged in, then do not display anything.
                   * If user is logged in, then display the form to edit
                   * account information, with the current email address
                   * already in the field.
                   */
                  if($session->logged_in){
                  ?>
                 
                  <?
                  if($form->num_errors > 0){
                     echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
                  }
                  ?>
                  <form action="process.php" method="POST">
                  <table class="editAccount" align="left" border="0" cellspacing="0" cellpadding="3">
                  <tr>
                  <td>Current Password:</td>
                  <td><input type="password" name="curpass" maxlength="30" value=""></td>
                  <td><? echo $form->error("curpass"); ?></td>
                  </tr>
                  <tr>
                  <td>New Password:</td>
                  <td><input type="password" name="newpass" maxlength="30" value=""></td>
                  <td><? echo $form->error("newpass"); ?></td>
                  </tr>
                  <tr>
                  <td>Email:</td>
                  <td><input type="text" name="email" maxlength="50" value="<?php echo $session->userinfo['email']; ?>"
               >
                  </td>
                  <td><? echo $form->error("email"); ?></td>
                  </tr>
                  <tr><td colspan="2" align="right">
                  <input type="hidden" name="subedit" value="1">
                  <input type="submit" style="width: 100px" value="Edit Account"></td></tr>
                  <tr><td colspan="2" align="left"></td></tr>
                  </table>
                  </form>
                  
                  <?
                  }
                  }
                  
                  ?>
                
				
			
			</div>
        	</section>
        	
        </div> <!-- .oneColumn -->
	
    </div> <!--#wrapper -->

<?php include_once 'includes/footer.php'; ?>