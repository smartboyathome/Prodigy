 <?php

	$prodigyDB = new mysqlDAL;

	echo("<div id='wrapper' class='frame flc'>       
	 <div class='oneColumn'>
            <section class='classContainer'>
                <div class='header'>Browse Classes</div>");

	foreach ($prodigyDB->getClassList() as $row){

	echo("
	<article class='classDescription'>
         <h3 class='title'><a href='index.php?module=viewclass&classid=".$row['classID']."'>".$row['name']."</a></h3>
        <div class='smallPrint'><span>".$row['enrolledCnt']." Users Enrolled</span> | Created on ");
    
    echo date('F jS Y \a\t g:i A', $row[createdDate]);


	echo("</div>
            	    <div class='description'><p>".$row['description']."</p></div>
                </article>");
	}

	echo("</section></div>");

	?>