<?php
function View($Brand, $ViewBag)
{
	$CigarBrandID = $Brand->CigarBrandID;
	$CigarBrandName = $Brand->CigarBrandName;
	
	include_once 'header.php';

	if($ViewBag->errorMessage != null){
		foreach($ViewBag->errorMessage as $error){
			echo "
			<p class=\"bg-danger\">$error</p>
			";
		}
	}
	
	echo "
	<form action=\"index.php?controller=brand&action=edit&id=$CigarBrandID\" method=\"post\">
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Brand Name</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarBrandName\" value=\"$CigarBrandName\" />
			</div>
		</div>
		
		<hr />
			
		<div class=\"row\">
			<div class=\"col-sm-6\">
				<input class=\"btn btn-default\" type=\"submit\" name=\"Submit\" value=\"Submit\" />
				<a class=\"btn btn-default\" href=\"?controller=brand&action=index\">Back</a>
			</div>
		</div>
	</form>
	";
	
	include_once 'footer.php';
}
?>