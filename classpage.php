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
    
	<div class="classpage">
	    <div class="header">Class Name</div>
		<div style="font-size: 15px; font-weight: bold;" align="left">Description:</div>
	        <div class="description" style="height: auto; margin: 5px; ">Welcome to test class. Test Description.</div>
	    <div>
		    <ul class="list">
			<li style="font-weight: bold; padding: 5px;">Lessons:</li>
			<li></li>
			<li>1) Lesson 1: Test</li>
			<li>2) Lesson 2: Test</li>
				
	    </div>
	    
	</div>
    </div> <!--#wrapper -->

    <footer id ="footer" class="frame">
    
    </footer>

</div>

</body>
</html>
