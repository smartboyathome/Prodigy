 <?php

	$prodigyDB = new mysqlDAL;

	echo("<div class='oneColumn'>
            <section class='classContainer'>
                <div class='header'>Browse Classes</div>");

	foreach ($prodigyDB->getClassList() as $row){

	echo("
	<article class='classDescription' data-link='index.php?module=viewclass&classid=".$row['classID']."'>
         <h3 class='title'><a href='index.php?module=viewclass&classid=".$row['classID']."'>".$row['name']."</a></h3>
        <div class='smallPrint'><span>Created on ");
    
    echo date('F jS Y \a\t g:i A', $row[createdDate]);


	echo("</span><div class='description'><p>".$row['description']."</p></div>
                </article>");
	}


	echo("</section>");

	if ($session->logged_in){
		echo("<br/><a class='button' href='classtools.php'>Create new class</a>");
	}


	echo("</div>");

	?>