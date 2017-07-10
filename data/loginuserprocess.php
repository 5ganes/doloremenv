<?php
	if(isset($_POST['loginuser'])){
		extract($_POST);
		if($users->validateInfoUser($username, $password)){
			if($lan == 'en') header('Location:'.SITE_URL.'en/our_documents'); else header('Location:'.SITE_URL.'our_documents');
		}
		else{
			if($lan=='en') header('Location:'.SITE_URL.'index.php?action=userlogin&lan=en&msg=Login failed. Please try again.');
			else header('Location:'.SITE_URL.'index.php?action=userlogin&msg=Login failed. Please try again.');
		}
	}