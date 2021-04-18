<?php require_once 'header.php';?>
<div class="contactUs_">
<div class="myfooter">
    <a href="https://github.com/search?q=kiguhi&type=Users"><i class="fab fa-github s_icon"></i></a>
    <a href="https://ke.linkedin.com.in/kiguhi-charity-Obba9b14b"><i class="fab fa-linkedin s_icon"></i></a>
    <a href="mailto:kiguhi254@gmail.com"><i class="fa fa-envelope s_icon"></i></a>
    <a href="https://mobile.twitter.com/KiguhiCharity"><i class="fab fa-twitter s_icon"></i></a>
    <a href="#"><i class="fab fa-youtube s_icon"></i></a>
    <a href="https://www.instagram.com/charitykiguhi/"><i class="fab fa-instagram s_icon"></i></a>
    <a href="https://facebook/.com/kiguhi.charity"><i class="fab fa-facebook s_icon"></i></a>
</div>
<div class="contactUsDivs">
  <div class="contactUs"> 
    <h1>Contact Us</h1>
    <p style="color: rgb(93, 93, 93);">. 
     We are developers whose goal is to help you create customized notes for your students
     by allowing you to create interactive web pages that the children will enjoy using.
     This is by ensuring an amazing user experience through a great User interface.<br> 
     Keep in touch.
.</p>
  </div>
  <div class="contactUsForm" style="padding:6%">
     <form method="post" action="transact-user.php"> 
      <input class="commentInputField_" type="text" name="email" maxlength="255" value="" placeholder="Email" required>
      <input class="commentInputField_" type="text" name="comment" maxlength="500" value="" placeholder="Comment" required><br>
     <input class="sendComment" type="submit" name="action" value="Send Now"/><i class="fas fa-arrow-right icon"></i>
        </form> 
    </div>
  </div>
  <h1 style="margin-top:5%;margin-left:5%;">Comments</h1>
  <div class="userComments">
  <?php 
  require_once 'output_functions.php';
  comments();?>
  </div>
</div>
<!--When done i think this should be added to the footer-->
<?php require_once 'footer.php'?>