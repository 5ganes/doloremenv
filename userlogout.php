<?php
	session_start();
	session_unset();
	session_destroy();
	if($_GET['lan']=='en') header("Location:en/userlogin"); else header("Location:userlogin");
	exit();