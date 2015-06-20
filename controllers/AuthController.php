<?php
class AuthController
{
	public function Login($method = null, $postdata = null)
	{
		include_once 'api/userrepository.php';
		include_once 'views/Auth/Login.php';
		
		if($method == "POST"){
			$userrepository = new UserRepository();
			$user = $userrepository->Read($postdata["CigarUserUsername"]);
			
			if(password_verify($postdata["CigarUserPassword"], $user->CigarUserPassword)){
				
				if($user->CigarUserVerified){
					session_start();
					$_SESSION['AUTH_USER'] = $user->CigarUserUsername;
					$_SESSION['AUTH_USER_ROLE'] = $user->CigarUserRole;
					$_SESSION['AUTH_USER_PHOTO'] = $user->CigarUserPhotoURL;
				
					RedirectTo("brands", "index");
				}
				else{
					$ViewBag->errorMessage[] = "Account Not Verified";
					View($ViewBag);
				}
			}
			else{
				$ViewBag->errorMessage[] = "Invalid Password";
				View($ViewBag);
			}
			
		}
		else{
			View($ViewBag);
		}
	}
	
	public function Logout()
	{
		session_start();
		unset($_SESSION['AUTH_USER']);
		unset($_SESSION['AUTH_USER_ROLE']);
		unset($_SESSION['AUTH_USER_PHOTO']);
		session_destroy();
		
		RedirectTo("auth", "login");
	}
	
	public function Signup($method = null, $postdata = null)
	{
		include_once 'api/userrepository.php';
		include_once 'views/Auth/Signup.php';
		include_once 'classes/cigaruser.php';
		
		if($method == "POST"){
			$userrepository = new UserRepository();
			
			$user = new CigarUser();
			//$user->CigarID = $postdata[""];
			//$user->CigarMyHumidorID; 
			$user->CigarUserEmail = $postdata["CigarUserEmail"];
			$user->CigarUserFirstName = $postdata["CigarUserFirstName"]; 
			$user->CigarUserLastName = $postdata["CigarUserLastName"];
			$user->CigarUserPassword = password_hash($postdata["CigarUserPassword"], PASSWORD_DEFAULT); 
			$user->CigarUserUsername = $postdata["CigarUserUsername"]; 
			//$user->CigarUserID;
			$user->CigarUserPhotoURL = $postdata["CigarUserPhotoURL"];
			$user->CigarUserRole = "Guest";
			$user->CigarUserVerified = false;
			
			$userrepository->Create($user);
			
			RedirectTo("auth", "login");
		}
		else{
			View($ViewBag);
		}
	}
}
?>