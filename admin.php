<?php
require_once 'conn.php';
require_once 'header.php';
$a_users=array(1 => "Other Users","Teachers","Administrators");

function echoUserList($lvl){
global $a_users;

$conn = new PDO('mysql:host=localhost;dbname=kidscms', 'root', '');
$sql=$conn->prepare("SELECT user_id,name FROM cms_users WHERE access_lvl=$lvl ORDER BY name");
$sql->execute();

if ($sql->rowCount()==0) {
    echo "<em>No". $a_users[$lvl]."created.</em>";
}else {
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
         if ($row['user_id']==$_SESSION['user_id']) {
             echo htmlspecialchars($row['name'])."<br>\n";
         }else {
             echo '<a href="user_account.php?userid=' . $row['user_id'].
             '"title"'. htmlspecialchars($row['email']). '">'.
             htmlspecialchars($row['name'])."</a><br>\n";
          }
      }
   }
}
echo '<div class="admin_items">';
echo "<h3 class='txt_'>Select users in order their Modify their Account</h3>";
for ($i=3; $i>0 ; $i--) { 
    echo "<h3>". $a_users[$i]. "</h3>".
         "<div class='admin_items_'>";
         echoUserList($i);
         echo "</div>";
 }
 echo '</div>';
require_once 'footer.php';
?>