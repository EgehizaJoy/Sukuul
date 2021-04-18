<?php 
require_once 'conn.php';

if(isset($_GET['a'])
    and $_GET['a']=='edit' 
    and isset($_GET['article'])
    and $_GET['article']) {
      if (isset($_GET['article_category'])) {
        if($_GET['article_category']=='g1math'){
          $sql=$conn->prepare("SELECT title,body,author_id FROM grade_one_math WHERE article_id=".$_GET['article']);
          $sql->execute();
          require_once 'edit_component.php';
         }
         if($_GET['article_category']=='g1eng'){
          $sql=$conn->prepare("SELECT title,body,author_id FROM grade_one_eng WHERE article_id=".$_GET['article']);
          $sql->execute();
          require_once 'edit_component.php';
         }
         if($_GET['article_category']=='g1scie'){
          $sql=$conn->prepare("SELECT title,body,author_id FROM grade_one_sci WHERE article_id=".$_GET['article']);
          $sql->execute();
          require_once 'edit_component.php';
         }
         if($_GET['article_category']=='g2math'){
          $sql=$conn->prepare("SELECT title,body,author_id FROM grade_two_math WHERE article_id=".$_GET['article']);
          $sql->execute();
          require_once 'edit_component.php';
         }
        if($_GET['article_category']=='g2eng'){
         $sql=$conn->prepare("SELECT title,body,author_id FROM grade_two_eng WHERE article_id=".$_GET['article']);
         $sql->execute();
        }
         if($_GET['article_category']=='g2scie'){
          $sql=$conn->prepare("SELECT title,body,author_id FROM grade_two_sci WHERE article_id=".$_GET['article']);
          $sql->execute();
          require_once 'edit_component.php';
         }
         if($_GET['article_category']=='g3math'){
          $sql=$conn->prepare("SELECT title,body,author_id FROM grade_three_math WHERE article_id=".$_GET['article']);
          $sql->execute();
          require_once 'edit_component.php';
         }
         if($_GET['article_category']=='g3eng'){
          $sql=$conn->prepare("SELECT title,body,author_id FROM grade_three_eng WHERE article_id=".$_GET['article']);
          $sql->execute();
          require_once 'edit_component.php';
         }
         if($_GET['article_category']=='g3scie'){
         $sql=$conn->prepare("SELECT title,body,author_id FROM grade_three_sci WHERE article_id=".$_GET['article']);
         $sql->execute();
         require_once 'edit_component.php';
        }
        
      }
}
require_once 'header.php';
error_reporting(0);
$_SESSION['gradeonemath']=$_GET["grade1math"];
$_SESSION['gradeoneeng']=$_GET["grade1eng"];
$_SESSION['gradeonescie']=$_GET["grade1scie"];
$_SESSION['gradetwomath']=$_GET["grade2math"];
$_SESSION['gradetwoeng']=$_GET["grade2eng"];
$_SESSION['gradetwoscie']=$_GET["grade2scie"];
$_SESSION['gradethreemath']=$_GET["grade3math"];
$_SESSION['gradethreeeng']=$_GET["grade3eng"];
$_SESSION['gradethreescie']=$_GET["grade3scie"];
?>
<form method="post" enctype="multipart/form-data" action="transact-article.php" class="uploadForm">  
 
 <div>
 <h2 style="margin-left:20">Compose Article</h2>
  <input type="text" class="title" name="title" maxlength="255" required
   value="<?php echo htmlspecialchars($title);?>" placeholder="Set Titile">
   
  <p >Select an image to be shown at the top of your article 
     by choosing from your computer  </p>
  <p>Select Image
  <input type="file" name="file" accept="image/*" onchange="preview_image(event)" required></p>
    <p>Preview Image</p>
    <img id="output_image" class="output_image" style="width:200px;height:200px; background-image: url('assets/images/preview.png');"/>

  <p>Body:</p>
   <textarea class="body" name="body" id="body" rows="60" cols="50"> 
    <?php
      echo htmlspecialchars($body);
    ?>
   </textarea>
   <script>
   //replace the text area id <body> with ck editor
   //instance, using deault configuration
   CKEDITOR.replace('body',{
       language:'eng'
   });
   </script>
   
 </div> 

    <?php
      echo '<input type="hidden" name="article" value="'.
      $article."\">\n";
      echo '<input type="hidden" name="category" value="'.
      $_GET['article_category']."\">\n";

      if ($_SESSION['access_lvl']==2) {
          echo '<input type="hidden" name="authorid" value="'.
          $authorid."\">\n";
      }

      if ($article) {
        echo '<input type="submit" class="btn_type_" name="action"'.
        "value=\"Save changes\">\n";
      }else {
          echo '<input type="submit" class="btn_type_" name="action" '.
          "value=\"Submit New Article\">\n";
      }
    ?>
</form>
</div>
<?php require_once 'footer.php';?>