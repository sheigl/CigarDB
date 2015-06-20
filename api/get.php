<?php
	include_once 'dbconfig.php';
	include_once 'classes/cigarbrand.php';
	include_once 'classes/cigar.php';
	include_once 'classes/cigarcountry.php';
	include_once 'classes/cigarsize.php';

	// note: functions cannot read variables defined outside of the function unless defined as global.
	function getBrands(){
		try {
			// Db
			$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
			// Statement
			$statement = $db->query('SELECT * FROM CigarBrand');
			// Setting fetch mode; PDO Associative Array, meaning column name is index
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			
			$itemArray = [];			
			
			while($row = $statement->fetch()){				
				$itemArray[] = new CigarBrand($row["CigarBrandID"], $row["CigarBrandName"]);
			}
			
			$db = null;
			
			return $itemArray;
		}
	
		catch(PDOException $e) {
			echo "ERROR " . $e->getMessage();
		}
		
		$db = null;
	}
	
	function getBrandByID($id){
		
		try {
			// Db
			$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);	
					
			$statement = $db->query("SELECT * FROM CigarBrand WHERE CigarBrandID = $id");
			// Setting fetch mode; PDO Associative Array, meaning column name is index
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			
			$itemArray = [];			
			
			while($row = $statement->fetch()){				
				$itemArray[] = new CigarBrand($row["CigarBrandID"], $row["CigarBrandName"]);
			}
			
			$db = null;
			
			return $itemArray;
		}
	
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		
		$db = null;
	}
	
	function getCigarsByBrand($CigarBrandID)
	{
		try
		{
			$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
			$statement = $db->query(
			"SELECT Cigar.*, CigarBrand.CigarBrandName, CigarSize.CigarSizeName, CigarCountry.CigarCountryName FROM Cigar 
			
			LEFT JOIN CigarBrand
			ON Cigar.CigarBrandID=CigarBrand.CigarBrandID 
			
			LEFT JOIN CigarSize
			ON Cigar.CigarSizeID=CigarSize.CigarSizeID
			
			LEFT JOIN CigarCountry
			ON Cigar.CigarCountryID=CigarCountry.CigarCountryID

			WHERE Cigar.CigarBrandID = $CigarBrandID"
			);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			
			$itemArray = [];
			
			while($row = $statement->fetch()){
				$itemArray[] = new Cigar(
				$row['CigarID'],
				$row['CigarName'],
				$row['CigarLength'],
				$row['CigarRingGauge'],
				$row['CigarFiller'],
				$row['CigarWrapper'],
				$row['CigarImageURL'],
				$row['CigarBrandID'],
				$row['CigarCountryID'],
				$row['CigarSizeID'],
				$row['CigarSizeName'],
				$row['CigarCountryName'],
				$row['CigarBrandName']
				);
			}
			
			return $itemArray;
			$db = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
		$db = null;
		
	}
	
	function getCigars(){
		try
		{
			$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
			$statement = $db->query(
			"SELECT Cigar.*, CigarBrand.CigarBrandName, CigarSize.CigarSizeName, CigarCountry.CigarCountryName FROM Cigar 
			
			LEFT JOIN CigarBrand
			ON Cigar.CigarBrandID=CigarBrand.CigarBrandID 
			
			LEFT JOIN CigarSize
			ON Cigar.CigarSizeID=CigarSize.CigarSizeID
			
			LEFT JOIN CigarCountry
			ON Cigar.CigarCountryID=CigarCountry.CigarCountryID"			
			);
			$statement->setFetchMode();
			
			$itemArray = [];
			
			while($row = $statement->fetch()){
				$itemArray[] = new Cigar(
				$row['CigarID'],
				$row['CigarName'],
				$row['CigarLength'],
				$row['CigarRingGauge'],
				$row['CigarFiller'],
				$row['CigarWrapper'],
				$row['CigarImageURL'],
				$row['CigarBrandID'],
				$row['CigarCountryID'],
				$row['CigarSizeID'],
				$row['CigarSizeName'],
				$row['CigarCountryName'],
				$row['CigarBrandName']
				);
			}
			
			return $itemArray;
			
			$db = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
		$db = null;
	}
	
	function getCigarByID($id)
	{
		try
		{
			$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
			$statement = $db->query(
			"SELECT Cigar.*, CigarBrand.CigarBrandName, CigarSize.CigarSizeName, CigarCountry.CigarCountryName FROM Cigar 
			
			LEFT JOIN CigarBrand
			ON Cigar.CigarBrandID=CigarBrand.CigarBrandID 
			
			LEFT JOIN CigarSize
			ON Cigar.CigarSizeID=CigarSize.CigarSizeID
			
			LEFT JOIN CigarCountry
			ON Cigar.CigarCountryID=CigarCountry.CigarCountryID
			
			
			WHERE Cigar.CigarID = $id"
			);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			
			$itemArray = [];
						
			while($row = $statement->fetch()){
				$itemArray[] = new Cigar(
				$row['CigarID'],
				$row['CigarName'],
				$row['CigarLength'],
				$row['CigarRingGauge'],
				$row['CigarFiller'],
				$row['CigarWrapper'],
				$row['CigarImageURL'],
				$row['CigarBrandID'],
				$row['CigarCountryID'],
				$row['CigarSizeID'],
				$row['CigarSizeName'],
				$row['CigarCountryName'],
				$row['CigarBrandName']
				);
			}
			
			return $itemArray;
			
			$db = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
		$db = null;
	}
	
	function getCigarSizes()
	{
		try
		{
			$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
			$statement = $db->query("SELECT * FROM CigarSize");
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			
			$itemArray = [];
			
			while($row = $statement->fetch()){
				$itemArray[] = new CigarSize(
					$row['CigarSizeID'],
					$row['CigarSizeName']
				);
			}
			
			return $itemArray;
			
			$db = null;
		}	
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
		$db = null;
	}
	
	function getCigarSizeByID($id)
	{
		try
		{
			$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
			$statement = $db->query("SELECT * FROM CigarSize WHERE CigarSizeID = $id");
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			
			$itemArray = [];
			
			while($row = $statement->fetch()){
				$itemArray[] = new CigarSize(
					$row['CigarSizeID'],
					$row['CigarSizeName']
				);
			}
			
			return $itemArray;
			
			$db = null;
		}	
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
		$db = null;
	}
	
	function getCigarCountries()
	{
		try
		{
			$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
			$statement = $db->query("SELECT * FROM CigarCountry");
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			
			$itemArray = [];
			
			while($row = $statement->fetch()){
				$itemArray[] = new CigarCountry(
					$row['CigarCountryID'],
					$row['CigarCountryName']
				);
			}
			
			return $itemArray;
			
			$db = null;
		}	
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
		$db = null;
	}
	
	function getCigarCountryByID($id)
	{
		try
		{
			$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
			$statement = $db->query("SELECT * FROM CigarCountry WHERE CigarCountryID = $id");
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			
			$itemArray = [];
			
			while($row = $statement->fetch()){
				$itemArray[] = new CigarCountry(
					$row['CigarCountryID'],
					$row['CigarCountryName']
				);			
			}
													
			return $itemArray;
			
			$db = null;
		}	
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
		$db = null;
	}
?>