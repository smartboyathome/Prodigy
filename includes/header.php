
<!DOCTYPE HTML>

<head>
    <title>Prodigy | Shared Learning System</title>
    <link rel="Icon Name" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta name="description" content="" />
    <script type="text/javascript" src="css/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".classDescription").on("click", function() {
                document.location.href = $(this).data("link");
            });
        });
    </script>
</head>

<body>

<div id="container">
    
    <header id="header" class="frame">
        <div id="logo">
            <a href="index.php"><img src="images/ProdigyLogo.png"></a></h1>
        </div>
    </header>
    
    <!--
    <?php if($session->logged_in) {?>
    <div class="welcomeMessage">
        <? echo "Welcome, <b>$session->username</b>"; ?>
    </div>
    <?php } ?>
    -->
    
    <nav id="nav">
    	<ul class="list">
    	    <li><a href="index.php">Home</a></li>
    	    <li><a href="index.php?module=viewcatalog">Browse</a></li>
    	    <?php include_once 'login2.php'; ?>
	    
	    
	    
    	</ul>
    </nav>