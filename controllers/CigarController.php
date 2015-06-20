<?php
include_once "api/get.php";

class CigarController
{
	public function Index($id)
	{
		include_once 'views/Cigar/CigarIndex.php';
		
		$Cigar = getCigarByID($id)[0];
		
		/*if($Cigar->CigarSizeID != null){
		$Cigar->CigarSizeName = getCigarSizeByID($Cigar->CigarSizeID)[0]->CigarSizeName;
		}
	
		if($Cigar->CigarCountryID != null){
			$Cigar->CigarCountryName = getCigarCountryByID($Cigar->CigarCountryID)[0]->CigarCountryName;
		}*/
		
		View($Cigar);
	}
	
	public function CigarByBrand($brandid)
	{
		include_once 'views/Cigar/CigarByBrand.php';
		
		$ViewBag->CigarBrand = getBrandByID($brandid)[0];
		
		$Cigar = getCigarsByBrand($brandid);
		
		View($Cigar, $ViewBag);
	}
	
	public function Edit($id, $method = null, $postdata = null)
	{
		
		if($method == "POST"){
			include_once 'api/repository.php';
			include_once 'views/Cigar/Edit.php';
			
			$Cigar = getCigarByID($id)[0];
			//$Cigar->CigarID;
			$Cigar->CigarName = $postdata['CigarName'];
			$Cigar->CigarLength = $postdata['CigarLength'];
			$Cigar->CigarRingGauge = $postdata['CigarRingGauge'];
			$Cigar->CigarFiller = $postdata['CigarFiller'];
			$Cigar->CigarWrapper = $postdata['CigarWrapper'];
			$Cigar->CigarImageURL = $postdata['CigarImageURL'];
			$Cigar->CigarBrandID = $postdata['CigarBrandName'];
			$Cigar->CigarCountryID = $postdata['CigarCountryName'];
			$Cigar->CigarSizeID = $postdata['CigarSizeName'];
			
			if(empty($Cigar->CigarName) || !is_numeric($Cigar->CigarLength) || !is_numeric($Cigar->CigarRingGauge)){
				
				
				if(empty($Cigar->CigarName)){
					$ViewBag->errorMessage[] = "Cigar Name Cannot Be Empty";
				}
				if(!is_numeric($Cigar->CigarLength)){
					$ViewBag->errorMessage[] = "Length Must Be A Number";
				}
				if(!is_numeric($Cigar->CigarRingGauge)){
					$ViewBag->errorMessage[] = "Ring Gauge Must Be A Number";
				}
				
				$ViewBag->Brands = getBrands();
				$ViewBag->Sizes = getCigarSizes();
				$ViewBag->Countries = getCigarCountries();
				
				View($Cigar, $ViewBag);
			}
			else{
				$repository = new CigarRepository();
				$repository->Update($Cigar);
				
				RedirectTo("cigar", "index", $params = ["id" => $Cigar->CigarID]);
			}
			
		}
		else{
			include_once 'views/Cigar/Edit.php';
		
			$Cigar = getCigarByID($id)[0];
			
			$ViewBag->Brands = getBrands();
			$ViewBag->Sizes = getCigarSizes();
			$ViewBag->Countries = getCigarCountries();
			
			if($Cigar->CigarSizeID != null){
			$Cigar->CigarSizeName = getCigarSizeByID($Cigar->CigarSizeID)[0]->CigarSizeName;
			}
		
			if($Cigar->CigarCountryID != null){
				$Cigar->CigarCountryName = getCigarCountryByID($Cigar->CigarCountryID)[0]->CigarCountryName;
			}
			
			View($Cigar, $ViewBag);
		}
		
	}

	public function Create($method = null, $postdata = null, $getdata = null)
	{
		if($method == "POST"){
		    include_once 'api/repository.php';
            $Cigar = new Cigar("", $postdata["CigarName"], $postdata["CigarLength"], $postdata["CigarRingGauge"], $postdata["CigarFiller"], $postdata["CigarWrapper"], $postdata["CigarImageURL"], $postdata["CigarBrandID"], $postdata["CigarCountryID"], $postdata["CigarSizeID"]);
            $repository = new CigarRepository();

            $ViewBag = "";

            if($repository->ReadOneByName($Cigar->CigarName, $Cigar->CigarBrandID)->CigarID != null){
                $ViewBag->errorMessage[] = "Cigar Name Already Exists";
            }
            if($postdata["CigarName"] == null){
                $ViewBag->errorMessage[] = "The cigar must have a name";
            }
            if($postdata["CigarLength"] != null){
                if(!is_numeric($postdata["CigarLength"])){ $ViewBag->errorMessage[] = "Length is not a number"; }
            }
            if($postdata["CigarRingGauge"] != null){
                if(!is_numeric($postdata["CigarRingGauge"])){ $ViewBag->errorMessage[] = "Ring Gauge is not a number"; }
            }
            if($ViewBag->errorMessage == null){
                $lastInsertId = $repository->Create($Cigar);
                RedirectTo("cigar", "index", ["id"=>$lastInsertId]);
            }
            if($ViewBag->errorMessage != null){
                include_once 'views/Cigar/Create.php';

                $ViewBag->Brands = getBrands();
                $ViewBag->Sizes = getCigarSizes();
                $ViewBag->Countries = getCigarCountries();

                $ViewBag->SelectedBrand = $getdata["brandid"];

                View($Cigar, $ViewBag);
            }
		}
		else{
			include_once 'views/Cigar/Create.php';
			
			$ViewBag->Brands = getBrands();
			$ViewBag->Sizes = getCigarSizes();
			$ViewBag->Countries = getCigarCountries();
			
			$ViewBag->SelectedBrand = $getdata["brandid"];
			
			View("", $ViewBag);
		}
	}

    public function Delete($method = null, $postdata = null, $getdata = null)
    {
        if($method == "POST"){
            include_once 'api/repository.php';
            $repository = new CigarRepository();
            $repository->Delete($postdata["CigarID"]);
            RedirectTo("cigar", "cigarbybrand", $params = ["brandid" => $postdata["CigarBrandID"]]);
        }
        else{
            include_once 'views/Cigar/Delete.php';
            $Cigar = getCigarByID($getdata["id"])[0];

            $ViewBag->errorMessage[] = "Are you sure you want to delete this Cigar?";
            View($Cigar, $ViewBag);
        }
    }
}
?>