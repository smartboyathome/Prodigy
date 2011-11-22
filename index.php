
<?php

    require_once 'conf.php';
    include_once 'includes/header.php';
    require_once 'dal/mysql.php';
?>

    <div id="wrapper" class="frame flc">
    
        <div id="mainColumn">            
            
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
        	
        </div> <!-- #mainColumn-->
        
        <div id="secondaryColumn">
            <h4 class="header">Subjects</h4>
            <ul class="list">
                <li><a href="">Astronomy</a></li>
                <li><a href="">Biology</a></li>
                <li><a href="">Business</a></li>
                <li><a href="">Chemistry</a></li>
                <li><a href="">Computer Science</a></li>
                <li><a href="">Economics</a></li>
                <li><a href="">Education</a></li>
            </ul>
        </div>
	
    </div> <!--#wrapper -->

<?php include_once 'includes/footer.php'; ?>


