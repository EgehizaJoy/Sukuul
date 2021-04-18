<?php require_once 'header.php';
require_once 'conn.php';
require_once 'output_functions.php';?>

<div class="right_left_container" style="background-image: url('assets/images/monster3.jpg');">
  <div class="right_side">
     <div class="vid_cntainer">
       <video id="vid1" class="chosen_contents" autoplay onmouseover="show_controls();" onmouseout="remove_controls();"  onended="refresh();">
       <source src="assets/videos/endGame.mp4" type="video/mp4"></video>
       <div class="play_pause_btn">
      </div>
    </div>  

      <div class="left_right_box">
       <hr>
       <p class="right_side_txt" id="right_box_more">Video Description...</p>
       <hr>
       <div id='more_abt'>more about the video</div>
       </div>
 </div>
    
    <div class="left_side">
    <div style="margin-left:35%" id="scrollUp"><i class="fas fa-chevron-up arrows"></i></div>
      <div class="scroll_items" id="scroll_items">
      <?php
       require_once 'conn.php';
       $sql=$conn->prepare("SELECT location_,more FROM videos WHERE is_published=1 ORDER BY date_submitted DESC");
       $sql->execute();
         if ($sql->rowCount()>0) {
              while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                 $vidURL=$row['location_'];
                 $more=$row['more'];
                 ?>
                 <div style="margin-top:10;cursor:pointer" id="vid_div" >
                 <video onclick="my_vid('<?php echo $vidURL?>','<?php echo $more?>');" width="100%" height="150px" autoplay muted loop id="vidsrc">
                 <source src='<?php echo $vidURL?>'type='video/mp4'></video>
                 </div>
                 <?php
              }
         }
       ?>
   </div>
   <div style="margin-left:40%" id="scrollDown"><i class="fas fa-chevron-down arrows"></i></div>
</div>
</div>
<script>
 var starttime = 0;  // start at 0 seconds
 var endtime = 30;
 var video = document.getElementById('vidsrc');

    video.addEventListener("timeupdate", function() {
       if (this.currentTime >= endtime) {
        this.currentTime = 0;
        this.play();
        }
    }, false);

    //suppose that video src has been already set properly
    video.load();
    video.play();    //must call this otherwise can't seek on some browsers, e.g. Firefox 4
    try {
        video.currentTime = starttime;
    } catch (ex) {
        //handle exceptions here
    }
</script>
<?php require_once 'footer.php'?>