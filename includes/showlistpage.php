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

            <div class="list-content">
            	<?php
				$pagename = "index.php?linkId=". $pageId ."&";
				$sql = "SELECT * FROM groups WHERE parentId = '$pageId' ORDER BY weight DESC";
				$newsql = $sql;
				$limit = LISTING_LIMIT;

				//get alias name
				$alias=$groups->getById($pageId);
				$aliasGet=$conn->fetchArray($alias);

				include("includes/pagination.php");
				$return = Pagination($sql, "", $limit, $aliasGet['urlname']);
				$arr = explode(" -- ", $return);
				$start = $arr[0];
				$pagelist = $arr[1];
				$count = $arr[2];
				$newsql .= " LIMIT $start, $limit";
				$result = mysql_query($newsql);
				while ($listRow = $conn->fetchArray($result))
				{?>
					<div class="listRow" style="margin:4px 0px">
			  			<? if(file_exists(CMS_GROUPS_DIR . $listRow['image']) && !empty($listRow['image'])){?>
				  			<div> 
				  				<a href="<?= $listRow['urlname'] ?>">
				  					<img src="<?php echo imager($listRow['image'], 100, 75, "fix"); ?>" alt="<?php echo $listRow['title']; ?>" style="border:0" />
				  				</a>
				  			</div>
			  			<? } ?>
			  			<div>
			    			<div>
			      				<div class="newsList">
			      					<a href="<?php if($lan=='en') echo 'en/'; echo $listRow['urlname']; ?>">
			      						<?php if($lan=='en') echo $listRow['nameen']; echo $listRow['name']; ?>
			      					</a>
			      				</div>
			      				<?php if($lan=='en') echo $listRow['shortcontentsen']; echo $listRow['shortcontents']; ?>
			      			</div>
			  			</div>
					</div>
					<div style="clear:both;"></div>
				<? }
				if($count > $limit)
					echo $pagelist;
				?>
            </div>
            
          </div>
          
        </section>
        <br>
        <?php require 'template/footer_include.php';?>
    </div>
</div>