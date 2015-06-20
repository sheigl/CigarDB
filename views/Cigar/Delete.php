<?php

function View($Cigar, $ViewBag){
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

    if($ViewBag->errorMessage != null){
        foreach($ViewBag->errorMessage as $error){
            echo "
			<p class=\"bg-danger\">$error</p>
			";
        }
    }

    echo "
	<h2>$CigarName</h2>
	";

    echo "

	<form action=\"index.php?controller=cigar&action=delete&id=$CigarID\" method=\"post\">
	    <input hidden type=\"text\" value=\"$CigarID\" name=\"CigarID\"/>
	    <input hidden type=\"text\" value=\"$CigarBrandID\" name=\"CigarBrandID\"/>
	    <input type=\"submit\" value=\"Delete\" name=\"Delete\" class=\"btn btn-danger\" />
	    <a class=\"btn btn-default\" href=\"?controller=cigar&action=index&id=$CigarID\">Back</a>
	</form>

	<hr />

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
	";

    include_once 'footer.php';
}

?>