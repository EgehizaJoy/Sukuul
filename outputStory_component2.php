<?php 
            $imageURL=$row['location_'];
            echo "<div class='headerImagediv'>";
            echo "<img src='$imageURL' class='headerimage' style='width:100%;height:99%;background-image: url('assets/images/slider2.jpg');'/>";
            echo "</div>";
            echo "<h3 class='title_tag'>".htmlspecialchars($row['title'])."</h3>\n";
            echo "<h5><div class=\"byline\">By: " .
             htmlspecialchars($row['name']) .
             "</div>";
             echo "<div class=\"pubdate\">";

             if($row['is_published']==1){
                 echo date("F j, Y",strtotime($row['date_published']));
             }else{
                 echo "not yet published";
             }
             echo "</div></h5>\n";
             echo "<div class=\"pagebody\">";
                 //echo htmlspecialchars_decode(stripcslashes($row['body']));
                echo htmlspecialchars_decode($row['body']);
                 echo "</div>\n";
             
 ?>