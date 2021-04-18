<?php require_once 'header.php'?>
<div class="right_left_container" style="background-image: url('assets/images/monster3.jpg');background-size: auto 100%;
">
  <div class="right_side">
     <div class="game_container" id="game_container">
       <iframe src="https://www.educandy.com/site/resource.php?activity-code=1b767" id="main_game" width="100%" height="100%" frameborder="0"></iframe>
     </div>  
  </div>
    
  <div class="left_side">
    <div style="margin-left:35%" id="scrollUp"><i class="fas fa-chevron-up arrows"></i></div>
      <div class="scroll_items" id="scroll_items">
      <?php
       require_once 'conn.php';
       $sql=$conn->prepare("SELECT location_,image_location,title FROM games WHERE is_published=1 ORDER BY date_submitted DESC");
       $sql->execute();
         if ($sql->rowCount()>0) {
              while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                 $gameURL=$row['location_'];
                 $image=$row['image_location'];
                 $title=$row['title'];
                 ?>
                 <div style="margin-top:10;cursor:pointer" id="video_div" >
                 <p style="color:white;text-align:center"><?php echo $title?></p>
                 <image src='<?php echo $image?>' width="90%" style="margin-left:15" height="200px" onclick="my_games('<?php echo $gameURL?>');"/>
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
