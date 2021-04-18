<?php
include 'header.php';
if(isset($_GET['q'])
and $_GET['q']=='error_msg') {
$message="Incorrect Password";
}
?>
<div class="login_container">
<!--div for logo-->
 <div>
<a href="about.php"><img src="assets/images/logoc.png" alt="No logo" class="logoc"/></a>
 </div>
 <!--Div for the login form-->
<div class="loginform">
<form method="post" action="transact-user.php" style="max-width:450px;margin-top:10px;padding:10px" > 
            <div class="input-icons"> 
                <i class="fa fa-envelope icon"></i> 
                <input class="input-field" 
                       type="text"
                       name="name"
                       maxlength="255"
                       value=""
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
            <div id="err_msg"> <?php error_reporting(0);
             echo htmlspecialchars($message);?></div>
            <p><input type="submit" class="loginbtn" name="action" value="CLogin"></p>
        </form> 
        <p class="txt" onclick="SignUp();">Not a member yet? Create a new account!</p>
   <p><a href="forgotpass.php" >Forgot Password ?</a></p>
           <p><button class="popup_btn" onclick="closecomment_popUp();">Close</button></p>
</div>
</div>
<?php include 'footer.php' ?>