<!DOCTYPE HTML>

<?php
include_once 'conf.php';
include_once 'dal/mysql.php';
if(!isset($_POST['Submit']))
{
include_once 'includes/header.php';
$name = "";
$desc = "";
if(!empty($_GET['classid'])) 
{
    $prodigyDB = new mysqlDAL;

    foreach ($prodigyDB->getClass($_GET["classid"]) as $row){

    $class = $_GET['classid'];
    $name = $row['name'];
    $desc = $row['description'];
    }
}
?>

    <div id="wrapper" class="frame">
	    
	    <div align="center" class="classpage" style="height: auto;">
		<form name="input" action="classtools.php" method="post">
		    <div style="font-size: 20px; padding: 15px; font-weight: bold; color: #4DA400;">

            <?php
            if (empty($_GET['classid'])){
                echo("Create a new class by entering a class name and description");
            }else{
                echo("Editing the ".$name." class");
            }
            ?>
            </div>
		    Class Name: <input type="text" name="name" style="border-radius: 2px;" value="<?php if(!empty($name)) echo $name; ?>" /> <br> <br>
		    Description: <input type="text" size="80" name="description" style="border-radius: 2px;" value="<?php if(!empty($desc)) echo $desc; ?>" />
		    <br> 

            <?php
            if (empty($_GET['classid'])){
                echo("<input type='submit' value='Create Class' style='margin: 5px;' name='Submit'/>");
            }else{
                echo("<input type='submit' value='Edit Class' style='margin: 5px;' name='Submit'/>");
            }
            ?>

            <?php if(!empty($_GET['classid'])) { ?> <input type="hidden" name="ClassId" value="<?php echo $_GET['classid']; ?>" /> <?php } ?>
		</form>
	    </div>
	
	
    </div> <!--#wrapper -->
<?php
include_once 'includes/footer.php';
}
else
{
    if(!empty($_POST['name']) && !empty($_POST['description']))
    {
        $db = new mysqlDAL;
        if(isset($_POST['ClassId']))
        {
            echo("EDITING!");
            $db->editClass($_POST['ClassId'], $_POST['name'], $_POST['description']);
        }
        else
        {
            echo("CREATING!!");
            $db->addClass($_POST['name'], $_POST['description']);
        }
    }
}
?>
