
<!DOCTYPE HTML>

<head>
    <title>Prodigy | Shared Learning System</title>
    <link rel="Icon Name" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta name="description" content="" />
    <script type="text/javascript" src="css/jquery.min.js"></script>
</head>

<body>

<div id="container">
    
    <header id="header" class="frame">
        <div id="logo">
            <a href="/"><img src="images/ProdigyLogo.png"></a></h1>
        </div>
    </header>
    
    <!--
    <?php if($session->logged_in) {?>
    <div class="welcomeMessage">
        <? echo "Welcome, <b>$session->username</b>" ?>
    </div>
    <? } ?>
    -->
    
    <nav id="nav">
    	<ul class="list">
    	    <li><a href="index.php">Home</a></li>
    	    <li><a href="index.php?module=viewcatalog">Browse</a></li>
    	    <li><a href="">My Classes</a></li>
	    <li><a href="register.php">Sign Up</a></li>
    	    <li><?php include_once 'login.php'; ?></li>
	    
	    
	    
    	</ul>
    </nav>