<?php
    echo("<h2 class='header'>Popular Classes</h2>");
    
	$prodigyDB = new mysqlDAL;

	foreach ($prodigyDB->getClassList() as $row){

	echo("

    <section class='classDescription'>
         <h3 class='title'><a href='index.php?module=viewclass&classid=".$row['classID']."'>".$row['name']."</a></h3>
        <div class='smallPrint'><span>".$row['enrolledCnt']." Enrolled</span> | Created: ");
    
    echo date('F jS Y g:i A', $row[createdDate]);


    echo("</div>
        <div class='description'>".$row['description']."</div>
        </section>");
    }

?>