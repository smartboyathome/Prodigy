<?php
    echo("
    <div id='mainColumn'>            

    <h2 class='header'>Popular Classes</h2>");
    
	$prodigyDB = new mysqlDAL;

	foreach ($prodigyDB->getPopularClassList() as $row){

	echo("

    <section class='classDescription' data-link='index.php?module=viewclass&classid=".$row['classID']."'>
         <h3 class='title'>".$row['name']."</h3>
        <div class='smallPrint'>Created on ");
    
    echo date('F jS Y \a\t g:i A', $row[createdDate]);


    echo("</div>
        <div class='description'>".$row['description']."</div>
        </section>");
    }

?>

</div>

        <div id="secondaryColumn">
            <div class="container" style="height: 460px;">
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
        </div>