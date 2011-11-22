<?php

$prodigyDB = new mysqlDAL;

foreach ($prodigyDB->getLesson($_GET["lessonid"]) as $row){
	echo $row['name'] . "<br/><br/>".$row['content'];
}

?>