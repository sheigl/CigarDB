<?php
class UserRepository
{
	public function Read($username)
	{
		include_once 'dbconfig.php';
		include_once 'classes/cigaruser.php';
		try {
			// Db
			$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);	
					
			$statement = $db->query("SELECT * FROM CigarUser WHERE CigarUserUsername = '$username'");
			// Setting fetch mode; PDO Associative Array, meaning column name is index
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			
			$user = '';			
			
			while($row = $statement->fetch()){				
				$user = new CigarUser();
				$user->CigarUserID = $row["CigarUserID"];
				$user->CigarUserFirstName = $row["CigarUserFirstName"];
				$user->CigarUserLastName = $row["CigarUserLastName"];
				$user->CigarUserEmail = $row["CigarUserEmail"];
				$user->CigarUserPassword = $row["CigarUserPassword"];
				$user->CigarUserUsername = $row["CigarUserUsername"];
				$user->CigarMyHumidorID = $row["CigarMyHumidorID"];
				$user->CigarID = $row["CigarID"];
				$user->CigarUserPhotoURL = $row["CigarUserPhotoURL"];
				$user->CigarUserRole = $row["CigarUserRole"];
				$user->CigarUserVerified = $row["CigarUserVerified"];
			}
			
			$db = null;
			
			return $user;
		}
	
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		
		$db = null;
	}
	
	public function Create($user)
	{
		include_once 'dbconfig.php';
		
		try
			{
				$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO CigarUser (CigarID, CigarMyHumidorID, CigarUserEmail, CigarUserFirstName, CigarUserLastName, CigarUserPassword, CigarUserUsername, CigarUserPhotoURL, CigarUserRole, CigarUserVerified)
				
				VALUES (:cigarid, :cigarmyhumidorid, :cigaruseremail, :cigaruserfirstname, :cigaruserlastname, :cigaruserpassword, :cigaruserusername, :cigaruerphotourl, :cigaruserrole, :cigaruserverified)";
				
				$statement = $db->prepare($sql);
				$statement->bindValue(":cigarid", $user->CigarID);
				$statement->bindValue(":cigarmyhumidorid", $user->CigarMyHumidorID);
				$statement->bindValue(":cigaruseremail", $user->CigarUserEmail);
				$statement->bindValue(":cigaruserfirstname", $user->CigarUserFirstName);
				$statement->bindValue(":cigaruserlastname", $user->CigarUserLastName);
				$statement->bindValue(":cigaruserpassword", $user->CigarUserPassword);
				$statement->bindValue(":cigaruserusername", $user->CigarUserUsername);
				$statement->bindValue(":cigaruerphotourl", $user->CigarUserPhotoURL);
				$statement->bindValue(":cigaruserrole", $user->CigarUserRole);
				$statement->bindValue(":cigaruserverified", $user->CigarUserVerified);
				
				
				$result = $statement->execute();
				
				if($result){
					echo "true ";
					// echo a message to say the UPDATE succeeded
					echo $statement->rowCount() . " records UPDATED successfully";
				}
				else{
					echo "false";
				}
				
			}
			catch(PDOException $ex)
			{
				echo $ex->getMessage();
			}
	}
}
?>