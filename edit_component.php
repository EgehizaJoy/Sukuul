<?php
$row = $sql->fetch(PDO::FETCH_ASSOC);
       $title=$row['title'];
       $body=$row['body'];
       $article=$_GET['article'];
       $authorid=$row['author_id'];
?>