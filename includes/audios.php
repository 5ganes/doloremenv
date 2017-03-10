<style type="text/css">
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
    @media screen and (max-width: 650px){
        .download ul li{
            flex-direction: column;
        }
        .download ul li div:first-child{
            width: 100%;margin-bottom: 1em;
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
              <h1><?php if($lan=='en') echo 'Our Audio Programs'; else echo 'हाम्रा अडियोहरु';?></h1>
            </header>
            <p>
                <?php
                $content=$groups->getById(AUDIO);
                $contentGet=$conn->fetchArray($content);
                if($lan!='en')
                   echo $contentGet['contents'];
                else echo $contentGet['contentsen'];
                ?>
            </p>

            <div class="audio-class">
            <?php
                echo '<p style="font-weight: bold;">#Oudio Files</p>';
                echo '<div class="download"><ul>';
                $down=$groups->getByParentId(AUDIO);
                while($downRow=$conn->fetchArray($down))
                {?>
                    <li>
                        <div><?php if($lan=='en') echo $downRow['nameen']; else echo $downRow['name']; ?></div>
                        <div>
                            <audio controls="">
                                <source src="<?php echo CMS_FILES_DIR.$downRow['contents'];?>" type="audio/mp3">
                                <source src="<?php echo CMS_FILES_DIR.$downRow['contents'];?>" type="audio/wma">
                                <source src="<?php echo CMS_FILES_DIR.$downRow['contents'];?>" type="audio/wav">
                            </audio>
                        </div>
                    </li>
                <?php }
                echo '</ul></div>';
            ?>
            </div>
            
          </div>
          
        </section>
        <br>
        <?php require 'template/footer_include.php';?>
    </div>
</div>