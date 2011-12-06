<!DOCTYPE HTML>

<?php
include_once 'conf.php';
include_once 'dal/mysql.php';
if(!isset($_POST['Submit']))
{
include_once 'includes/header.php';
$name = "";
$desc = "";
if(!empty($_GET['LessonId'])) 
{
    $db = new mysqlDAL;
    $lesson = $db->getLesson($_GET['LessonId']);
    $name = $lesson['name'];
    $desc = $lesson['description'];
    $cont = $lesson['content'];
    $num = $lesson['lessonNum'];
}
?>

    <div id="wrapper" class="frame">
	    <div class="oneColumn">
	    <div align="center" class="classpage" style="height: auto;">
		<form name="input" action="classtools.php" method="post">
		    <div style="font-size: 20px; padding: 15px; font-weight: bold; color: #4DA400;">Welcome! Create a new class by entering a class name and description.</div>
		    Lesson Name: <input type="text" name="name" style="border-radius: 2px;" value="<?php if(!empty($name)) echo $name; ?>" /> <br> <br>
		    Description: <input type="text" size="80" name="description" style="border-radius: 2px;" value="<?php if(!empty($desc)) echo $desc; ?>" /><br />
            Lesson Number: <input type="text" size="3" name="number" style="border-radius: 2px;" value="<?php if(!empty($num)) echo $num; ?>" /><br />
            Content:<br />
            <textarea name="content">
                <?php if(!empty($cont)) echo $cont; ?>
            </textarea>
		    <br> <input type="submit" value="Create Lesson" style="margin: 5px;" name="Submit"/>
            <?php if(!empty($_GET['LessonId'])) { ?> <input type="hidden" name="LessonId" value="<?php echo $_GET['LessonId']; ?>" /> <?php }
            elseif(!empty($_GET['ClassId'])) { ?> <input type="hidden" name="ClassId" value="<?php echo $_GET['ClassId']; ?>" /> <?php } ?>
		    <input type="reset" value="Reset Forms" style="margin: 5px;">
		</form>
	    </div>
	    </div>
	
	
    </div> <!--#wrapper -->
<?php
include_once 'includes/footer.php';
}
else
{
    if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['content']))
    {
        $db = new mysqlDAL;
        if(isset($_POST['LessonId']))
        {
            $db->editLesson($_POST['LessonId'], $_POST['name'], $_POST['description'], $_POST['content']);
        }
        else if(isset($_POST['ClassId']) && !empty($_POST['number']) && $db->lessonExists($_POST['ClassId'], $_POST['number']))
        {
            $db->addLesson($_POST['ClassId'], $_POST['number'], $_POST['name'], $_POST['description'], $_POST['content']);
        }
    }
}
?>