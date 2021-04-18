<?php
//error_reporting(0);
require_once 'http.php';
$mysession=$_SESSION['name'];
$uri = $_SERVER['REQUEST_URI']; 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$_SESSION['current_page']=$url;
if($showLink){
         echo "<h4 style='margin-left:5%'>Share the Article</h4>";
         echo "<p class='shareLink'>Link to share:<BR>$url</p>";
         echo '<div class="social_icons">
                <a href="mailto:#"><i class="fa fa-envelope s_icon"></i></a>
                <a href="#"><i class="fab fa-twitter s_icon"></i></a>
                <a href="#"><i class="fab fa-instagram s_icon"></i></a>
                <a href="#"><i class="fab fa-facebook s_icon"></i></a>
            </div>';
         echo "<h4 style='margin-top: 2%;margin-left:5%' id='comments'>" .$sql->rowCount() . " Comments";
         echo "</h4>\n";
         if($is_published){
            #echo "<a href=\"comment.php?article=" . $_GET['article'] .
                 #"\n\">Add one</a>";
            echo "<form method='post' action='transact-article.php' class='comments'>
            <div class='commentDiv'>
            <textarea class='comment' name='comment' rows='2' cols='60' placeholder='Add a public comment' onclick='Addcomment();'></textarea><br>
            <input id='submitComment' class='submitComment' type='submit' class='submit' name='action' value='Send'>
            </div>
            <input type='hidden' name='article' value='".$_GET['article']."'>
            <input type='hidden' name='comment_type' value='".$comment_type."'>
            <input type='hidden' id='mysession' value='$mysession'/>
            </form>";
         }
      }
      if($sql->rowCount()>0){
         echo "<div id='comments' class=\"scroller\">\n";
         while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            echo "<span class=\"commentName\">" .
            htmlspecialchars($row['name']) .
            "</span><span class=\"commentDate\"> (" .
            date("l F j, Y H:i",strtotime($row['comment_date'])) .
            ") </span>\n";

            echo "<p class=\"commentText\">\n" .
            nl2br(htmlspecialchars($row['comment_'])) .
            "\n</p>\n";
        }
        echo "</div>\n";
      }
      echo "<br>\n";
      ?>