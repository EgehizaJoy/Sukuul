<?php 
            $imageURL=$row['location_'];
            $alt_description=htmlspecialchars($row['title']);
            echo "<div id='contents'>";

            echo "<img src='$imageURL' alt='$alt_description' class='imageCaption'/>";
            
            echo "<div id='article_contents'>";
            echo "<h3>".htmlspecialchars($row['title'])."</h3>\n";
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
             
             if($only_snippet){
               echo "<p>\n";
               echo nl2br(htmlspecialchars_decode(stripcslashes(trimBody($row['body']))));
              // echo htmlspecialchars_decode(stripcslashes($row['body']));
               echo "</P>\n";
             }else{
                 echo "<p>\n";
                // echo nl2br(htmlspecialchars($row['body']));
                 echo htmlspecialchars_decode(stripcslashes($row['body']));
                 echo "</p>\n";
             }
            echo "</div>";//closiing article contents
            echo "</div>";//closing all the contents

             echo "</a></div>";
             echo "</div>"; 
 ?>