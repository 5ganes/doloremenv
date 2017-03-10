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
            
          </div>
          
        </section>
        <br>
        <?php require 'template/footer_include.php';?>
    </div>
</div>