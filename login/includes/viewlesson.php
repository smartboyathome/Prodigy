<?php

$prodigyDB = new mysqlDAL;

echo("<div id='mainColumn'>");


foreach ($prodigyDB->getLesson($_GET["lessonid"]) as $row){

foreach($prodigyDB->getClass($row['classID']) as $row2){
	$className = $row2['name'];
}

echo("        <div class='module'>
                <h3 class='header' style='margin-bottom: 0;'>".$className."</h3>
                <div class='smallPrint' style='margin-bottom: 10px;'><span>Lesson ".$row['lessonNum'].": ".$row['name']."</div>
                ".$row['content']."
            </div></div>");
}



	echo("       <div id='secondaryColumn'>
	                <div class='container module'>
            <h4 class='header'>Lessons</h4>
            <ul class='list'>");

foreach ($prodigyDB->getLessonList($row2['classID']) as $row3){
	echo("<li><a href='index.php?module=viewlesson&lessonid=".$row3['lessonID']."'>".$row3['lessonNum'].") ".$row3['name']."</a></li>");
}
?>          
            
            </ul>
            </div>
            
            <div class="container">
                <h4 class="header">Test Your Knowledge</h4>
                <ul class="list">
                    <li><a href="">Take The Quiz</a></li>
            </div>
                
        </div>