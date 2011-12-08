<?php
    echo("
    <div id='mainColumn'>            

    <h2 class='header'>Recent Classes</h2>");
    
	$prodigyDB = new mysqlDAL;

	foreach ($prodigyDB->getPopularClassList() as $row){

	echo("

    <section class='classDescription' data-link='index.php?module=viewclass&classid=".$row['classID']."'>
         <h3 class='title'>".$row['name']."</h3>
        <div class='smallPrint'><span>Created on ");
    
    echo date('F jS Y \a\t g:i A', $row[createdDate]);


    echo("</span></div>
        <div class='description'>".$row['description']."</div>
        </section>");
    }

?>

</div>

        <div id="secondaryColumn">
            <div class="container">
                <h4 class="header">What is Prodigy?</h4><div class='smallPrint'>
Welcome to Prodigy, a shared user learning system.  Here you can view classes that users just like you have created.  Once you register and log in, you can also create your own classes for others to view.  Help support Prodigy and it's users, spread the knowledge!<br><br><a href='index.php?module=gettingstarted'>Visit our getting started page to find out more</a>


<?php

if ($session->logged_in){
    echo("<br><br><b>Logged in as ".$session->username."</b>");
}

?>
</div>
            </div>
        </div>