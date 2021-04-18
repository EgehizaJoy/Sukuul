<?php require_once 'header.php';
?>
<form method="post" enctype="multipart/form-data" action="transact-upload-contents.php" class="uploadForm">  
    
<input type="text" class="title" name="title" maxlength="255" required placeholder="Set Titile">
  <p>Select book cover Image
  <input type="file" name="file"  accept="image/*" onchange="preview_image(event)" required></p>
  <p>Preview cover Image</p>
 <img id="output_image" class="output_image" style="width:200px;height:200px; background-image: url('assets/images/preview.png');"/>
 <p>Upload book
 <p>* Only PDF files are allowed</p>
 <input type="file" name="pdf_file"  accept="application/msword,text/plain,application/pdf" onchange="preview_pdf(event)" required></p>
 <input type="submit" class="btn_type_" name="action"  value="Submit Book">
</form>
</div>
<?php require_once 'footer.php';?>