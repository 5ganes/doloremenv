<style>
	.download{width:100%;}
	.download ul{ margin:0;padding: 0;}
	.download ul li{ list-style:none;margin: 1em;}
	.download ul li div{
		width: 49%;padding: 1%;
	}
	.download ul li div:nth-child(2){
		padding-top: 0;
	}
	.download ul li div a{
		border:2px solid;
		border-top: none;
	}
	.download ul li div a:hover{
		box-shadow: 2px 2px 5px gray;
	}

	.submenu ul li{
		list-style: disc;
	}
	.submenu ul li a{
		box-shadow: 2px 2px 5px gray; color: #f56a6a;
		border-bottom: none;padding: 0.6em 1em; display: block;
	}
	.submenu ul li a:hover{
		box-shadow: 4px 4px 12px red;color:#009B3E;
	}

	@media screen and (max-width: 650px){
		.download ul li div:first-child{
			width: 86%; margin-right:2%; 
		}
		.download ul li div:nth-child(2){
			width: 10%;
		}
	}
	@media screen and (max-width: 450px){
		.download ul li{
			flex-direction: column;
		}
		.download ul li div:first-child{
			width: 100%;
		}
		.download ul li div:nth-child(2){
			width: 100%; text-align: center;
		}
	}
</style>
<!-- Main -->
<div id="main">
    <div class="inner">
    <?php require 'template/header_include.php'; ?>
      <!-- Banner -->
        <section id="banner">
          <div class="content">
            <header>
              <h1><?php if($lan!='en') echo $pageName; else echo $pageNameEn;?></h1>
            </header>
            <p>
                <?php
                $content=$groups->getById($pageId);
                $contentGet=$conn->fetchArray($content);
                if($lan!='en')
                   echo $contentGet['contents'];
                else echo $contentGet['contentsen'];
                ?>
            </p>
            
            <?php
			$sub=$groups->getByParentId($pageId);
			if($conn->numRows($sub)>0)
			{
				$submenu=$conn->fetchArray($sub);
				if($submenu['linkType']=='Normal Group' or $submenu['linkType']=='Contents Page'){
					echo '<p style="font-weight: bold;">#'.$pageName.'</p>';
					echo '<div class="download submenu"><ul>';
					$down=$groups->getByParentId($pageId);
					while($downRow=$conn->fetchArray($down))
					{?>
						<li><a href="<?php if($lan=='en') echo 'en/'; echo $downRow['urlname'];?>"><?php if($lan=='en') echo $downRow['nameen']; echo $downRow['name'];?></a></li>
					<? }
					echo '</ul></div>';
				}
				else if($submenu['linkType']=='File'){
					echo '<p style="font-weight: bold;">#Attachments</p>';
					echo '<div class="download"><ul>';
					$down=$groups->getByParentId($pageId);
					while($downRow=$conn->fetchArray($down))
					{?>
						<li style="display: flex;">
			            	<div><? if($lan=='en') echo $downRow['nameen']; else echo $downRow['name']; ?></div>
			            	<div>
			                	<a href="<?=CMS_FILES_DIR.$downRow['contents'];?>"><img src="images/pdf.png" width="30" /></a>
			             	</div>
						</li>
					<? }
					echo '</ul></div>';
				}
				else if($submenu['linkType']=='Link'){
					echo '<p style="font-weight: bold;">#Links</p>';
					echo '<div class="download"><ul>';
					$down=$groups->getByParentId($pageId);
					while($downRow=$conn->fetchArray($down))
					{?>
						<li>
			            	<div style="float: left;width: 500px;">
			            		<a href="<?=$downRow['contents'];?>" target="_blank"><? if($lan=='en') echo $downRow['nameen']; else echo $downRow['name']; ?></a>
			            	</div>
						</li>
					<? }
					echo '</ul></div>';
				}
			}
			?>

          </div>
          
        </section>
        <br>
        <?php require 'template/footer_include.php';?>
    </div>
</div>	
