<?php 
	$host = "";
	$user = "";
	$password = "";
	$database = "";
	
	$GLOBALS['dbsettings'] = ['host'=>$host, 'user'=>$user, 'password'=>$password, 'database'=>$database];
	$GLOBALS['dbconnectionstr'] = "mysql:host=$host;dbname=$database";
	
	/*$db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
	
	try {
		$db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
	}
	
	catch(PDOException $e) {
		echo $e->getMessage();
	}
	
	
	# close the connection
	$db = null;
		
	*/
?>