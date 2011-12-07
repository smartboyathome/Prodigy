<?php

$prodigyDB = new mysqlDAL;

function showBrief($str, $length) {
  $str = strip_tags($str);
  $str = explode(" ", $str);
  return implode(" " , array_slice($str, 0, $length));
}

echo("<div id='mainColumn'>");

foreach ($prodigyDB->getClass($_GET["classid"]) as $row){

 echo("<div class='module flc'>
                <h3 class='header'>".$row['name']."</h3>
                <div class='smallPrint' style='margin-bottom: 10px;'><span>".$row['enrolledCnt']." Users Enrolled</span> | Created on ");
    
	echo date('F jS Y \a\t g:i A', $row[createdDate]);

    echo("		</div>
                <div class='description'>".$row['description']."
                </div>
                
                <div class='fr' style='margin-top:15px;'>
                    <a class='button'>Enroll Now</a>
                </div>
            </div>");
}

echo("            <div class='module'>
                <h3 class='header'>Lessons</h3>");

foreach ($prodigyDB->getLessonList($row['classID']) as $row2){

    $preview = showBrief($row2['content'], 75);

	echo("          <article class='classDescription'>
                    <h4 class='title' style='margin-bottom: 15px;'><a href='index.php?module=viewlesson&lessonid=".$row2['lessonID']."'>".$row2['lessonNum'].") ".$row2['name']."</a></h4>
                    <div class='description'>".$preview."...</div>
                    </article>");
}

?>

</div>
</div>

<div id="secondaryColumn">
    <div class="container module">
        <h4 class="header">What You'll Learn</h4>
        <ul class="list">
            <?php
            
            foreach ($prodigyDB->getLessonList($row2['classID']) as $row3){
            	echo("<li><a href='index.php?module=viewlesson&lessonid=".$row3['lessonID']."'>".$row3['lessonNum'].") ".$row3['name']."</a></li>");
            }
            
            ?>
        </ul>
    </div>
    
    <div class="container module">
        <h4 class="header">Quizzes</h4>
        <ul class="list">
            <li><a href="">On Astrobiology</a></li>
            <li><a href="">On Life in the Universe</a></li>
            <li><a href="">On Origin of Life</a></li>
            <li><a href="">On Exploring the Moon</a></li>
        </ul>
    </div>
</div>

