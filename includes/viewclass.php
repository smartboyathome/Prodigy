<?PHP

$prodigyDB = new mysqlDAL;

foreach ($prodigyDB->getClass($_GET["classid"]) as $row){

echo $row['name'] . "<br/>";

}


foreach ($prodigyDB->getLessonList($row['classID']) as $row2){
	echo $row2['name'] . "<br/>";
}

?>