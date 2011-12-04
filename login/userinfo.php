
<?php include_once 'includes/header.php'; ?>
<? include("include/session.php"); ?>

    <div id="wrapper" class="frame flc">
    
        <div class="oneColumn">
            <section class="classContainer">
                <div class="header">User Info</div>
		    <div class="description">

                                 
                                 <?
                                 /* Requested Username error checking */
                                 $req_user = trim($_GET['user']);
                                 if(!$req_user || strlen($req_user) == 0 ||
                                    !eregi("^([0-9a-z])+$", $req_user) ||
                                    !$database->usernameTaken($req_user)){
                                    die("Username not registered");
                                 }
                                 
                                 /* Logged in user viewing own account */
                                 if(strcmp($session->username,$req_user) == 0){
                                    echo "<h1>My Account</h1>";
                                 }
                                 /* Visitor not viewing own account */
                                 else{
                                    echo "<h1>User Info</h1>";
                                 }
                                 
                                 /* Display requested user information */
                                 $req_user_info = $database->getUserInfo($req_user);
                                 
                                 /* Username */
                                 echo "<b>Username: ".$req_user_info['username']."</b><br>";
                                 
                                 /* Email */
                                 echo "<b>Email:</b> ".$req_user_info['email']."<br>";
                                 
                                 /**
                                  * Note: when you add your own fields to the users table
                                  * to hold more information, like homepage, location, etc.
                                  * they can be easily accessed by the user info array.
                                  *
                                  * $session->user_info['location']; (for logged in users)
                                  *
                                  * ..and for this page,
                                  *
                                  * $req_user_info['location']; (for any user)
                                  */
                                 
                                 /* If logged in user viewing own account, give link to edit */
                                 if(strcmp($session->username,$req_user) == 0){
                                    echo "<br><a href=\"accountedit.php\">Edit Account Information</a><br>";
                                 }
                                 
                                 /* Link back to main */
                                 echo "<br>Back To [<a href=\"account.php\">Account</a>]<br>";
                                 
                                 ?>

	     </div>
			
            	
               </section>
        	
        </div> <!-- .oneColumn -->
	
    </div> <!--#wrapper -->

<?php include_once 'includes/footer.php'; ?>