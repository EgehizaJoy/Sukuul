<?php require_once 'header.php'?>
<div class="right_left_container" style="background-image: url('assets/images/monster3.jpg');">
  <div class="right_side">
     <div class="game_container" id="game_container">
       <iframe src="http://localhost" width="100%" height="100%" frameborder="0" name="myFrame" id="myFrame"></iframe>
     </div>  
  </div>
    
    <div class="left_side">
    <div style="margin-left:35%" id="scrollUp"><i class="fas fa-chevron-up arrows"></i></div>
      <div class="scroll_items" id="scroll_items">

      <?php
       require_once 'conn.php';
       $sql=$conn->prepare("SELECT location_ FROM games WHERE is_published=1 ORDER BY date_published DESC");
       $sql->execute();
         if ($sql->rowCount()>0) {
              while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                 $gameURL=$row['location_'];
                 ?>
                 
                 <a href="http://localhost/olskool/"><div style="margin-top:10;width:100%;height:150px;background-color:black">
                 </div></a>
                 <?php
              }
         }
       ?>
   </div>
   <div style="margin-left:40%" id="scrollDown"><i class="fas fa-chevron-down arrows"></i></div>
</div>
</div>
<?php require_once 'footer.php'?>
