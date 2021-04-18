<?php
require_once 'conn.php';
require_once 'header.php';
$userid='';
$name='';
$email='';
$password='';
$accesslvl='';

if (isset($_GET['userid'])) {
    $sql=$conn->prepare("SELECT * FROM cms_users WHERE user_id=".$_GET['userid']);
    $sql->execute();

    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $userid=$_GET['userid'];
    $name=$row['name'];
    $email=$row['email'];
    $accesslvl=$row['access_lvl'];
}
echo '<div class="signup_container">';
echo '<div class="signupform_">';
echo "<form method=\"post\" action=\"transact-user.php\"margin-top:10px;padding:10px'>\n";

if ($userid) {
   echo "<h1 style='text-align:center;color:rgb(34, 2, 65);'>Modify Account</h1>\n";
}
?>
            <div class="input-icons"> 
                <i class="fa fa-user icon"></i> 
                <input class="input-field" 
                       type="text"
                       name="name"
                       maxlength="100"
                       value="<?php echo htmlspecialchars($name); ?>"
                       placeholder="User Name" required> 
            </div> 
             
            <?php
//isset($_SESSION['access_lvl'])and
error_reporting(0);
if ($_SESSION['access_lvl']==3) {
     echo "<fieldset>\n";
     echo "<legend>Access Level</legend>\n";

     $sql=$conn->prepare("SELECT * FROM cms_access_lvl ORDER BY access_lvl DESC");
     $sql->execute();
     while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo '<input type="radio" class="radio" name="accl_" id="acl_" value="'.
             $row['access_lvl'] .'"';
        
        if ($row['access_lvl']==$accesslvl) {
             echo 'checked="checked" ';
        }     
        echo '>'. $row['access_name']. "<br>\n";
      }
      echo '<input type="radio" id="delete_" name="accl_" value="delete">
      <label for="delete">Delete User</label><br>';
      ?>
      </fieldset>
      <p>
      <input type="hidden" name="userid" value="<?php echo $userid;?>">
      <input type="submit" class="loginbtn" name="action" value="Modify Account">
      </p>
      <?php
    } else {
          ?>
          <div class="input-icons"> 
                <i class="fa fa-key icon"></i> 
                <input class="input-field" 
                       id="passwd"
                       type="password"
                       name="passwd"
                       minlength="8"
                       placeholder="Password" required> 
            </div>
     <div id="passcheck"></div>
     <div class="input-icons"> 
                <i class="fa fa-key icon"></i> 
                <input class="input-field" 
                       id="passwd2"
                       type="password"
                       name="passwd2"
                       minlength="8"
                       placeholder="Password(again)" required
                       onkeydown="matchPass();"> 
            </div>
     <div class="matchingPass" id="matchingPass"></div>
     <p><input type="submit" class="loginbtn" name="action" value="CreateAccount"></p>
     <?php
    }
    ?>
     </form>
</div>

</div>
<?php require_once 'footer.php'?>