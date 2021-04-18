<?php
require_once 'conn.php';
require_once 'output_functions.php';
require_once 'header.php';
?>
<form method="post" action="transact-article.php">
  <h2 class="article_review">Article Review</h2>
   <?php
   outputgradetwomath($_GET['article']);
      
        $sql=$conn->prepare("SELECT ar.*,usr.name,usr.access_lvl 
        FROM grade_two_math ar INNER JOIN cms_users usr
        ON ar.author_id=usr.user_id 
        WHERE article_id=".$_GET['article']);
        $sql->execute(); 
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        require_once 'reviewarticle_component.php';
   ?>

<input type="hidden" name="article" value="<?php echo $_GET['article'] ?>">
<input type="hidden" name="article_category" value="g2math">
</p>
</form>
<?php require_once 'footer.php'?>