<!DOCTYPE HTML>
<html>
	<head>
		<title>
			<?php
				if($action==0)
				{
					if (!empty($query)) {
						$pageRow = $groups->getByURLName($query);
						if ($pageRow) {
							$pageName = $pageRow['name'];
							$pageNameEn = $pageRow['nameen'];		
						}
					}
				}
			?>
			<?php if($lan=='en'){
                echo 'Department of Environment - ';
                if($pageNameEn!=""){ echo $pageNameEn;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "Home";}
            }
            else{
                echo 'वातावरण विभाग - ';
            	if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "गृहपृष्ठ";}
        	}?>
		</title>
		<?php include('baselocation.php'); ?>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">