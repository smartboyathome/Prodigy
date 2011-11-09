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

    <?php
	$result = mysql_query("SELECT * FROM class", $connection);

	if (!$result){
		die("Database query error.");
	}

    while ($row = mysql_fetch_array($result)){
    	echo("
	    <section class='classDescription'>
	        <h3 class='header'>".$row[name]."</h3>
	        <div class='createdDate'>Created on: ");
           echo date('F jS Y g:i A', $row[createdDate]);

            echo ("</div>
            <div class='modifiedDate'>Modified on: ");

            echo date('F jS Y g:i A', $row[lastModDate]);

	        echo ("<div class='description'>
	            <p><i>".$row[description]."</i></p>
	        </div>

            <div class='enrolledCnt'>Number of enrolled users: 
                ".$row[enrolledCnt]."
            </div>
	    </section>");
	}
	
	mysql_free_result($result);
	?>
	
    </div> <!--#wrapper -->

    <footer id ="footer" class="frame">
    
    </footer>

</div>

</body>
</html>
