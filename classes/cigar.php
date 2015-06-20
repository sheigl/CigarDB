<?php

class Cigar
{
	public $CigarID;
	public $CigarName;
	public $CigarLength;
	public $CigarRingGauge;
	public $CigarFiller;
	public $CigarWrapper;
	public $CigarImageURL;
	public $CigarBrandID;
	public $CigarCountryID;
	public $CigarSizeID;
	
	// View Properties
	public $CigarSizeName;
	public $CigarCountryName;
	public $CigarBrandName;
	
	public function Cigar($id, $name, $length = null, $ringgauge = null, $filler = null, $wrapper = null, $imgurl = null, $brandid, $countryid = null, $sizeid = null, $cigarsizename = null, $cigarcountryname = null, $cigarbrandname = null){
		$this->CigarID = $id;
		$this->CigarName = $name;
		$this->CigarLength = $length;
		$this->CigarRingGauge = $ringgauge;
		$this->CigarFiller = $filler;
		$this->CigarWrapper = $wrapper;
		$this->CigarImageURL = $imgurl;
		$this->CigarBrandID = $brandid;
		$this->CigarCountryID = $countryid;
		$this->CigarSizeID = $sizeid;
		$this->CigarSizeName = $cigarsizename;
		$this->CigarCountryName = $cigarcountryname;
		$this->CigarBrandName = $cigarbrandname;
	}
}	
	
?>