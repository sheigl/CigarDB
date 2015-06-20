<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>CigarDB</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/site.css">
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
	<div id="header">
		<div class="container">
			<div class="col-sm-6">
				<img src="logo.png" class="img-responsive" />
            </div>
            
            <div class="col-sm-6 hidden-xs">
				<ul class="nav nav-pills pull-right">
                <li><a href="index.php">Home</a></li>
                <?php

                if(isset($_SESSION['AUTH_USER'])){
                    echo "
                    <li><a href>" . $_SESSION['AUTH_USER'] . "</a></li>" 
                    . "<li style=\"margin-right:85px\"><a href=\"index.php?controller=auth&action=logout\">Logout</a></li>"
                    . "<div class=\"photo-container\" style=\"background-image:url(" . $_SESSION['AUTH_USER_PHOTO'] . ");\"></div>";
                } 
                else {
                    echo "
                    <li>" . "<a href=\"index.php?controller=auth&action=login\">Login</a>" . "</li>" 
                    . "<li><a href=\"index.php?controller=auth&action=signup\">Signup</a></li>";
                }

                ?>
            </ul>
			</div>
            
            <div class="col-sm-6 visible-xs">
				<ul class="nav nav-pills">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php">Home</a></li>
                                <?php

                                if(isset($_SESSION['AUTH_USER'])){
                                    echo "
                                    <li><a href>" . $_SESSION['AUTH_USER'] . "</a></li>" 
                                    . "<li><a href=\"index.php?controller=auth&action=logout\">Logout</a></li>";
                                } 
                                else {
                                    echo "
                                    <li>" . "<a href=\"index.php?controller=auth&action=login\">Login</a>" . "</li>" 
                                    . "<li><a href=\"index.php?controller=auth&action=signup\">Signup</a></li>";
                                }

                                ?>
                        </ul>
                    </li>
            </ul>
                <?php
                    if(isset($_SESSION['AUTH_USER'])){
                        echo "
                        <div class=\"photo-container\" style=\"background-image:url(" . $_SESSION['AUTH_USER_PHOTO'] . ");\"></div>
                        ";
                    }
                ?>
			</div>
            
		</div>
	</div>
	<div class="container">
