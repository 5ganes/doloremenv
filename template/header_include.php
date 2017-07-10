<!-- ******HEADER****** --> 
  <header class="header container">  
      
      <!--//to-bar-->
      <div class="header-main">
          <h1 class="logo">
              <div class="col-md-2 "><a href="<?php echo SITE_URL;?>"><img src="images/logo.png" width=""></a></div>
              <div class="col-md-8 center-text title-text" style="line-height: 20px;">
                  <?php if($lan=='en'){?>
                      <p>Government of Nepal</p>
                      <h3>Ministry of Population and Environment</h3>
                      <p>Department of Environment</p>
                  <?php }
                  else{?>
                      <p>नेपाल सरकार</p>
                      <h3>जनसंख्या तथा वातावरण मन्त्रालय</h3>
                      <p>वातावरण विभाग</p>
                  <?php }?>
                  <!--<p>सिंहदरबार, काठमाडौँ, नेपाल</p>-->
              </div>
              <div class="col-md-2 flag" align="right">
                <div class="language">
                  <div class="container" style="width:100% !important;">
                      <?php if($lan=='en'){?>
                        <a href="<?php echo SITE_URL;?>" class="btn btn-sm btn-primary pull-right"><span style="font-size:12px;"><b>नेपाली</b></span></a>
                      <?php }
                      else{?>
                        <a href="<?php echo SITE_URL;?>en" class="btn btn-sm btn-primary pull-right"><span style="font-size:12px;"><b>English</b></span></a>
                      <?php }?>
                  </div>      
              </div>
                <div class="nepal-flag"><img src="images/flagrr.gif" width="70"></div>
              </div>
          </h1>           
      </div>
  </header><!--//header-->

  <!-- ******NAV****** -->
  <nav class="main-nav container" role="navigation">
      <div class="">
          <div class="navbar-header">
              <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button><!--//nav-toggle-->
          </div>         
          <div class="navbar-collapse collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <?php createMenu(0, 'Header', $lan); ?>
            </ul>
            <!--//nav-->
          </div><!--//navabr-collapse-->
      </div><!--//container-->
  </nav><!--//main-nav-->
  
  <!-- ******CONTENT****** -->
  <div class="content container">
      
      <section>

          <!-- scroll menu -->
          <section class="news panel  marquee-body">
              <div class="" style="background-color:#c76353;"> 
                  <div class="marquee_div">
                      <div class="marquee-title"><?php if($lan=='en') echo 'Hot News'; else echo 'ताजा समाचार'; echo ' : ';?></div>
                      <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" truespeed="">
                          <?php $hot=$groups->getById(HOT_NEWS); $hot=$conn->fetchArray($hot);?>
                          <a href="<?php if($lan=='en') echo 'en/'; echo $hot['urlname'];?>"><?php if($lan=='en') echo $hot['shortcontentsen']; else echo $hot['shortcontents'];?></a>
                      </marquee>
                      <?php global $userLoggedIn;
                      if($userLoggedIn){?>
                          <div class="marquee-title login" style="width: 22%">
                            <?php 
                            //if(!$userLoggedIn){?>
                              <!-- <a href="<?php if($lan=='en') echo 'en/';?>userlogin"><?php if($lan=='en') echo 'Login'; else echo 'लगइन गर्नुहोस';?></a> -->
                            <?php //}
                            //else{ 
                              echo 'Hello '.$_SESSION['userName'].' | '; 
                              if($lan=='en') echo '<a style="width:40%" href="userlogout.php?lan=en">Logout</a>'; else echo '<a href="userlogout.php" style="width:40%">Logout</a>';
                            //}?>
                          </div>
                      <?php }?>
                  </div>
                  <div class="clearfix"></div>
              </div>    
          </section>
          <!-- scroll menu end -->