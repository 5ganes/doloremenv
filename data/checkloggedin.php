<?php
	$userLoggedIn = false;
	if(isset($_SESSION['userId'])){
		$userLoggedIn = true;
	}