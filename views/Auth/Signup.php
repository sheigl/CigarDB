<?php
function View($ViewBag)
{
	include_once 'header.php';

	if($ViewBag->errorMessage != null){
		foreach($ViewBag->errorMessage as $error){
			echo "
			<p class=\"bg-danger\">$error</p>
			";
		}
	}
	
	echo "
	<form action=\"index.php?controller=auth&action=signup\" method=\"post\">
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Username</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarUserUsername\" Value=\"\"/>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">First Name</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarUserFirstName\" Value=\"\"/>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Last Name</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarUserLastName\" Value=\"\"/>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Email</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarUserEmail\" Value=\"\"/>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Password</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"password\" name=\"CigarUserPassword\" Value=\"\"/>
			</div>
		</div>
		
		<div class=\"row\">
			<div class=\"col-sm-3\">Photo URL</div>
			<div class=\"col-sm-9\">
				<input class=\"form-control\" type=\"text\" name=\"CigarUserPhotoURL\" Value=\"\"/>
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