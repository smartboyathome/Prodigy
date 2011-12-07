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
	    <div class="oneColumn">
	        <div class="classpage">
    		<form name="input" action="classtools.php" method="post">
    		    
                <?php
                if (empty($_GET['classid'])){
                    echo("<h3 class='header'>Create Your Class</h3>");
                }else{
                    echo("<h3 class='header'>Editing ".$name."</h3>");
                }
                ?>
                
    		    <div class="module" style="margin-top: 15px;">
		            <table class="tableCreateClass">
		                <tr>
		                    <td>Class Name:</td>
		                    <td> <input type="text" size="35" name="name" value="<?php if(!empty($name)) echo $name; ?>" /></td>
		                <tr>
		                <tr>
		                    <td>Description:</td>
		                    <td><textarea name="description" rows="5" cols="50" value="<?php if(!empty($desc)) echo $desc; ?>"></textarea>
		                </tr>
		                <tr>
		                    <td colspan="2">
                                <?php
                                if (empty($_GET['classid'])){
                                    echo("<input type='submit' class='button' value='Create Class' style='margin: 5px;' name='Submit'/>");
                                }else{
                                    echo("<input type='submit' class='button' value='Edit Class' style='margin: 5px;' name='Submit'/>");
                                }
                                ?>
                        		<?php if(!empty($_GET['ClassId'])) { ?> <input type="hidden" name="ClassId" value="<?php echo $_GET['ClassId']; ?>" /> <?php } ?>
                        			<input class="button" type="reset" value="Reset Forms" style="margin: 5px;">
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
