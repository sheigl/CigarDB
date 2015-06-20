<?php
	include_once "api/get.php";
	$GLOBALS['title'] = "CigarDB written in PHP";
?>
<?php 
	session_start();
	// Should session_start() go here or in the header?
    // Session timeout
    if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)){
        session_unset();
        session_destroy();
    }
    $_SESSION['LAST_ACTIVITY'] = time();
    
	if($_GET['controller'] == "brand" && $_GET['action'] == 'index'){
		include_once 'controllers/BrandController.php';
		$BrandController = new BrandController();
		$BrandController->Index();
	}
	
	else if($_GET['controller'] == "brand" && $_GET['action'] == 'edit' && $_SESSION['AUTH_USER_ROLE'] == "Admin"){
		
		if($_GET['id'] == null){
				RedirectTo("brand", "index");
		}
			
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			include_once 'controllers/BrandController.php';
			$BrandController = new BrandController();
			$BrandController->Edit($_GET['id'], $_SERVER['REQUEST_METHOD'], $_POST);			
		}
		else{
			include_once 'controllers/BrandController.php';
			$BrandController = new BrandController();
			$BrandController->Edit($_GET['id']);
		}
	}
	
	else if($_GET['controller'] == "auth" && $_GET['action'] == 'signup'){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			include_once 'controllers/AuthController.php';
			$AuthController = new AuthController();
			$AuthController->Signup($_SERVER['REQUEST_METHOD'], $_POST);
		}
		else{
			include_once 'controllers/AuthController.php';
			$AuthController = new AuthController();
			$AuthController->Signup();
		}
	}
	
	else if($_GET['controller'] == "auth" && $_GET['action'] == 'login'){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			include_once 'controllers/AuthController.php';
			$AuthController = new AuthController();
			$AuthController->Login($_SERVER['REQUEST_METHOD'], $_POST);
		}
		else{
			include_once 'controllers/AuthController.php';
			$AuthController = new AuthController();
			$AuthController->Login();
		}
	}
	
	else if($_GET['controller'] == "auth" && $_GET['action'] == 'logout'){
		include_once 'controllers/AuthController.php';
		$AuthController = new AuthController();
		$AuthController->Logout();	
	}
	
	else if($_GET['controller'] == "cigar" && $_GET['action'] == 'cigarbybrand'){
		include_once 'controllers/CigarController.php';
		
		$CigarController = new CigarController();
		$CigarController->CigarByBrand($_GET['brandid']);
		
	}
	
	else if($_GET['controller'] == "cigar" && $_GET['action'] == 'index'){
		include_once 'controllers/CigarController.php';
		$CigarController = new CigarController();				
		$CigarController->Index($_GET['id']);
	}
	
	else if($_GET['controller'] == "cigar" && $_GET['action'] == 'create' && $_SESSION['AUTH_USER_ROLE'] == "Admin"){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			include_once 'controllers/CigarController.php';
			$CigarController = new CigarController();
			$CigarController->Create($_SERVER['REQUEST_METHOD'], $_POST, $_GET);
			
		}
		else{
			include_once 'controllers/CigarController.php';
			$CigarController = new CigarController();
			$CigarController->Create("", "", $_GET);
		}
	}
	
	else if($_GET['controller'] == "cigar" && $_GET['action'] == 'edit' && $_SESSION['AUTH_USER_ROLE'] == "Admin"){
		if($_GET['id'] == null){
				RedirectTo("brand", "index");
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			include_once 'controllers/CigarController.php';
			$CigarController = new CigarController();
			$CigarController->Edit($_GET['id'], $_SERVER['REQUEST_METHOD'], $_POST);
			
		}
		else{
			include_once 'controllers/CigarController.php';
			$CigarController = new CigarController();
			$CigarController->Edit($_GET['id']);
		}
	}

    else if($_GET['controller'] == "cigar" && $_GET['action'] == 'delete' && $_SESSION['AUTH_USER_ROLE'] == "Admin"){
        if($_GET['id'] == null){
            RedirectTo("brand", "index");
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            include_once 'controllers/CigarController.php';
            $CigarController = new CigarController();
            $CigarController->Delete($_SERVER['REQUEST_METHOD'], $_POST, $_GET);
        }
        else{
            include_once 'controllers/CigarController.php';
            $CigarController = new CigarController();
            $CigarController->Delete("", "", $_GET);
        }
    }
	
	else if($_GET['controller'] == "api" && $_GET['action'] == 'get'){
		include_once 'controllers/APIController.php';
		$APIController = new APIController();
		$APIController->Get($_GET);
	}

    else if($_SESSION['AUTH_USER_ROLE'] == null){
        RedirectTo("auth", "login");
    }
	
	else{
		include_once 'controllers/BrandController.php';

        $BrandController = new BrandController();
		$BrandController->Index();
	}
	
	function RedirectTo($controller, $action, $params = null)
	{
		if($params != null){
			foreach($params as $key => $value){
				echo "
				<script>
					window.location.href = '/CigarDB/?controller=$controller&action=$action&$key=$value'
				</script>
				";
			}
		}
		else{
			echo "
			<script>
				window.location.href = '/CigarDB/?controller=$controller&action=$action'
			</script>
			";
		}	

	}
?>