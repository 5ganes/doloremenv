<style type="text/css">
  header h2{
    border-bottom: solid 3px #f56a6a;
    display: inline-block;
    margin: 0 0 1em 0;
    padding: 0 0.75em 0.5em 0;
  }
  header h2 a{border-bottom: none}
  
  .main-header{
    display: flex;justify-content: space-between;
  }
  .main-header h2:last-child{
    border: 2px solid gray;
    font-size: 22px;
    padding: 0.4em 1em;
    box-shadow: 4px 4px 9px grey;background: #FFFF6F;
  }
  .main-header h2:last-child:hover{
    box-shadow: 4px 4px 20px gray
  }
  @media screen and (max-width: 600px){
    .main-header{
      flex-direction: column;
    }
    .main-header h2:last-child{
      margin-bottom: 0;
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
            <?php
            $welcome = $groups->getById(WELCOME);
            $welcome = $conn->fetchArray($welcome);
            ?>
            <header>
              <h1><?php if($lan=='en') echo $welcome['nameen']; else echo $welcome['name']?></h1>
            </header>
            <p><?php if($lan=='en') echo $welcome['shortcontentsen']; else echo $welcome['shortcontents'];?></p>
            <ul class="actions">
              <li><a href="<?php if($lan=='en') echo 'en'; echo $welcome['urlname'] ?>" class="button big">Read More</a></li>
            </ul>
          </div>
          <span class="image object">
            <img src="<?php echo CMS_GROUPS_DIR.$welcome['image'];?>" alt="<?php echo $welcome['name']?>" />
          </span>
        </section>

      <!-- Section -->
        <section>
          <?php
            $msg_from_dg = $groups->getById(MSG_FROM_DG); $msg_from_dg = $conn->fetchArray($msg_from_dg);
            ?>
          <header class="major main-header">
            <h2><?php if($lan=='en') echo 'Messages From'; else echo 'सन्देशहरु';?></h2>
            <h2><a href="http://pollution.gov.np" target="_blank">DoE, Air Quality Monitoring</a></h2>
          </header>
          <div class="features msg-from-dg">
            <article style="width: 100%">
              <span class="msg-img"><img src="<?php echo CMS_GROUPS_DIR.$msg_from_dg['image'] ?>"></span></span>
              <div class="content">
                <h3><?php if($lan=='en') echo $msg_from_dg['nameen']; else echo $msg_from_dg['name'];?></h3>
                <p><?php if($lan=='en') echo $msg_from_dg['shortcontentsen']; else echo $msg_from_dg['shortcontents'];?>...</p>
                <ul class="actions">
                  <li><a href="<?php if($lan=='en') echo 'en/'; echo $msg_from_dg['urlname'] ?>" class="button big">Read More</a></li>
                </ul>
              </div>
            </article>
          </div>
        </section>

      <!-- Section -->
        <section>
          <!-- <header class="major">
            <h2>Messages</h2>
          </header> -->
          <div class="features">
            <article>
              <?php
              $msg_from_sp = $groups->getById(MSG_FROM_SPOKEPERSON);
              $msg_from_sp = $conn->fetchArray($msg_from_sp);
              ?>
              <span class="msg-img"><img src="<?php echo CMS_GROUPS_DIR.$msg_from_sp['image'] ?>"></span></span>
              <div class="content">
                <h3><?php if($lan=='en') echo $msg_from_sp['nameen']; else echo $msg_from_sp['name'];?></h3>
                <p><?php if($lan=='en') echo $msg_from_sp['shortcontentsen']; else echo $msg_from_sp['shortcontents'];?>...</p>
                <ul class="actions">
                  <li><a href="<?php if($lan=='en') echo 'en/'; echo $msg_from_sp['urlname'] ?>" class="button big">Read More</a></li>
                </ul>
              </div>
            </article>
            <article>
              <?php
              $msg_from_io = $groups->getById(INFO_OFFICER);
              $msg_from_io = $conn->fetchArray($msg_from_io);
              ?>
              <span class="msg-img"><img src="<?php echo CMS_GROUPS_DIR.$msg_from_io['image'] ?>"></span></span>
              <div class="content">
                <h3><?php if($lan=='en') echo $msg_from_io['nameen']; else echo $msg_from_io['name'];?></h3>
                <p><?php if($lan=='en') echo $msg_from_io['shortcontentsen']; else echo $msg_from_io['shortcontents'];?>...</p>
                <ul class="actions">
                  <li><a href="<?php if($lan=='en') echo 'en/'; echo $msg_from_io['urlname'] ?>" class="button big">Read More</a></li>
                </ul>
              </div>
            </article>
          </div>
        </section>

      <!-- Section -->
        <section>
          <!-- <header class="major">
            <h2>Ipsum sed dolor</h2>
          </header> -->
          <div class="posts">
            <article>
              <?php $url = $groups->getById(NEWS_AND_EVENTS); $url=$conn->fetchArray($url); ?>
              <h3><?php if($lan=='en') echo $url['nameen']; else $url['name'] ?></h3>
              <ul class="contact">
                <?php
                $news = $groups->getByParentIdWithLimit(NEWS_AND_EVENTS, 4);
                while($row = $conn->fetchArray($news)){
                  echo '<li><a href="'.$row['urlname'].'">'.$row['name'].'</a></li>';
                }
                ?>
              </ul>
              <ul class="actions">
                <li><a href="<?php if($lan=='en') echo 'en/'; echo $url['urlname'] ?>" class="button big">Read More</a></li>
              </ul>
            </article>
            <article>
              <?php $notice = $groups->getById(NOTICE); $notice=$conn->fetchArray($notice); ?>
              <h3><?php if($lan=='en') echo $notice['nameen']; else echo $notice['name'];?></h3>
              <p>
                <?php if($lan=='en') echo $notice['shortcontentsen']; else echo $notice['shortcontents'];?>
              </p>
              <ul class="actions">
                <li><a href="<?php if($lan=='en') echo 'en/'; echo $notice['urlname'] ?>" class="button big">Read More</a></li>
              </ul>
            </article>
            <article>
              <?php $press = $groups->getById(PRESS_RELEASE); $press=$conn->fetchArray($press); ?>
              <h3><?php if($lan=='en') echo $press['nameen']; else echo $press['name'];?></h3>
              <p>
                <?php if($lan=='en') echo $press['shortcontentsen']; else echo $press['shortcontents'];?>
              </p>
              <ul class="actions">
                <li><a href="<?php if($lan=='en') echo 'en/'; echo $press['urlname'] ?>" class="button big">Read More</a></li>
              </ul>
            </article>
            <article>
              <?php $bull = $groups->getById(BULLETIN); $bull=$conn->fetchArray($bull); ?>
              <h3><?php if($lan=='en') echo $bull['nameen']; else echo $bull['name'];?></h3>
              <p>
                <?php if($lan=='en') echo $bull['shortcontentsen']; else echo $bull['shortcontents'];?>
              </p>
              <ul class="actions">
                <li><a href="<?php if($lan=='en') echo 'en/'; echo $bull['urlname'] ?>" class="button big">Read More</a></li>
              </ul>
            </article>
          </div>
        </section>

        <!-- Section: Videos and audios -->
        <section>
          <!-- <header class="major">
            <h2>Ipsum sed dolor</h2>
          </header> -->
          <div class="posts">
            <article>
              <h3><?php if($lan=='en') echo 'Video'; else echo 'भिडियो';?></h3>
              <p>
                <?php
                $video = $groups->getById(SINGLE_VIDEO);
                $video = $conn->fetchArray($video);
                ?>
                <iframe width="350" height="320" src="<?php echo $video['contents'];?>" frameborder="0" allowfullscreen="">
                </iframe>
              </p>
            </article>
            <article class="audio-video">
              <h3><?php if($lan=='en') echo 'Our Audios and Videos'; else echo ' अडियो र  भिडियोहरु';?></h3>
              <p>
                <?php $audio = $groups->getById(AUDIO);$audio = $conn->fetchArray($audio);?>
                <a href="<?php if($lan=='en') echo 'en/'; echo $audio['urlname'];?>" class=""><img src="<?php echo CMS_GROUPS_DIR.$audio['image'];?>" alt=""></a>
              </p>
              <p>
                <?php $video = $groups->getById(VIDEO);$video = $conn->fetchArray($video);?>
                <a href="<?php if($lan=='en') echo 'en/'; echo $video['urlname'];?>" class=""><img src="<?php echo CMS_GROUPS_DIR.$video['image'];?>" alt=""></a>
              </p>
            </article>
          </div>
        </section>

        <!-- Section: facebook and twitter -->
        <section>
          <!-- <header class="major">
            <h2>Ipsum sed dolor</h2>
          </header> -->
          <div class="posts">
            <article>
              <h3>Find Us On Facebook</h3>
              <p>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdoenv&tabs=timeline&width=340&height=332px&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=true&appId" width="340" height="332px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
              </p>
            </article>
            <article>
              <h3>Find Us On Twitter</h3>
              <p>
                <a href="https://twitter.com/DoEnv_Nepal" class="twitter-follow-button" data-show-count="false">Follow @DoEnv_Nepal</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                <a class="twitter-timeline" href="https://twitter.com/DoEnv_Nepal" height="300">Tweets by DnEnv Nepal</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
              </p>
            </article>
          </div>
        </section>

        <?php require 'template/footer_include.php';?>

    </div>
  </div>