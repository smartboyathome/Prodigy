<!DOCTYPE HTML>

<?php

include_once 'conf.php';
include_once 'dal/mysql.php';
if(!isset($_POST['Submit']))
{
include_once 'includes/header.php';
$name = "";

if (!$session->logged_in)
die("Not logged in.");

$prodigyDB = new mysqlDAL;
if (!empty($_GET["lessonid"])){
    $mode = "edit";
    foreach ($prodigyDB->getLesson($_GET["lessonid"]) as $row){
        $classID = $row['classID'];
        $name = $row['name'];
        $cont = $row['content'];
        $num = $row['lessonNum'];
    }
}elseif (!empty($_GET["classid"])){
    $mode = "new";
    $classID = $_GET["classid"];
}

foreach ($prodigyDB->getClass($classID) as $row){
    $classname = $row['name'];
}

?>

    <div id="wrapper" class="frame">
	    <div class="oneColumn">
	    <div align="center" class="classpage" style="height: auto;">
		<form name="input" action="lessontools.php" method="post">
		    <div style="font-size: 20px; padding: 15px; font-weight: bold; color: #4DA400;">

            <?php
            if ($mode == "new"){
                echo("Creating a new lesson for the ".$classname." class");
            }elseif ($mode == "edit"){
                echo("Editing the lesson ".$name." from the ".$classname." class");
            }
            
            ?> </div>
		    Lesson Name: <input type="text" size="35" name="name" style="border-radius: 2px;" value="<?php 

            if(!empty($name)) echo $name; ?>" /> <br>
            Lesson Number: <input type="text" size="3" name="number" style="border-radius: 2px;" value="<?php if(!empty($num)) echo $num; ?>" /><br />

             <br>
            Content:<br />
            <textarea name="content" rows='20' cols='70'><?php if(!empty($cont)) echo $cont; ?></textarea>
		    <br> 

            <?php
            if ($mode =="edit"){
                echo("<input type='submit' value='Edit Lesson' style='margin: 5px;' name='Submit'/>");
            }elseif ($mode=="new"){
                echo("<input type='submit' value='Create Lesson' style='margin: 5px;' name='Submit'/>");
            }
            ?>
            <?php if(!empty($_GET['lessonid'])) { ?> <input type="hidden" name="LessonId" value="<?php echo $_GET['lessonid']; ?>" /> <?php }
            elseif(!empty($_GET['classid'])) { ?> <input type="hidden" name="ClassId" value="<?php echo $_GET['classid']; ?>" /> <?php } ?>
		</form>
	    </div>
	    </div>
	
	
    </div> <!--#wrapper -->
<?php
include_once 'includes/footer.php';
}
else
{

    if(!empty($_POST['name']) && !empty($_POST['number']) && !empty($_POST['content']))
    {

        $db = new mysqlDAL;
        if(isset($_POST['LessonId']))
        {
            $db->editLesson($_POST['LessonId'], $_POST['number'], $_POST['name'], $_POST['content']);

            $lID = $_POST['LessonId'];

            echo "<meta http-equiv='refresh' content='0;url=index.php?module=viewlesson&lessonid=".$lID."'>";

        }
        else if(isset($_POST['ClassId']))
        {
            $db->addLesson($_POST['ClassId'], $_POST['number'], $_POST['name'], $_POST['content']);

            $cID = $_POST['ClassId'];

            echo "<meta http-equiv='refresh' content='0;url=index.php?module=viewclass&classid=".$cID."'>"; 
        }

    }
}
?>