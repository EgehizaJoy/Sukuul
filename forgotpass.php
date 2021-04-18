<?php require_once 'header.php';?>
<div class="forgotPass_container">
<!--div for logo-->
 <div>
 <img src="assets/images/logoc.png" alt="No logo" class="logoc"/>
 </div>
 <!--Div for the login form-->
<div class="forgotPass_form">
<form method="post" action="transact-user.php" style="max-width:450px;margin-top:10px;padding:10px" > 
<h1 class="txt_">Password Reminder</h1>
<p class="txt_">Forgot your password?<br>
Just enter your username and email address and we'll email your password to you!</p>
<div class="input-icons"> 
                <i class="fa fa-user icon"></i> 
                <input class="input-field" 
                       type="text"
                       name="name"
                       maxlength="100"
                       placeholder="User Name" required> 
            </div>
            <div class="input-icons"> 
                <i class="fa fa-envelope icon"></i> 
                <input class="input-field" 
                       type="email"
                       name="email"
                       id="email"
                       placeholder="Email" required> 
            </div> 
  
            <p><input type="submit" class="loginbtn" name="action" value="Send"></p>
        </form> 
</div>
<?php require_once 'footer.php'?>