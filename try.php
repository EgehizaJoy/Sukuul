<?php require_once 'header.php';?>
<div class="slideshow_container">
 <div class="mySlides fade">
 <?php
       require_once 'conn.php';
       $sql=$conn->prepare("SELECT * FROM header_video ORDER BY date_submitted DESC");
       $sql->execute();
         if ($sql->rowCount()>0) {
              while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                 $vidURL=$row['location_'];
                 $vidId=$row['id'];
                 ?>
                 <video id=myVideo_ class="backgrund_video" autoplay muted loop>
    <source src="<?php echo $vidURL?>" type="video/mp4"></video>
  <div class="header_links">
  <a id="playVid" class="theLinks" onclick="Showmodal()">Play Video</a>
  <a id="demoVid" class="theLinks" onclick="demoVideo()">Demo</a>
  <a id="contactUs" class="theLinks" onclick="contactUs()">Contact US</a>
  </div>
  <div class="text"><br><span id="time"></span><br><span id="date"></span></div>
 </div>
 <!-- The modal-->
 <div id="myModal" class="modal">
    <!--The modal content -->
    <div class="modal-content">
     <span class="close" onclick="Closemodal();">Close&times;</span> 
     <video id=myVideo width="100%" height="80%" controls><source src="<?php echo $vidURL?>" type="video/mp4"></video>
    </div>
 </div>

  <!-- The error message modal-->
  <div id="errorModal" class="modal">
    <!--The modal content -->
    <div class="modal-content">
     <span class="close" onclick="Closemodal();">Close&times;</span> 
     <div class="login_popup" id="login_popup"><?php include 'login.php'?></div>
    </div>
 </div>
                 <?php
              }
         }
       ?>

</div>
<script>
//document.getElementById("date").innerHTML = m + "/" + d + "/" ;
   dt = new Date();
  d = dt.getDate();
  var weekday = new Array(7);
  weekday[6] = "Sunday";
  weekday[0] = "Monday";
  weekday[1] = "Tuesday";
  weekday[2] = "Wednesday";
  weekday[3] = "Thursday";
  weekday[4] = "Friday";
  weekday[5] = "Saturday";

  var month = new Array(12);
  month[1] = "January";
  month[2] = "February";
  month[3] = "March";
  month[4] = "April";
  month[5] = "May";
  month[6] = "June";
  month[7] = "July";
  month[8] = "August";
  month[9] = "September";
  month[10] = "October";
  month[11] = "November";
  month[12] = "December";

  var wd = weekday[dt.getDay()];
  var mth=month[dt.getMonth()+1];
  document.getElementById("date").innerHTML = wd+","+mth + " " + d  ;
var tm = new Date();
var n = tm.getHours();
var mts = tm.getMinutes();
document.getElementById("time").innerHTML =n+":"+mts;

    var starttime = 0;  // start at 0 seconds
    var endtime = 180;    // stop at 30 seconds

    var video = document.getElementById('myVideo_');

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
<?php require_once 'footer.php';?>
