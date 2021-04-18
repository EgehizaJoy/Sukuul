<?php require_once 'header.php';
$books=$_GET['books'];
$_SESSION['books']=$books;
$sql=$conn->prepare("SELECT * FROM books WHERE id=".$games);
$sql->execute();
$bookUrl=$_GET['location'];
?>
<div class="my_iframe">
<iframe src="<?php echo $bookUrl?>" width="100%" height="100%" frameborder="0"></iframe>
</div>
<input type="hidden" name="books" id="books" value="<?php echo $books ?>">
<form method="post" action="transact-upload-contents.php">  
<?php
 echo "<div class='editpubdelete'>";
echo "<input type=\"submit\" class=\"btn_type\"".
      "name=\"action\" value=\"Delete Book\">";
  echo "</div>";  
  echo '</form>';

require_once 'footer.php';?>
