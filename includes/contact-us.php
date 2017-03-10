<style>
  .security{
    display: flex;
  }
  .security p:nth-child(1){
    width: 15%; margin-top: 0.4em;
  }
  .security p:nth-child(2){
    width: 15%;
  }
  .security p:nth-child(3){
    width: 17%;margin-top: 0.4em;
  }
  .security p:nth-child(3) a{
    color:#02451A;
  }
  @media screen and (min-width: 650px) and (max-width:980px){
    .security p:nth-child(1){
      width: 100%;
    }
    .security p:nth-child(2){
      width: 50%;margin-bottom: 0;
    }
    .security p:nth-child(3){
      width: 50%;margin-bottom: 1em;
    }
  }
  @media screen and (max-width: 650px){
    .security{flex-direction: column}
    .security p:nth-child(1){
      width: 50%;
    }
    .security p:nth-child(2){
      width: 50%;
    }
    .security p:nth-child(3){
      width: 100%;
    }
  }
</style>
<script language="javascript">
  function validateform(fm){
      if(fm.txtname.value == ""){
          alert("Please type your Name.");
          fm.txtname.focus();
          return false;
      } 
      var goodEmail = fm.txtemail.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,3}))$)\b/gi);    
      if(fm.txtemail.value == ""){
          alert("Please type your E-mail.");
          fm.txtemail.focus();
          return false;
      }
      if (!goodEmail) {
          alert("The Email address you entered is invalid please try again!")
          fm.txtemail.focus()
          return (false);
      }     
      if(fm.txtcomment.value == ""){
          alert("Please type your Comment.");
          fm.txtcomment.focus();
          return false;
      }
      if(fm.security_code.value == ""){
          alert("Please enter security code.");
          fm.security_code.focus();
          return false;
      }
      else if(fm.security_code.value.length < 6)
      {
          alert("Please enter valid length security code.");
          fm.security_code.focus();
          return false;
      }
  }
</script>
<!-- Main -->
<div id="main">
    <div class="inner">
    <?php require 'template/header_include.php'; ?>
      <!-- Banner -->
        <section id="banner">
          <div class="content">
            <?php
              $pageResult = $groups->getById(CONTACT);
              $pageRow = $conn->fetchArray($pageResult);
              
              $pageParentId = $pageRow['parentId'];
              $pageDate = $pageRow['onDate'];
              $pageContents = $pageRow['contents'];
            ?>
            <header>
              <h1><?php if($lan=='en') echo 'Our Contact Information'; else echo 'हाम्रो सम्पर्क';?></h1>
            </header>
            <p>
                <?php
                  $pagename = "index.php?id=". $pageId ."&";
                  include("includes/pagination.php");
                  echo Pagination($pageContents, "content");
                ?>
            </p>

            <!-- contact us form starts -->
            <div>
              <?php
              global $feedbackmsg;
              if(!empty($feedbackmsg))
                $msg = $feedbackmsg;
              else if(isset($_REQUEST['msg']))
               $msg = $_REQUEST['msg'];
              ?>
              <header>
                <h1><?php if($lan=='en') echo 'Send Us Feedback'; else echo 'सुझाब पठाउनुहोस'?></h1>
              </header>

              <?php if(!empty($msg)){ ?>
                <p>
                  <span class="cmsFormNotes" style="color:#910000;"><?php echo $msg; ?></span>
                </p>
              <?php } ?>

              <form method="post" action="" onSubmit="return validateform(this);">
                <div class="row uniform">
                  <div class="6u 12u$(xsmall)">
                    <input type="text" name="txtname" id="demo-name" value="" placeholder="Name *" />
                  </div>
                  <div class="6u$ 12u$(xsmall)">
                    <input type="text" name="txtaddress" id="demo-email" value="" placeholder="Address" />
                  </div>
                  <div class="6u 12u$(xsmall)">
                    <input type="email" name="txtemail" id="demo-email" value="" placeholder="Email *" />
                  </div>
                  <div class="6u$ 12u$(xsmall)">
                    <input type="text" name="txtcountry" id="demo-email" value="" placeholder="Country" />
                  </div>
                  
                  <!-- Break -->
                  <div class="12u$">
                    <textarea name="txtcomment" id="demo-message" placeholder="Enter your feedback *" rows="6"></textarea>
                  </div>
                  <!-- Break -->
                  <div class="12u$ security">
                    <p>Security Code:</p>
                    <p>
                      <img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" />
                    </p>
                    <p><a href="javascript: void(0);" onclick="document.getElementById('captchaimage').src = 'includes/captcha.php?width=110&height=40&characters=6&' + Math.random(); return false;" class="captchaReload">[ Reload Image ]</a></p>
                  </div>
                  <!-- Break -->
                  <div class="6u$" style="padding-top: 0;">
                    <input type="text" name="security_code" maxlength="6" id="security_code" value="" placeholder="Enter security code *" />
                  </div>
                  <!-- Break -->
                  <div class="12u$">
                    <ul class="actions">
                      <li><input type="submit" name="btnFeedback" value="Send Feedback" class="special" /></li>
                      <li><input type="reset" value="Reset" /></li>
                    </ul>
                  </div>
                </div>
              </form>
              <p><span class="cmsFormNotes" style="color:#910000;">Note: [ Fields marked with <span class="cmsAstriks">*</span> are compulsory fields ]</span></p>
            </div>
            <!-- contact us form ends -->
            
          </div>
          
        </section>
        <?php require 'template/footer_include.php';?>
    </div>
</div>