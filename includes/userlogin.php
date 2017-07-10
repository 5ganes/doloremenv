<?php
    if($userLoggedIn){?>
        <script type="text/javascript">
            window.location = "<?php echo SITE_URL;?>our_documents";
        </script>
    <?php }
?>
<div class="col-md-9">
    <div class="panel panel-primary">          
        <div class="panel-heading login-message">
            <h3><?php if($lan!='en') echo 'लग इन गर्नुहोस'; else echo 'Login Here';?></h3>
            <h3><?php if(isset($_GET['msg'])) echo $_GET['msg']; ?></h3>
        </div>
        <div class="panel-body dynamic">
            <form id="loginuser" action="" method="post" class="login-form" onsubmit="return validateLoginForm(this)">
                <fieldset>
                    <label>Username:</label>
                    <input type="text" name="username" placeholder="Enter Username" required>
                </fieldset>
                <fieldset>
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Enter Password" required>
                </fieldset>
                <fieldset>
                    <input type="submit" name="loginuser" value="Login">
                </fieldset>
            </form>
            <div class="notamember">
                Not a member? Sign up <a href="<?php if($lan=='en') echo 'en/';?>usersignup">Here.</a>
            </div>
        </div>
    </div>            
</div>