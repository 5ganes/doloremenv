<?php
    if(isset($_POST['signupuser'])){
        extract($_POST);
        global $users; 
        if($users->checkDuplicateUser($username) == true){
            $users->saveUser('', $name, $address, $email, $phone, $username, $password, 'No');
            $msg = 'Your signup successfully posted. You can login after your account is approved. Thank you.';
        }
        else
            $msg = 'This username has already been taken. Please try again. Thank you.';
    }
?>
<style type="text/css">
    .signup-msg{color: red}
</style>
<div class="col-md-9">
    <div class="panel panel-primary">          
        <div class="panel-heading"><h3><?php if($lan!='en') echo 'लग इन गर्नुहोस'; else echo 'Login Here';?></h3></div>
        <div class="panel-body dynamic">
            <?php if(isset($msg)) echo '<h5 class="signup-msg">'.$msg.'</h5>'; ?>
            <form action="" method="post" class="login-form signup-form" onsubmit="return validate(this)">
                <fieldset>
                    <label>Name:</label>
                    <input type="text" name="name" placeholder="Enter Your Name">
                </fieldset>
                <fieldset>
                    <label>Address:</label>
                    <input type="text" name="address" placeholder="Enter Address">
                </fieldset>
                <fieldset>
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Enter Email">
                </fieldset>
                <fieldset>
                    <label>Phone:</label>
                    <input type="text" name="phone" placeholder="Enter Phone No">
                </fieldset>
                <fieldset>
                    <label>Username:</label>
                    <input type="text" name="username" placeholder="Enter Username">
                </fieldset>
                <fieldset>
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Enter Password">
                </fieldset>
                <fieldset>
                    <label>Re-enter Password:</label>
                    <input type="password" name="confirm_password" placeholder="Re-enter Password"><br>
                    <span id="password"></span>
                </fieldset>
                <fieldset>
                    <input type="submit" name="signupuser" value="Sign Up">
                </fieldset>
            </form>
            <div class="notamember">
                Already a member? Log in <a href="<?php if($lan=='en') echo 'en/';?>userlogin">Here.</a>
            </div>
        </div>
    </div>            
</div>
<script type="text/javascript">
    // function myLoad(){
        function validate(fm){
            if(fm.name.value == ''){
                fm.name.className = 'border-red'; fm.name.focus(); return false;
            }
            if(fm.address.value == ''){
                fm.address.className = 'border-red'; fm.address.focus(); return false;
            }
            if(fm.email.value == ''){
                fm.email.className = 'border-red'; fm.email.focus(); return false;
            }
            if(fm.phone.value == ''){
                fm.phone.className = 'border-red'; fm.phone.focus(); return false;
            }
            if(fm.username.value == ''){
                fm.username.className = 'border-red'; fm.username.focus(); return false;
            }
            if(fm.password.value == ''){
                fm.address.password = 'border-red'; fm.password.focus(); return false;
            }
            if(fm.confirm_password.value == ''){
                fm.confirm_password.className = 'border-red'; fm.confirm_password.focus(); return false;
            }
            if(fm.password.value != fm.confirm_password.value){
                fm.password.className = 'border-red'; fm.confirm_password.className = 'border-red'; fm.confirm_password.focus(); 
                var element = document.getElementById('password'); element.style = 'margin-left:21%;color:red';
                element.innerHTML = 'Password didn\'t match'; return false;
            }
        }
    // }
    // document.addEventListener('DOMContentLoaded', myLoad);
</script>