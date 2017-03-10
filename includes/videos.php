<style type="text/css">
section .posts article h3{
    font-size: 0.8em;
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
              <h1><?php if($lan=='en') echo 'Our Video Programs'; else echo 'हाम्रा भिडियोहरु';?></h1>
            </header>
            <p>
                <?php
                $content=$groups->getById(VIDEO);
                $contentGet=$conn->fetchArray($content);
                if($lan!='en')
                   echo $contentGet['contents'];
                else echo $contentGet['contentsen'];
                ?>
            </p>
          </div>
          
        </section>
        <br>

        <!-- Section: video section -->
          <section>
            <div class="posts footer-div">
                <?php
                $video = $groups->getByParentId(VIDEO);
                while($videoGet = $conn->fetchArray($video)){?>
                  <article>
                    <h3><?php echo $videoGet['name'];?></h3>
                    <p><iframe id="video" width="245" height="170" src="<?=$videoGet['contents'];?>" frameborder="1" allowfullscreen></iframe></p>
                  </article>
                <?php }?>
            </div>
          </section>

        <?php require 'template/footer_include.php';?>
    </div>
</div>