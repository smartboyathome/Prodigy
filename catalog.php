<?php include_once 'includes/header.php'; ?>

    <div id="wrapper" class="frame flc">
    
        <div class="oneColumn">
            <section class="classContainer">
                <div class="header">Browse Classes</div>
                <article class="classDescription">
                    <div class="imageContainer"><img class="image" src="images/astronomy.jpg" alt="universe" /></div>
            	    <h3 class="title">Astronomy 101</h3>
            	    <div class="smallPrint"><span>67 Enrolled</span> | Created: December 31st 1969 4:33 PM</div>
            	    <div class="description">Introduction to the universe, with emphasis on conceptual, as contrasted with mathematical, comprehension. Modern theories, observations; ideas concerning nature, evolution of galaxies; quasars, stars, black holes, planets, solar system. </div>
                </article>
            
                <?php
            	$result = mysql_query("SELECT * FROM class", $connection);

            	if (!$result){
            		die("Database query error.");
            	}

                while ($row = mysql_fetch_array($result)){
                	echo("
            	    <article class='classDescription'>
            	        <h3 class='title'>".$row[name]."</h3>
            	        <div class='smallPrint'><span>".$row[enrolledCnt]." Enrolled </span> | Created: ");
                       echo date('F jS Y g:i A', $row[createdDate]);
                   
                       echo ("</div>");
                       /*
                        echo ("</div>
                        <div class='modifiedDate'>Modified on: ");
                
                        echo date('F jS Y g:i A', $row[lastModDate]);
                        */
            	        echo ("<div class='description'>
            	            <p>".$row[description]."</p>
            	        </div>
            	    </article>");
            	}
	
            	mysql_free_result($result);
            	?>
        	
        	</section>
        	
        </div> <!-- .oneColumn -->
	
    </div> <!--#wrapper -->

<?php include_once 'includes/footer.php'; ?>