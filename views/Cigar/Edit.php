<?php
function View($Cigar, $ViewBag)
{
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
	<form action=\"index.php?controller=cigar&action=edit&id=$CigarID\" method=\"post\">
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Name</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarName\" value=\"$CigarName\" />
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Length</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarLength\" value=\"$CigarLength\" />
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Ring Gauge</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarRingGauge\" value=\"$CigarRingGauge\" />
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Filler</div>
			<div class=\"col-sm-9\">
				<select class=\"form-control\" id=\"CigarFiller\" name=\"CigarFiller\">
				";
				
				if($CigarFiller == null){
					echo "<option selected>Select A Country</option>";	
				}
				
				foreach($ViewBag->Countries as $country){
					
					if($country->CigarCountryName === $CigarFiller){
						echo "<option selected value=\"$country->CigarCountryName\">$country->CigarCountryName</option>";	
					}
					else {
						echo "<option value=\"$country->CigarCountryName\">$country->CigarCountryName</option>";
					}
				}
				
				echo "
				</select>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Wrapper</div>
			<div class=\"col-sm-9\">
				<select class=\"form-control\" id=\"CigarWrapper\" name=\"CigarWrapper\">
				";
				
				if($CigarFiller == null){
					echo "<option selected>Select A Country</option>";	
				}
				
				foreach($ViewBag->Countries as $country){
					
					if($country->CigarCountryName === $CigarFiller){
						echo "<option selected value=\"$country->CigarCountryName\">$country->CigarCountryName</option>";	
					}
					else {
						echo "<option value=\"$country->CigarCountryName\">$country->CigarCountryName</option>";
					}
				}
				
				echo "
				</select>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Manufactured In</div>
			<div class=\"col-sm-9\">
				<select class=\"form-control\" id=\"CigarCountryName\" name=\"CigarCountryName\">
				";
				
				if($CigarCountryID == null){
					echo "<option selected>Select A Country</option>";	
				}
				
				foreach($ViewBag->Countries as $country){
					
					if($country->CigarCountryID == $CigarCountryID){
						echo "<option selected value=\"$country->CigarCountryID\">$country->CigarCountryName</option>";	
					}
					else {
						echo "<option value=\"$country->CigarCountryID\">$country->CigarCountryName</option>";
					}
				}
				
				echo "
				</select>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Size</div>
			<div class=\"col-sm-9\">
				<select class=\"form-control\" id=\"CigarSizeName\" name=\"CigarSizeName\">
				";
				
				if($CigarSizeID == null){
					echo "<option selected>Select A Size</option>";	
				}
				foreach($ViewBag->Sizes as $size){
					if($size->CigarSizeID == $CigarSizeID){
						echo "<option selected value=\"$size->CigarSizeID\">$size->CigarSizeName</option>";	
					}
					else {
						echo "<option value=\"$size->CigarSizeID\">$size->CigarSizeName</option>";
					}
				}
				
				echo "
				</select>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Brand</div>
			<div class=\"col-sm-9\">
				<select class=\"form-control\" id=\"CigarBrandName\" name=\"CigarBrandName\">
				";
				
				foreach($ViewBag->Brands as $brand){
					if($brand->CigarBrandID == $CigarBrandID){
						echo "<option selected value=\"$brand->CigarBrandID\">$brand->CigarBrandName</option>";	
					}
					else {
						echo "<option value=\"$brand->CigarBrandID\">$brand->CigarBrandName</option>";
					}
				}
				
				echo "
				</select>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Image</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarImageURL\" value=\"$CigarImageURL\" />
			</div>
		</div>
		
		<!-- Hidden Fields -->
		<input name=\"CigarBrandID\" hidden value=\"\" />
		<input name=\"CigarSizeID\" hidden value=\"\" />
		<input name=\"CigarCountryID\" hidden value=\"\" />
		
		<hr />
			
		<div class=\"row\">
			<div class=\"col-sm-6\">
				<input class=\"btn btn-default\" type=\"submit\" name=\"Submit\" value=\"Submit\" />
				<a class=\"btn btn-default\" href=\"?controller=cigar&action=index&id=$Cigar->CigarID\">Back</a>
			</div>
		</div>
	</form>
	";	

	include_once 'footer.php';
}
?>