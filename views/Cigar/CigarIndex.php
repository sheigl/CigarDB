<?php

function View($Cigar){
	$CigarID = $Cigar->CigarID;
	$CigarName = $Cigar->CigarName;
	$CigarLength = $Cigar->CigarLength;
	$CigarRingGauge = $Cigar->CigarRingGauge;
	$CigarFiller = $Cigar->CigarFiller;
	$CigarWrapper = $Cigar->CigarWrapper;
	$CigarImageURL = $Cigar->CigarImageURL;
	$CigarBrandID = $Cigar->CigarBrandID;
	$CigarCountryID = $Cigar->CigarCountryID;
	$CigarSizeID = $Cigar->CigarSizeID;
	$CigarSize = $Cigar->CigarSizeName;
	$CigarCountry = $Cigar->CigarCountryName;
	$CigarBrand = $Cigar->CigarBrandName;
		
	include_once 'header.php';
										
	echo "
	<h2>$CigarName</h2>
	";
	
	if($CigarImageURL != null){
		echo "
		<div class=\"row\">
		<div class=\"col-sm-9\">
			<img src=\"$CigarImageURL\" class=\"img-responsive\" />
		</div>
		</div>
		";
	}
	
	echo "
	<div class=\"row\">
		<div class=\"col-sm-3\">Length</div>
		<div class=\"col-sm-9\">$CigarLength</div>
	</div>
	
	<div class=\"row\">
		<div class=\"col-sm-3\">Ring Gauge</div>
		<div class=\"col-sm-9\">$CigarRingGauge</div>
	</div>
	
	<div class=\"row\">
		<div class=\"col-sm-3\">Filler</div>
		<div class=\"col-sm-9\">$CigarFiller</div>
	</div>
	
	<div class=\"row\">
		<div class=\"col-sm-3\">Wrapper</div>
		<div class=\"col-sm-9\">$CigarWrapper</div>
	</div>
	
	<div class=\"row\">
		<div class=\"col-sm-3\">Manufactured In</div>
		<div class=\"col-sm-9\">$CigarCountry</div>
	</div>
	
	<div class=\"row\">
		<div class=\"col-sm-3\">Size</div>
		<div class=\"col-sm-9\">$CigarSize</div>
	</div>
	
	<div class=\"row\">
		<div class=\"col-sm-3\">Brand</div>
		<div class=\"col-sm-9\">$CigarBrand</div>
	</div>
	
	<hr />
		
	<div class=\"row\">
		<div class=\"col-sm-6\">
			<a class=\"btn btn-default\" href=\"?controller=cigar&action=cigarbybrand&brandid=$CigarBrandID\">Back</a>
			<a class=\"btn btn-default\" href=\"?controller=cigar&action=edit&id=$Cigar->CigarID\">Edit</a>
			<a class=\"btn btn-default\" href=\"?controller=cigar&action=delete&id=$Cigar->CigarID\">Delete</a>
		</div>
	</div>
	";
	
	include_once 'footer.php';
}
	
?>