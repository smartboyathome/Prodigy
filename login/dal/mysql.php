<?php
/*
 * Prodigy Shared Learning System
 * MySQL Database Abstraction Layer
 *
 */
 

class mysqlDAL{

    //************************************************************************************
    //addUser
    //adds the user to the database.
    //
    public function addUser($username, $password, $email)
    {
        global $db_host, $db_name, $db_user, $db_pass;
        
        try {
			if(!$this->userExists($username))
			{
				$dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

				$hashedPass = crypt($password);
				$sql = "INSERT INTO users(username, password, email)
					VALUES('$username', '$hashedPass', '$email')";
				$dbh->exec($sql);
				
				$dbh = NULL;
			}
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //************************************************************************************
    //checkUser
    //checks whether the username and password is valid
    //
    public function checkUser($username, $password){
        global $db_host, $db_name, $db_user, $db_pass;
        
        try {
			if(!$this->userExists($username)) return false;
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $dbh->query($sql);
            foreach($result as $row)
            {
                if(crypt($password, $row['password']) == $row['password']) return true;
            }
            return false;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
	
	//************************************************************************************
	//userExists
	//checks whether the user exists
	//
	public function userExists($username)
	{
        global $db_host, $db_name, $db_user, $db_pass;
        try {
            
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $dbh->query($sql);
            
            return $result->columnCount() != 0;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
	}
	
	//************************************************************************************
	//enrollUserInClass
	//Enrolls the user in the specified class
	//
	public function enrollUserInClass($username, $classid)
	{
        global $db_host, $db_name, $db_user, $db_pass;
        try {
            
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            
            if(!$this->userIsEnrolledInClass($username, $classid))
            {
                $sql = "INSERT INTO enrollment(username, classid) VALUES('$username', $classid)";
                $result = $dbh->exec($sql);
            }
            
            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
	}
	
	//************************************************************************************
	//userIsEnrolledInClass
	//Checks if the user is enrolled in the specified class
	//
	public function userIsEnrolledInClass($username, $classid)
	{
        global $db_host, $db_name, $db_user, $db_pass;
        try {
            
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM enrollment WHERE username='$username' AND classid=$classid";
            $result = $dbh->query($sql);
            
            return $result->columnCount() != 0 && $this->userExists($username) && $this->classExists($classid);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
	}
	
	//************************************************************************************
	//numUsersEnrolledInClass
	//The number of users enrolled in the specified class
	//
	public function numUsersEnrolledInClass($classid)
	{
        global $db_host, $db_name, $db_user, $db_pass;
        try {
            
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM enrollment WHERE classid=$classid";
            $result = $dbh->query($sql);
            
            return $result->columnCount();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
	}
	
	//************************************************************************************
	//numClassesUserEnrolledIn
	//The number of classes the specified user is enrolled in
	//
	public function numClassesUserEnrolledIn($classid)
	{
        global $db_host, $db_name, $db_user, $db_pass;
        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM enrollment WHERE username='$username'";
            $result = $dbh->query($sql);
            
            return $result->columnCount();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
	}
    
    //************************************************************************************
    //unenrollUserInClass
    //Unenrolls the user in the specified class
    //
    public function unenrollUserInClass($username, $classid)
    {
        global $db_host, $db_name, $db_user, $db_pass;
        try {
            
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            
            if($this->userIsEnrolledInClass($username, $classid))
            {
                $sql = "DELETE FROM enrollment WHERE username='$username' AND classid=$classid)";
                $result = $dbh->exec($sql);
            }
            
            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

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

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    //************************************************************************************
    //deleteClass
    //drop a class from the database
    //
    public function deleteClass($cid){
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $dbh->exec("DELETE FROM class WHERE classID='$cid'");

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    //************************************************************************************
    //editClass
    //edit a class from the database
    //
    public function editClass($cid, $cname, $cdesc){
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $createdDate = time();

            $dbh->exec("UPDATE class SET name='$cname', description='$cdesc', lastModDate='$createdDate' WHERE classID='$cid'");

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }


    //************************************************************************************
    //addLesson
    //adds a new lesson to the database
    //
    public function addLesson($classID, $lessonNum, $name, $content){
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $dbh->exec("INSERT INTO lesson(classID, lessonNum, name, content)
                VALUES ('$classID', '$lessonNum', '$name', '$content')");

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }


    //************************************************************************************
    //deleteLesson
    //drop a lesson from the database
    //
    public function deleteLesson($lid){
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $dbh->exec("DELETE FROM lesson WHERE lessonID='$lid'");

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    //************************************************************************************
    //editLesson
    //edit a lesson from the database
    //
    public function editLesson($lid, $lessonNum, $lname, $lcont){
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);


            $dbh->exec("UPDATE lesson SET name='$lname', lessonNum='$lessonNum', content='$lcont' WHERE lessonID='$lid'");

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
    //getPopularClassList
    //retrieves a list of the 3 most popular classes from the database
    //
    public function getPopularClassList(){
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM class ORDER BY createdDate DESC LIMIT 3";

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
    
    //************************************************************************************
    //classExists
    //Checks whether the specified class exists
    //
    public function classExists($classId)
    {
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM class WHERE classID='$classID'";

            return $dbh->query($sql)->columnCount() != 0;

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    //************************************************************************************
    //lessonExists
    //Checks whether the specified lesson number exists
    //
    public function lessonExists($classId, $lessonNum)
    {
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

            $sql = "SELECT * FROM lesson WHERE classID=$classID AND lessonNum=$lessonNum";

            return $dbh->query($sql)->rowCount() != 0;

            $dbh = NULL;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>