<?php
if(isset($_GET['q'])
and $_GET['q']=='wrong_password') {
$message="Incorrect Password";
}?>
<div class="login_container">
<!--div for logo-->
 <div>
<a href="about.php"><img src="assets/images/logoc.png" alt="No logo" class="logoc"/></a>
 </div>
 <!--Div for the login form-->
<div class="loginform">
<form method="post" action="transact-user.php" style="max-width:450px;margin-top:10px;padding:10px" > 

            <div class="input-icons"> 
                <i class="fa fa-user icon"></i> 
                <input class="input-field" 
                       type="text"
                       name="name"
                       maxlength="100"
                       value="<?php error_reporting(0);
                       echo htmlspecialchars($_COOKIE['username']);?>"
                       placeholder="User Name" required> 
            </div>
  
            <div class="input-icons"> 
                <i class="fa fa-key icon"></i> 
                <input class="input-field" 
                       type="password"
                       name="passwd"
                       maxlength="8"
                       placeholder="Password" required> 
            </div>
            <div id="err_msg"><?php error_reporting(0);
             echo htmlspecialchars($message);?></div>
             <input type="checkbox" id="remember_me" name="remember_me" value="remember_me">
            <label for="remember_me" class="txt">Remember me</label><br>
            <p><input type="submit" class="loginbtn" name="action" value="Login"></p>
        </form> 
        <p class="txt" onclick="SignUp();">Not a member yet? Create a new account!</p>
   <p><a href="forgotpass.php" >Forgot Password ?</a></p>
           <p><button class="popup_btn" onclick="closelogin_popUp();">Close</button></p>
</div>

</div>