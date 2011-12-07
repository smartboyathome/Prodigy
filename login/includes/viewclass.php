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
                <div class='smallPrint' style='margin-bottom: 10px;'><span>Created on ");
    
	echo date('F jS Y \a\t g:i A', $row[createdDate]);

    echo("</span></div>
                <div class='description'>".$row['description']."
                </div>


            </div>");
}

echo("            <div class='module'>
                <h3 class='header'>Lessons</h3>");

foreach ($prodigyDB->getLessonList($row['classID']) as $row2){

    $preview = showBrief($row2['content'], 75);

	echo("          <article class='classDescription' data-link='index.php?module=viewlesson&lessonid=".$row2['lessonID']."'>
                    <h4 class='title' style='margin-bottom: 15px;'><a href='index.php?module=viewlesson&lessonid=".$row2['lessonID']."'>".$row2['lessonNum'].") ".$row2['name']."</a></h4>
                    <div class='description'>".$preview."...</div>
                    </article>");
}

?>

</div>
</div>


<div id="secondaryColumn">
    <div class="container module">

        <?php if($session->logged_in){ ?>
        <h4 class="header">Tools</h4>
        <ul class="list">
        <br/>
        <a class='button' href="classtools.php?classid=<?php echo $row['classID']; ?>">Edit class</a>         <a class='button' href="lessontools.php?classid=<?php echo $_GET['classid']; ?>">Add new lesson</a>
        </ul>
        <?php }else{ ?>
        <h4 class="header">Tools</h4>
        You must be logged in to be able to contribute changes to this class.

        <?php } ?>
    </div>
    
    
</div>

