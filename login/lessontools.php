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
        <div class="classpage">
        <form name="input" action="lessontools.php" method="post">
                <?php
                if ($mode == "new"){
                    echo("<h3 class='header'>Add a Lesson to ".$classname."</h3>");
                } elseif ($mode == "edit"){
                    echo("<h3 class='header'>Editing the lesson ".$name." from ".$classname."</h3>");
                }
                ?>
                
                <div class="module" style="margin-top: 15px">
                <table class="tableCreateClass">
                    <tr>
                        <td>Lesson Name:</td>
                        <td> <input type="text" size="35" name="name" value="<?php 

                        if(!empty($name)) echo $name; ?>" /></td>
                    <tr>
                    <tr>
                        <td>Lesson Number:</td>
                        <td><input type="text" size="3" name="number" value="<?php if(!empty($num)) echo $num; ?>" /></td>
                    </tr>
                    <tr>
                        <td><p style="margin-top: -75px;">Content:</p></td>
                        <td>
                            <textarea name="content" rows="10" cols="50"><?php if(!empty($cont)) echo $cont; ?></textarea>
                        </td>
                            
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php
                            if ($mode =="edit"){
                                echo("<input type='submit' class='button' value='Edit Lesson' style='margin: 5px;' name='Submit'/>");
                            }elseif ($mode=="new"){
                                echo("<input type='submit' class='button' value='Create Lesson' style='margin: 5px;' name='Submit'/>");
                            }
                            ?>
                            
                            <?php if(!empty($_GET['lessonid'])) { ?> <input type="hidden" name="LessonId" value="<?php echo $_GET['lessonid']; ?>" /> <?php }
                            elseif(!empty($_GET['classid'])) { ?> <input type="hidden" name="ClassId" value="<?php echo $_GET['classid']; ?>" /> <?php } ?>
                        </td>
                    </tr>
                </table>
            </div>
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

            //echo "<meta http-equiv='refresh' content='0;url=index.php?module=viewclass&classid=".$cID."'>"; 
        }

    }
}
?>