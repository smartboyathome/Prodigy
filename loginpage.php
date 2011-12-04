<?php include_once 'includes/header.php'; ?>

<div id="wrapper" class="frame flc">
    
    <div class="oneColumn">
        
        <div class="twoColumn" style="border-right: 1px solid #CCC; padding-right: 15px; margin-right: 15px;">
            
            <div class="login module">
                
                <h3 class="header">Log in</h3>
                
                <p>Please enter your username and password to log in.</p>
                
                <form action="login.php" method="POST">
                    <input type="text" name="Username" value="User" />
                    <input type="password" name="Password" value="Pass"  />
                    <input type="submit" name="Submit" value="Login" style="width: 95px; color: black; height: 25px; padding-top: 0px; " />
                </form>
            
            </div>
        
        </div>
        
        <div class="twoColumn">
        
            <div class="login module">
                
                <h3 class="header">No Account Yet?</h3>
            
            </div>
        
        </div>
        
    </div>
    
</div>

<?php include_once 'includes/footer.php'; ?>