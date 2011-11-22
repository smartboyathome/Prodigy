<?php

$prodigyDB = new mysqlDAL;

foreach ($prodigyDB->getClass($_GET["classid"]) as $row){

 echo("<div class='module flc'>
                <h3 class='header'>".$row['name']."</h3>
                <div class='smallPrint' style='margin-bottom: 10px;'><span>".$row['enrolledCnt']." Users Enrolled</span> | Created on ");
    
	echo date('F jS Y \a\t g:i A', $row[createdDate]);

    echo("		</div>
                <div class='description'>".$row['description']."
                </div>
                
                <div class='fr'>
                    <a class='button'>Enroll Now</a>
                </div>
            </div>");
}

echo("            <div class='module'>
                <h3 class='header' style='margin-bottom: 0;'>Lessons</h3>");

foreach ($prodigyDB->getLessonList($row['classID']) as $row2){

	echo("          <article class='classDescription'>
                    <h4 class='title'><a href='index.php?module=viewlesson&lessonid=".$row2['lessonID']."'>".$row2['lessonNum'].") ".$row2['name']."</a></h4>
                    <div class='smallPrint'>Modified On: 12/12/12</div>
                    <div class='description'>".$row2['description']."</div>
                    </article>");
}

?>

</div>
    