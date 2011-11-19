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

<head>
    <title>Prodigy | Shared Learning System</title>
    <link rel="Icon Name" href="/images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta name="description" content="" />
</head>

<body>
    
<div id="login">
    <div id="loginBar" class="frame">
        <ul class="list">
            <li><a href="">Sign In!</a></li>
            <li><input type="text" name="password" value="password"/></li>
            <li><input type="text" name="username" value="username"/></li>
            <li>|</li>
            <li><a href="">Register</a></li>
        </ul>
    </div>
</div>

<div id="test"></div>

<div id="container">
    
    <header id="header" class="frame">
        
	    <h1 class="title"><img src="prodigylogo.png" width="200"></h1>
    </header>

    <nav id="nav" class="frame">
    	<ul class="list">
    	    <li><a href="">Home</a></li>
    	    <li><a href="">Lessons</a></li>
    	    <li><a href="">Quizzes</a></li>
    	    <li><a href="">Classes</a></li>
	    
    	</ul>
    </nav>

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
