<?php

//initial connection to the MySQL server
$connection = mysql_connect("localhost", "prodigy", "huskies");

if (!$connection){
	die("Database connection error.");
}


//connects to the Prodigy database 
$db_select = mysql_select_db("prodigy", $connection);

if (!$db_select){
	die ("Error selecting database.");
}

?>



<!DOCTYPE HTML>

<?php include_once 'includes/header.php'; ?>

    <div id="wrapper" class="frame">
	    
	    <div align="center" class="classpage" style="height: auto;">
		<form name="input" action="html_form_action.asp" method="get">
		    <div style="font-size: 20px; padding: 15px; font-weight: bold;">Welcome! Create a new class by entering a class name and description.</div>
		    Class Name: <input type="text" name="user" style="border-radius: 2px;"/> <br> <br>
		    Description: <input type="text" size="80" name="description" style="border-radius: 2px;" />
		    <br> <input type="submit" value="Create Class" style="margin: 5px;"/>
		    <input type="reset" value="Reset Forms" style="margin: 5px;">
		</form>
	    </div>
	
	
    </div> <!--#wrapper -->

    <footer id ="footer" class="frame">
    
    </footer>

</div>

</body>
</html>
