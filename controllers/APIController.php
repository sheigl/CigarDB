<?php
include_once "api/get.php";

class APIController
{
	public function Get($get)
	{
		if($get['type'] == "brands"){
			$brands = getBrands();
			header("Access-Control-Allow-Origin: *");
			header('Content-type: application/json');
			echo json_encode($brands);
		}
		
		/*if($get['type'] == "cigars"){
			$cigars = getCigars();
			header("Access-Control-Allow-Origin: *");
			header('Content-type: application/json');
			echo json_encode($cigars);
		}*/
	}
}
	
?>