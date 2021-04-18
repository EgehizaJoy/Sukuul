<div class="slideshow_container">
<?php
       require_once 'conn.php';
       $sql=$conn->prepare("SELECT * FROM header_video");
       $sql->execute();
         if ($sql->rowCount()>0) {
              while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                 $vidURL=$row['location_'];
                 $vidId=$row['id'];
              }
            }
                 ?>
 <div class="mySlides fade">
 <i class="fas fa-play click_me" onclick="Showmodal()"></i>
  <video id=myVideo class="backgrund_video" autoplay muted loop>
    <source src="<?php echo $vidURL?>" type="video/mp4"></video>
  <div class="text"><span id="date"></span><br><span id="time"></span></div>
 </div>
 <!-- The modal-->
 <div id="myModal" class="modal">
    <!--The modal content -->
    <div class="modal-content">
     <span class="close" onclick="Closemodal();">Close&times;</span> 
     <video id=myVideo width="100%" height="80%" controls><source src="<?php echo $vidURL?>" type="video/mp4"></video>
    </div>
 </div>
</div><br>
<div style="text-align:center;">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<script>
var dt = new Date();
var dt1=new Date();
var dt2=new Date();
document.getElementById("date").innerHTML = dt.toLocaleDateString();
document.getElementById("date1").innerHTML = dt.toLocaleDateString();
document.getElementById("date2").innerHTML = dt.toLocaleDateString();

var tm = new Date();
var tm1= new Date();
var tm2= new Date();
document.getElementById("time").innerHTML = tm.toLocaleTimeString();
document.getElementById("time1").innerHTML = tm1.toLocaleTimeString();
document.getElementById("time2").innerHTML = tm2.toLocaleTimeString();

var starttime = 0;  // start at 0 seconds
var endtime = 180;
</script>