<?php require_once 'header.php';
$_SESSION['addVideos']=$_GET['addVideos'];
?>
<div class="login_container">
<!--div for logo-->
 
 <!--Div for the login form-->
<div class="uploadGameContainer">
<form method="post" enctype="multipart/form-data" action="transact-upload-contents.php" class="uploadForm"> 
            <div class="input-icons"> 
                <i class="fas fa-gamepad icon"></i> 
                <input class="input-field" 
                       type="text"
                       name="title"
                       maxlength="255"
                       placeholder="Set Title" required> 
            </div> 
  
            <div class="input-icons"> 
                <i class="fa fa-key icon"></i> 
                <input class="input-field" 
                       type="text"
                       name="gameLink"
                       maxlength="255"
                       placeholder="Paste Link of the Game" required> 
            </div>
            <p>Select image caption for the game</p>
            <input type="file" name="file"  accept="image/*" onchange="preview_image(event)" required></p>
            <p>Preview cover Image</p>
            <img id="output_image" class="output_image" style="width:200px;height:200px; background-image: url('assets/images/preview.png');"/>
            <input type="submit" class="btn_type_" name="action" value="Submit Game">
        </form> 
</div>
</div>
</div>
<?php require_once 'footer.php';?>