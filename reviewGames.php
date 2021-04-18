<?php require_once 'header.php';
require_once 'conn.php';
?>
<h3 style="margin-top:10;color:rgb();color:rgb(34, 2, 65);text-align:center">Select a Game in order to publish or delete it</h3>
<div class="videos_div">
<div class="pending_videos">
<h3 style="margin-top:10;color:rgb();color:rgb(34, 2, 65);text-align:center">Pending Games</h3>
<?php
$sql=$conn->prepare("SELECT * FROM games WHERE is_published=0 ORDER BY date_submitted DESC");
$sql->execute();
  if ($sql->rowCount()>0) {
       while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
          $gameURL=$row['location_'];
          $gameTitle=$row['title'];
          $game_id=$row['id'];
          $image=$row['image_location'];
          echo '<div style="margin-left: 25%;">';
          echo '<a href="reviewGames_.php?games='.$game_id.'&is_published='.$row['is_published'].'&location='.$gameURL.'">';
          ?>
          <div class="reviewVideo">
          <h2><?php echo $gameTitle?></h2>
          <img src="<?php echo $image?>" width="100%" height="100%"/>
          </div></a>
       </div>
          <?php
       }
  }
?>
</div>
<div class="pending_videos">
<h3 style="margin-top:10;color:rgb();color:rgb(34, 2, 65);text-align:center">Published Games</h3>
<?php
$sql=$conn->prepare("SELECT * FROM games WHERE is_published=1 ORDER BY date_published DESC");
$sql->execute();
  if ($sql->rowCount()>0) {
       while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
          $gameURL=$row['location_'];
          $gameTitle=$row['title'];
          $game_id=$row['id'];
          $image=$row['image_location'];
          echo '<div style="margin-left: 25%;">';
          echo '<a href="reviewGames_.php?games='.$game_id.'&is_published='.$row['is_published'].'&location='.$gameURL.'">';
          ?>
          <div class="reviewVideo">
          <h2><?php echo $gameTitle?></h2>
          <img src="<?php echo $image?>" width="100%" height="100%"/>
          </div></a>
       </div>
          <?php
       }
  }
?>
</div>
</div>
<?php require_once 'footer.php'?>