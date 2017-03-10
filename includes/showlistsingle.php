<style type="text/css">
  .list-single{

  }
  .next-prev{
    display: flex;
  }
  .next-prev div{
    width: 50%;
  }
  .next-prev div:last-child{
    text-align: right;
  }
  .download{width:100%;}
  .download ul{ margin:0;padding: 0;}
  .download ul li{ list-style:none;display: flex;margin: 1em;}
  .download ul li div{
    width: 49%;padding: 1%;
  }
  .download ul li div:nth-child(2){
    padding-top: 0;
  }
  .download ul li div a{
    border:2px solid;
    border-top: none
  }
  .download ul li div a:hover{
    box-shadow: 2px 2px 5px gray;
  }
</style>
<?php
  $listResult = $groups->getById($pageId);
  $listRow = $conn->fetchArray($listResult);
  // print_r($listRow);
  
  $pageResult = $groups->getById($pageParentId);
  $pageRow = $conn->fetchArray($pageResult);
  
?>
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

            <div class="list-single">
              <!-- for navigation -->
              <?
                $navNextResult = $groups->getNextResult($pageId);
                $navNextRow = $conn->fetchArray($navNextResult);

                $navPreviousResult = $groups->getPreviousResult($pageId);
                $navPreviousRow = $conn->fetchArray($navPreviousResult);
              ?>
              <div class="next-prev">
                <div> <a href="<?= $navPreviousRow['urlname']; ?>" class="paging">&laquo; Previous</a> </div>
                <div> <a href="<?php echo $navNextRow['urlname']; ?>" class="paging">Next &raquo;</a> </div>
              </div>
              <p><? if($lan=='en') echo $listRow['contentsen']; else echo $listRow['contents']; ?></p>
              
              <?php 
                echo '<p style="font-weight: bold;">#Attachments</p>';
                echo '<div class="download"><ul>';
                $file=$listingFiles->getByListingId($pageId);
                while($fileGet=$conn->fetchArray($file))
                {?>
                  <li>
                          <div><?=$fileGet['filename'];?></div>
                          <div>
                              <a href="<?=CMS_LISTING_FILES_DIR.$fileGet['filename'];?>"><img src="images/pdf.png" width="30" /></a>
                          </div>
                  </li>
                <? }
                echo '</ul></div>';
              ?>
            
            </div>
            
          </div>
          
        </section>
        <br>
        <?php require 'template/footer_include.php';?>
    </div>
</div>