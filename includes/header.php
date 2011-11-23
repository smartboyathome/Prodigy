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
    <link rel="Icon Name" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta name="description" content="" />
</head>

<body>

<div id="container">
    
    <header id="header" class="frame">
        
	    <h1 class="title"><a href='index.php'><img src="images/ProdigyLogo.png"></a></h1>
    </header>

    <nav id="nav">
    	<ul class="list">
    	    <li><a href="index.php">Home</a></li>
    	    <li><a href="">Browse</a></li>
    	    <li><a href="">My Classes</a></li>
    	    <li><a href="">Account</a></li>
    	    <li class="search"><input type="text" name="search" value="search"/></li>
    	</ul>
    </nav>