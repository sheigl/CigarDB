<?php
function View($Cigar, $ViewBag){
	$CigarBrandName = $ViewBag->CigarBrand->CigarBrandName;
	$CigarBrandID = $ViewBag->CigarBrand->CigarBrandID;
	
	include_once 'header.php';
	
	echo "<h2>$CigarBrandName</h2>";
	echo "<div class=\"row wrapper\">";
	
	foreach($Cigar as $item){
		
		echo "
		<div class=\"col-sm-3\">
			<a href=\"?controller=cigar&action=index&id=$item->CigarID\">$item->CigarName</a>
		</div>
		
		";
	}
	
	echo "
	<div class=\"col-sm-3\">
		<a class=\"add\" href=\"?controller=cigar&action=create&brandid=$CigarBrandID\"><i class=\"fa fa-plus-square\"></i>Add New Cigar</a>
	</div>
	";
	
	echo "</div>";
				
	echo "
		<hr />
		
		<div class=\"row\">
			<div class=\"col-sm-9\">
			    <a class=\"btn btn-default\" href=\"?controller=brand&action=edit&id=$CigarBrandID\">Edit Brand</a>
				<a class=\"btn btn-default\" href=\"?controller=brand&action=index\">Back</a>
			</div>						
		</div>
	";
	
	include_once 'footer.php';
}
?>