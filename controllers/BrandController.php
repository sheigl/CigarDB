<?php
include_once 'api/get.php';

class BrandController
{
	public function Index()
	{
		include_once 'views/Brand/BrandIndex.php';
		$Brands = getBrands();
		
		View($Brands);
	}
	
	public function Detail()
	{
		
	}
	
	public function Edit($id, $method = null, $postdata = null)
	{
		include_once 'views/Brand/Edit.php';
		include_once 'api/repository.php';
		
		if($method == "POST"){
			
			$Brand = getBrandByID($id)[0];
			$Brand->CigarBrandName = $postdata['CigarBrandName'];
			
			if(empty($Brand->CigarBrandName)){
				$ViewBag->errorMessage[] = "Brand Name Cannot Be Empty";
				
				View($Brand, $ViewBag);
			}
			else{
				$repository = new BrandRepository();
				$repository->Update($Brand);
				
				RedirectTo("brand", "index");
			}
		}
		else{
			$Brand = getBrandByID($id)[0];
			View($Brand, $ViewBag);
		}
		
		
	}
	
}
	
?>