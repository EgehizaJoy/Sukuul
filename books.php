<?php require_once 'header.php'?>
<div class="right_left_container" style="background-image: url('assets/images/monster3.jpg');">
  <div class="right_side">
     <div class="game_container" id="game_container">
       <iframe src="assets/books/Ollie.pdf" id="main_pdf_file" width="100%" height="100%" frameborder="0"></iframe>
     </div>  
  </div>
    
  <div class="left_side">
    <div style="margin-left:35%" id="scrollUp"><i class="fas fa-chevron-up arrows"></i></div>
      <div class="scroll_items" id="scroll_items">
      <?php
       require_once 'conn.php';
       $sql=$conn->prepare("SELECT * FROM books ORDER BY id DESC");
       $sql->execute();
         if ($sql->rowCount()>0) {
              while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                 $bookUrl=$row['location_'];
                 $bookCover=$row['book_cover'];
                 $booktitle=$row['title'];
                 ?>
                 <div style="margin-top:10;cursor: pointer;" id="video_div" >
                 <p style="color:white;text-align:center"><?php echo $booktitle?></p>
                 <img src='<?php echo $bookCover?>' width="100%" height="200px" onclick="my_books('<?php echo $bookUrl?>');"/>
                 </div>
                 <?php
              }
         }
       ?>
   </div>
   <div style="margin-left:40%" id="scrollDown"><i class="fas fa-chevron-down arrows"></i></div>
</div>
</div>
<?php require_once 'footer.php'?>
