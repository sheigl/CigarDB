<?php
    class CigarRepository
	{
		public function ReadOneByName($name, $brandid)
        {
            try
            {
                $db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM Cigar WHERE Cigar.CigarName = :name AND Cigar.CigarBrandID = :brandid";

                $statement = $db->prepare($sql);
                $statement->bindValue(":name", $name);
                $statement->bindValue(":brandid", $brandid);
                $statement->execute();

                $statement->setFetchMode(PDO::FETCH_ASSOC);

                $result = $statement->fetch();

                $Cigar = new Cigar($result["CigarID"], $result["CigarName"], $result["CigarLength"], $result["CigarRingGauge"], $result["CigarFiller"], $result["CigarWrapper"], $result["CigarImageURL"], $result["CigarBrandID"], $result["CigarCountryID"], $result["CigarSizeID"]);
                return $Cigar;

            }
            catch (PDOException $ex)
            {
                echo $ex->getMessage();
            }
        }

        public function Create($Cigar)
        {
            try
            {
                $db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO Cigar (CigarBrandID, CigarCountryID, CigarFiller, CigarImageURL, CigarLength, CigarName, CigarRingGauge, CigarSizeID, CigarWrapper)

                VALUES (:cigarbrandid, :cigarcountryid, :cigarfiller, :cigarimageurl, :cigarlength, :cigarname, :cigarringgauge, :cigarsizeid, :cigarwrapper)";

                $statement = $db->prepare($sql);
                $statement->bindValue(":cigarbrandid", $Cigar->CigarBrandID);
                $statement->bindValue(":cigarcountryid", $Cigar->CigarCountryID);
                $statement->bindValue(":cigarfiller", $Cigar->CigarFiller);
                $statement->bindValue(":cigarimageurl", $Cigar->CigarImageURL);
                $statement->bindValue(":cigarlength", $Cigar->CigarLength);
                $statement->bindValue(":cigarname", $Cigar->CigarName);
                $statement->bindValue(":cigarringgauge", $Cigar->CigarRingGauge);
                $statement->bindValue(":cigarsizeid", $Cigar->CigarSizeID);
                $statement->bindValue(":cigarwrapper", $Cigar->CigarWrapper);

                $result = $statement->execute();

                if($result){
                    echo "true ";
                    // echo a message to say the UPDATE succeeded
                    echo $statement->rowCount() . " records UPDATED successfully";

                    return $db->lastInsertId();
                }
                else{
                    echo "false";
                }



            }
            catch (PDOException $ex)
            {
                echo $ex->getMessage();
            }
        }

        public function Update($Cigar)
		{
			try
			{
				$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE Cigar SET 
				CigarName = :cigarname, 
				CigarLength = :cigarlength,
				CigarRingGauge = :cigarringgauge,
				CigarFiller = :cigarfiller,
				CigarWrapper = :cigarwrapper,
				CigarImageURL = :cigarimageurl,
				CigarSizeID = :cigarsizeid,
				CigarCountryID = :cigarcountryid,
				CigarBrandID = :cigarbrandid
				
				WHERE CigarID = :cigarid";
				
				$statement = $db->prepare($sql);
				$statement->bindValue(":cigarname", $Cigar->CigarName);
				$statement->bindValue(":cigarlength", $Cigar->CigarLength);
				$statement->bindValue(":cigarringgauge", $Cigar->CigarRingGauge);
				$statement->bindValue(":cigarfiller", $Cigar->CigarFiller);
				$statement->bindValue(":cigarwrapper", $Cigar->CigarWrapper);
				$statement->bindValue(":cigarimageurl", $Cigar->CigarImageURL);
				$statement->bindValue(":cigarsizeid", $Cigar->CigarSizeID);
				$statement->bindValue(":cigarcountryid", $Cigar->CigarCountryID);
				$statement->bindValue(":cigarbrandid", $Cigar->CigarBrandID);
				$statement->bindValue(":cigarid", $Cigar->CigarID);
				
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

        public function Delete($id)
        {
            try
            {
                $db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM Cigar WHERE Cigar.CigarID = :cigarid";

                $statement = $db->prepare($sql);
                $statement->bindValue(":cigarid", $id);

                $statement->execute();
            }
            catch(PDOException $ex)
            {
                echo $ex->getMessage();
            }
        }
	}
	class BrandRepository
	{
		public function Update($Brand)
		{
			try
			{
				$db = new PDO($GLOBALS['dbconnectionstr'], $GLOBALS['dbsettings']['user'], $GLOBALS['dbsettings']['password']);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE CigarBrand SET 
				CigarBrandName = :cigarbrandname 
				WHERE CigarBrandID = :cigarbrandid";
				
				$statement = $db->prepare($sql);
				$statement->bindValue(":cigarbrandname", $Brand->CigarBrandName);
				$statement->bindValue(":cigarbrandid", $Brand->CigarBrandID);
				
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