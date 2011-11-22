<?php
/*
 * Prodigy Shared Learning System
 * MySQL Database Abstraction Layer
 *
 */
 

class mysqlDAL{

    //************************************************************************************
    //addClass
    //adds a new class to the database
    //
    public function addClass($name, $description){
        global $db_host, $db_name, $db_user, $db_pass;

    	try {
    		$dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    		$createdDate = time();

    		$dbh->exec("INSERT INTO class(name, description, createdDate)
                VALUES ('$name', '$description', '$createdDate')");

    		echo ("Added class ".$name);

    		$dbh = NULL;
    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}

    }


    //************************************************************************************
    //addLesson
    //adds a new lesson to the database
    //
    public function addLesson($classID, $lessonNum, $name, $description, $content){
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $createdDate = time();

            $dbh->exec("INSERT INTO lesson(classID, lessonNum, name, description, content)
                VALUES ('$classID', '$lessonNum', $name', '$description', '$content')");

            echo ("Added lesson ".$name);

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    //************************************************************************************
    //getClassList
    //retrieves a list of classes from the database
    //
    public function getClassList(){
        global $db_host, $db_name, $db_user, $db_pass;

    	try {
    		$dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    		$sql = "SELECT * FROM class";

    		return $dbh->query($sql);

    		$dbh = NULL;
    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}
    }

    //************************************************************************************
    //getLessonList
    //retrieves a list of lessons from the database
    //
    public function getLessonList($cID){
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM lesson WHERE classid='$cID' ORDER BY lessonNum ASC";

            return $dbh->query($sql);

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //************************************************************************************
    //getClass
    //retrieves a single class from the database
    //
    public function getClass($cID){
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM class WHERE classID='$cID'";

            return $dbh->query($sql);

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    //************************************************************************************
    //getLesson
    //retrieves a single lesson from the database
    //
    public function getLesson($lID){
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM lesson WHERE lessonID='$lID'";

            return $dbh->query($sql);

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>