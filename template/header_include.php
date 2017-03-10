<!-- Header -->
  <header id="header">
    <article class="logo">
      <a href="<?php echo SITE_URL; if($lan=='en') echo 'en/'?>"><img src="images/logo.png"></a>
    </article>
    <article class="title">
      <?php if($lan!='en'){?>
        <h4>नेपाल सरकार</h4>
        <h3>जनसंख्या तथा वातावरण मन्त्रालय</h3>
        <h2>वातावरण विभाग</h2>
      <? }
      else{?>
        <h4>Government of Nepal</h4>
        <h3>Ministry of Population and Environment</h3>
        <h2>Department of Environment</h2>
      <? }?>
    </article>
    <article class="flag">
      <img src="images/flag.gif">
      <br>
      <?php if($lan=='en'){?>
        Language: <a href="<?php echo SITE_URL;?>en">English</a> | <a href="<?php echo SITE_URL;?>">Nepali</a>
      <?php }
      else{?>
        भाषा: <a href="<?php echo SITE_URL;?>en">अंग्रेजी</a> | <a href="<?php echo SITE_URL;?>">नेपाली</a>
      <?php }?>
    </article>
  </header>

  <div class="menubar">
    <ul>
      <?php
        createMenu(0, 'Header', $lan);
      ?>
    </ul>
  </div>

  <!-- Hot news section -->
  <div class="menubar hot-news">
    <?php $hot=$groups->getById(HOT_NEWS); $hot=$conn->fetchArray($hot);?>
    <span><?php if($lan=='en') echo $hot['nameen']; else echo $hot['name'];?>: </span>
    <marquee onmouseover="this.stop()" onmouseout="this.start()">
      <a href="<?php if($lan=='en') echo 'en/'; echo $hot['urlname'];?>"><?php if($lan=='en') echo $hot['shortcontentsen']; else echo $hot['shortcontents'];?></a>
    </marquee>
  </div>