<!-- ******HEADER****** --> 
  <header class="header container">  
      
      <!--//to-bar-->
      <div class="header-main">
          <h1 class="logo">
              <div class="col-md-2 "><img src="images/logo.png" width=""></div>
              <div class="col-md-8 center-text" style="line-height: 20px;">
                  <?php if($lan=='en'){?>
                      <p style="font-size: 20px;">Government of Nepal</p>
                      <h3>Ministry of Population and Environment</h3>
                      <p>Department of Environment</p>
                  <?php }
                  else{?>
                      <p style="font-size: 20px;">नेपाल सरकार</p>
                      <h3>जनसंख्या तथा वातावरण मन्त्रालय</h3>
                      <p>वातावरण विभाग</p>
                  <?php }?>
                  <!--<p>सिंहदरबार, काठमाडौँ, नेपाल</p>-->
              </div>
              <div class="col-md-2 flag" align="right"><img src="images/flagrr.gif" width="60"></div>
          </h1>           
      </div>
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
  </header><!--//header-->

  <!-- ******NAV****** -->
  <nav class="main-nav container" role="navigation">
      <div class="">         
          <div class="navbar-collapse collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <?php createMenu(0, 'Header', $lan); ?>
                  <!-- <li class="nav-item"><a class="white" href="http://www.mope.gov.np/ne/index.php">गृहपृष्ठ </a></li>
                  <li class="dropdown nav-item">
                      <a class="dropdown-toggle white" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="">संस्थाहरु <span class="caret"></span></a>
                      <ul class="dropdown-menu multi-level">
                        <li class="nav-tem">
                            <a target="" href="http://www.mope.gov.np/ne/content.php?id=13">जल तथा मौसम विज्ञान विभाग</a>    
                            <ul class="dropdown-menu pull-left"></ul>
                        </li>
                        
                        <li class="">
                            <a target="" href="http://www.mope.gov.np/ne/content.php?id=14">वातावरण विभाग</a>
                            <ul class="dropdown-menu pull-left"></ul>
                        </li>
                      </ul>
                  </li>
                  <li class="dropdown nav-item">
                      <a class="dropdown-toggle white" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="http://www.mope.gov.np/ne/index.php#">महाशाखा, सम्पर्क विन्दु <span class="caret"></span></a>
                      <ul class="dropdown-menu multi-level">
                          <li class="dropdown-submenu">
                            <a target="" href="http://www.mope.gov.np/ne/content.php?id=51">योजना, अनुगमन तथा प्रशासन महाशाखा</a>
                            <ul class="dropdown-menu multi-level">
                             <li><a target="" href="http://www.mope.gov.np/ne/content.php?id=52">प्रशासन तथा जनशक्ति विकास शाखा</a></li>

                              <li><a target="" href="http://www.mope.gov.np/ne/content.php?id=53">योजना अनुगमन तथा बजेट समन्वय शाखा</a></li>

                              <li><a target="" href="http://www.mope.gov.np/ne/content.php?id=54">कानून तथा फैसला कार्यान्वयन शाखा</a></li>

                              <li><a target="" href="http://www.mope.gov.np/ne/content.php?id=55">आर्थिक प्रशासन शाखा</a></li>
                            </ul>
                          </li>
                          <li class="">
                            <a target="" href="http://www.mope.gov.np/ne/content.php?id=71">कर्मचारी विवरण</a>
                            <ul class="dropdown-menu pull-left"></ul>
                          </li>
                      </ul>
                  </li> -->
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
                  </div>
                  <div class="clearfix"></div>
              </div>    
          </section>
          <!-- scroll menu end -->