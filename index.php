
<?php

    require_once 'conf.php';
    include_once 'includes/header.php';
    require_once 'dal/mysql.php';
?>

    <div id="wrapper" class="frame flc">
    
            
            <?php


            $mod = $_GET["module"];

            if ($mod == 'viewclass'){
                include 'includes/viewclass.php';
            }elseif ($mod == 'viewlesson'){
                include 'includes/viewlesson.php';
            }else{
                include 'includes/home.php';
            }

        	?>
        	
        

	
    </div> <!--#wrapper -->

<?php include_once 'includes/footer.php'; ?>


