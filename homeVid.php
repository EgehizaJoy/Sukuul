<?php require_once 'header.php';
$_SESSION['addVideos']=$_GET['addVideos'];
?>
<form method="post" enctype="multipart/form-data" action="transact-upload-contents.php" class="uploadForm">  
    
<input type="text" class="title" name="title" maxlength="255" required placeholder="Set Titile">
  <p>Select Video(Upload Video less than 10kb)
  <input type="file" name="file" accept="video/*" onchange="preview_video(event)" required></p>
    <p>Preview Video</p>
    <video id=output_video class="output_image" autoplay muted loop style="width:300px;height:300px;">
    <source src="" type="video/mp4"></video><br>
    <input type="submit" class="btn_type_" name="action"  value="Change Video">
</form>
</div>
<?php require_once 'footer.php';?>