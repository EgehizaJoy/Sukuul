<?php require_once 'header.php';
$games=$_GET['games'];
$_SESSION['games']=$games;
$is_published=$_GET['is_published'];
$sql=$conn->prepare("SELECT * FROM games WHERE id=".$games);
$sql->execute();
$gameURL=$_GET['location'];
?>
<div class="my_iframe">
<iframe src="<?php echo $gameURL?>" width="100%" height="100%" frameborder="0"></iframe>
</div>
<input type="hidden" name="games" id="games" value="<?php echo $games ?>">
<?php
if ($is_published==1) {
    $buttonType="Retract Game";
}
 else {
        $buttonType="Publish Game";
    }
?>
<form method="post" action="transact-upload-contents.php">  
<?php
 echo "<div class='editpubdelete'>";
    echo "<input type=\"submit\" class=\"btn_type\"".
    "name=\"action\" value=\"$buttonType\">";
echo "<input type=\"submit\" class=\"btn_type\"".
      "name=\"action\" value=\"Delete Game\">";
  echo "</div>";  
  echo '</form>';

require_once 'footer.php';?>
