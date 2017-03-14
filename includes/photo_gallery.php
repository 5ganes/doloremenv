<!-- Main -->
<div id="main">
    <div class="inner">
    <?php require 'template/header_include.php'; ?>
      <!-- Banner -->
        <section id="banner">
          <div class="content">
            <?php
              $row=$groups->getByURLName('photo-gallery');
            ?>
            <header>
              <h1><?php if($lan!='en') echo $row['nameen']; else echo $row['name'];?></h1>
            </header>
            <p>
                <?php
                if($lan!='en') echo $row['contentsen'];
                else echo $row['contents'];
                ?>
            </p>

            <section>
              <div class="posts photo-gallery">
                <?php
                $photo = $groups->getByParentId(PHOTO_GALLERY);
                while($photoGet = $conn->fetchArray($photo)){?>
                  <article>
                    <p>
                      <a href="<?php echo $photoGet['urlname'];?>"><img src="<?php echo CMS_GROUPS_DIR.$photoGet['image'];?>"></a>
                    </p>
                    <h3>
                      <a href="<?php echo $photoGet['urlname'];?>">
                        <?php if($lan=='en') echo $photoGet['nameen']; else echo $photoGet['name'];?>
                      </a>
                    </h3>
                  </article>
                <?php }?>
              </div>
            </section>
            
          </div>
          
        </section>
        <br>
        <?php require 'template/footer_include.php';?>
    </div>
</div>