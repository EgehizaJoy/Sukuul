<?php    
 if ($row['date_published'] and $row['is_published']) {
     echo '<h4 class="article_review">Published:'. 
      date("l F j, Y H:i",strtotime($row['date_published'])).
      "</h4>\n";
 }
 if ($row['is_published']==1) {
     $buttonType="Retract";
 }
  else {
         $buttonType="Publish";
     }

  echo "<div class='editpubdelete'>";
  echo "<input type=\"submit\" class=\"btn_type\" ".
   "name=\"action\" value=\"Edit\"> ";
 
 if (($row['access_lvl']>1) or ($_SESSION['access_lvl']>1)) {
     echo "<input type=\"submit\" class=\"btn_type\"".
     "name=\"action\" value=\"$buttonType\">";
 }
 echo "<input type=\"submit\" class=\"btn_type\"".
       "name=\"action\" value=\"Delete\">";
   echo "</div>";    
?>