<?php require_once 'header.php';
require_once 'conn.php';
?>
<h3 style="margin-top:10;color:rgb();color:rgb(34, 2, 65);text-align:center">Select Video in order to publish or delete it</h3>
<div class="videos_div">
<div class="pending_videos">
<h3 style="margin-top:10;color:rgb();color:rgb(34, 2, 65);text-align:center">PENDING VIDEOS</h3>
<?php
$sql=$conn->prepare("SELECT * FROM videos WHERE is_published=0 ORDER BY date_submitted DESC");
$sql->execute();
  if ($sql->rowCount()>0) {
       while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
          $vidURL=$row['location_'];
          $vidTitle=$row['title'];
          $vid_id=$row['id'];
          echo '<div style="margin-left: 25%;">';
          echo '<a href="reviewVideo_.php?video='.$vid_id.'&is_published='.$row['is_published'].'&location='.$vidURL.'">';
          ?>
          <div class="reviewVideo">
          <h2><?php echo $vidTitle?></h2>
          <video width="100%" height="100%" autoplay muted loop >
          <source src='<?php echo $vidURL?>'type='video/mp4'></video>;
          </div></a>
       </div>
          <?php
       }
  }
?>
</div>
<div class="pending_videos">
<h3 style="margin-top:10;color:rgb();color:rgb(34, 2, 65);text-align:center">PUBLISHED VIDEOS</h3>
<?php
$sql=$conn->prepare("SELECT * FROM videos WHERE is_published=1 ORDER BY date_submitted DESC");
$sql->execute();
  if ($sql->rowCount()>0) {
       while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
          $vidURL=$row['location_'];
          $vidTitle=$row['title'];
          $vid_id=$row['id'];
          echo '<div style="margin-left: 25%;">';
          echo '<a href="reviewVideo_.php?video='.$vid_id.'&is_published='.$row['is_published'].'&location='.$vidURL.'">';
          ?>
          <div class="reviewVideo">
          <h2><?php echo $vidTitle?></h2>
          <video width="100%" height="100%" autoplay muted loop>
          <source src='<?php echo $vidURL?>'type='video/mp4'></video>;
          </div></a>
       </div>
          <?php
       }
  }
?>
</div>
</div>
<?php require_once 'footer.php'?>