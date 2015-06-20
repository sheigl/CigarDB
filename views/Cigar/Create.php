<?php

function View($Cigar = null, $ViewBag)
{
	include_once 'header.php';

	$CigarBrandID = $ViewBag->SelectedBrand;
	
	if($ViewBag->errorMessage != null){
		foreach($ViewBag->errorMessage as $error){
			echo "
			<p class=\"bg-danger\">$error</p>
			";
		}
	}
	
	echo "
	<form action=\"index.php?controller=cigar&action=create&brandid=$CigarBrandID\" method=\"post\">
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Name</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarName\" value=\"" . $Cigar->CigarName . "\" />
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Length</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarLength\" value=\"" . $Cigar->CigarLength . "\" />
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Ring Gauge</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarRingGauge\" value=\"" . $Cigar->CigarRingGauge . "\" />
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Filler</div>
			<div class=\"col-sm-9\">
				<select class=\"form-control\" id=\"CigarFiller\" name=\"CigarFiller\">
				";
				
				echo "<option selected>Select A Country</option>";
				
				foreach($ViewBag->Countries as $country){
					echo "<option value=\"$country->CigarCountryName\">$country->CigarCountryName</option>";
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
				
				echo "<option selected>Select A Country</option>";
				
				foreach($ViewBag->Countries as $country){
					echo "<option value=\"$country->CigarCountryName\">$country->CigarCountryName</option>";
				}
				
				echo "
				</select>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Manufactured In</div>
			<div class=\"col-sm-9\">
				<select class=\"form-control\" id=\"CigarCountryID\" name=\"CigarCountryID\">
				";
				
				echo "<option selected>Select A Country</option>";	
				
				foreach($ViewBag->Countries as $country){
					echo "<option value=\"$country->CigarCountryID\">$country->CigarCountryName</option>";
				}
				
				echo "
				</select>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Size</div>
			<div class=\"col-sm-9\">
				<select class=\"form-control\" id=\"CigarSizeID\" name=\"CigarSizeID\">
				";
				
				echo "<option selected>Select A Size</option>";	
				foreach($ViewBag->Sizes as $size){
					echo "<option value=\"$size->CigarSizeID\">$size->CigarSizeName</option>";
				}
				
				echo "
				</select>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Brand</div>
			<div class=\"col-sm-9\">
				<select class=\"form-control\" id=\"CigarBrandID\" name=\"CigarBrandID\">
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
				<input class=\"form-control\" type=\"text\" name=\"CigarImageURL\" value=\"" . $Cigar->CigarImageURL . "\" />
			</div>
		</div>
		
		<hr />
			
		<div class=\"row\">
			<div class=\"col-sm-6\">
				<input class=\"btn btn-default\" type=\"submit\" name=\"Submit\" value=\"Submit\" />
				<a class=\"btn btn-default\" href=\"?controller=cigar&action=cigarbybrand&brandid=$CigarBrandID\">Back</a>
			</div>
		</div>
	</form>
	";	

	include_once 'footer.php';
}

?>