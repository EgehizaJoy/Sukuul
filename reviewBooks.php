<?php require_once 'header.php';
require_once 'conn.php';
?>
<h3 style="margin-top:10;color:rgb();color:rgb(34, 2, 65);text-align:center">Select a book to delete it</h3>
<div class="videos_div">
<div class="pending_videos">
<h3 style="margin-top:10;color:rgb();color:rgb(34, 2, 65);text-align:center">Books</h3>
<?php
$sql=$conn->prepare("SELECT * FROM books ORDER BY id DESC");
$sql->execute();
  if ($sql->rowCount()>0) {
       while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
          $bookUrl=$row['location_'];
          $bookTitle=$row['title'];
          $book_id=$row['id'];
          echo '<div style="margin-left: 25%;">';
          echo '<a href="reviewBooks_.php?books='.$book_id.'&location='.$bookUrl.'">';
          ?>
          <div class="reviewVideo">
          <h2><?php echo $bookTitle?></h2>
          <iframe src="<?php echo $bookUrl?>" width="100%" height="100%" frameborder="0"></iframe>
          </div></a>
       </div>
          <?php
       }
  }
?>
</div>
</div>
<?php require_once 'footer.php'?>