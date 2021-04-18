<?php require_once 'header.php';
$video=$_GET['video'];
$_SESSION['video']=$video;
$is_published=$_GET['is_published'];
$sql=$conn->prepare("SELECT * FROM videos WHERE id=".$video);
$sql->execute();
$vidURL=$_GET['location'];
?>
<div class="pubdelete">
<video width="50%" height="50%" autoplay loop controls>
<source src='<?php echo $vidURL?>'type='video/mp4'></video>;
</div>
<input type="hidden" name="video" id="video" value="<?php echo $video ?>">
<?php
if ($is_published==1) {
    $buttonType="Retract Video";
}
 else {
        $buttonType="Publish Video";
    }
?>
<form method="post" action="transact-upload-contents.php">  
<?php
 echo "<div class='editpubdelete'>";
    echo "<input type=\"submit\" class=\"btn_type\"".
    "name=\"action\" value=\"$buttonType\">";
echo "<input type=\"submit\" class=\"btn_type\"".
      "name=\"action\" value=\"Delete Video\">";
  echo "</div>";  
  echo '</form>';

require_once 'footer.php';?>
