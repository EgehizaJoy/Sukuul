<?php
require_once 'conn.php';
require_once 'header.php';
echo '<div class="cpanel">';
$sql=$conn->prepare("SELECT name,email FROM cms_users WHERE user_id=". $_SESSION['user_id']);
$sql->execute();
$user=$sql->fetch(PDO::FETCH_ASSOC);
?>
<p class="article_review">Select Article in order to Review and Manipulate it</p>
<div class="cpanel_divs">
<div class="cpanel_personal">
  <h2 class="txt_">Personal Info</h2>
<form method="post" action="transact-user.php">
<p class="txt_">User Name:</p> 
   <div class="input-icons"> 
                <i class="fa fa-user icon"></i> 
                <input class="input-field" 
                       type="text"
                       name="name"
                       id="name"
                       maxlength="255"
                       value="<?php echo htmlspecialchars($user['name']);?>"
                       > 
            </div> 

  <p class="txt_">Email Address:</p>     
   <div class="input-icons"> 
                <i class="fa fa-envelope icon"></i> 
                <input class="input-field" 
                       type="text"
                       name="name"
                       id="email"
                       maxlength="255"
                       value="<?php echo htmlspecialchars($user['email']);?>"
                       > 
                         
            </div>  
</form>
</div>

<div class="cpanel_items">
<h2 class="txt_">Pending Articles</h2>
  <div>
      <?php
      $mysession=$_SESSION['user_id'];
        $sql=$conn->prepare("SELECT article_id,title,date_submitted FROM grade_one_math WHERE is_published=0
        AND author_id=$mysession ORDER BY date_submitted");
        $sql->execute();

        $sql1=$conn->prepare("SELECT article_id,title,date_submitted FROM grade_one_eng WHERE is_published=0
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql1->execute();

        $sql2=$conn->prepare("SELECT article_id,title,date_submitted FROM grade_one_sci WHERE is_published=0
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql2->execute();

        $sql3=$conn->prepare("SELECT article_id,title,date_submitted FROM grade_two_math WHERE is_published=0
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql3->execute();

        $sql4=$conn->prepare("SELECT article_id,title,date_submitted FROM grade_two_eng WHERE is_published=0
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql4->execute();

        $sql5=$conn->prepare("SELECT article_id,title,date_submitted FROM grade_two_sci WHERE is_published=0
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql5->execute();

        $sql6=$conn->prepare("SELECT article_id,title,date_submitted FROM grade_three_math WHERE is_published=0
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql6->execute();

        $sql7=$conn->prepare("SELECT article_id,title,date_submitted FROM grade_three_eng WHERE is_published=0
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql7->execute();

        $sql8=$conn->prepare("SELECT article_id,title,date_submitted FROM grade_three_sci WHERE is_published=0
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql8->execute();

          while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradeonemath.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            " (submitted".
            date("F j,Y",strtotime($row['date_submitted'])).
            ")</a><br>\n";
          }
      
          while ($row=$sql1->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradeoneeng.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            " (submitted".
            date("F j,Y",strtotime($row['date_submitted'])).
            ")</a><br>\n";
          }
          while ($row=$sql2->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradeonescie.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            " (submitted".
            date("F j,Y",strtotime($row['date_submitted'])).
            ")</a><br>\n";
          }
          while ($row=$sql3->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradetwomath.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            " (submitted".
            date("F j,Y",strtotime($row['date_submitted'])).
            ")</a><br>\n";
          }
          while ($row=$sql4->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradetwoeng.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            " (submitted".
            date("F j,Y",strtotime($row['date_submitted'])).
            ")</a><br>\n";
          }
          while ($row=$sql5->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradetwoscie.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            " (submitted".
            date("F j,Y",strtotime($row['date_submitted'])).
            ")</a><br>\n";
          }
          while ($row=$sql6->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradethreemath.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            " (submitted".
            date("F j,Y",strtotime($row['date_submitted'])).
            ")</a><br>\n";
          }
          while ($row=$sql7->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradethreeeng.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            " (submitted".
            date("F j,Y",strtotime($row['date_submitted'])).
            ")</a><br>\n";
          }
          while ($row=$sql8->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradethreescie.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            " (submitted".
            date("F j,Y",strtotime($row['date_submitted'])).
            ")</a><br>\n";
          }
        //else {
          //  echo "<em class='date_'>No Pending Articles Available</em>";
        //}
      ?>
</div>
      </div>

<div class="cpanel_items">
   <h2 class="txt_">Published Articles</h2>
   <div class="scroller">
      <?php
        $sql1=$conn->prepare("SELECT article_id,title,date_published FROM grade_one_math WHERE is_published=1
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql1->execute();

        $sql2=$conn->prepare("SELECT article_id,title,date_published FROM grade_one_eng WHERE is_published=1
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql2->execute();

        $sql3=$conn->prepare("SELECT article_id,title,date_published FROM grade_one_sci WHERE is_published=1
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql3->execute();

        $sql4=$conn->prepare("SELECT article_id,title,date_published FROM grade_two_math WHERE is_published=1
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql4->execute();

        $sql5=$conn->prepare("SELECT article_id,title,date_published FROM grade_two_eng WHERE is_published=1
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql5->execute();

        $sql6=$conn->prepare("SELECT article_id,title,date_published FROM grade_two_sci WHERE is_published=1
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql6->execute();

        $sql7=$conn->prepare("SELECT article_id,title,date_published FROM grade_three_math WHERE is_published=1
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql7->execute();

        $sql8=$conn->prepare("SELECT article_id,title,date_published FROM grade_three_eng WHERE is_published=1
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql8->execute();

        $sql9=$conn->prepare("SELECT article_id,title,date_published FROM grade_three_sci WHERE is_published=1
        AND author_id='".$_SESSION['user_id']."' ORDER BY date_submitted");
        $sql9->execute();

        if ($sql1->rowCount()!=0||$sql2->rowCount()!=0||$sql3->rowCount()!=0||$sql4->rowCount()!=0||$sql5->rowCount()!=0||$sql6->rowCount()!=0||$sql7->rowCount()!=0||$sql8->rowCount()!=0||$sql9->rowCount()!=0) {
          while ($row=$sql1->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradeonemath.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            "(published".
            date("F j,Y",strtotime($row['date_published'])).
            ")</a><br>\n";
           }
          while ($row=$sql2->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradeoneeng.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            "(published".
            date("F j,Y",strtotime($row['date_published'])).
            ")</a><br>\n";
           }
           while ($row=$sql3->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradeonescie.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            "(published".
            date("F j,Y",strtotime($row['date_published'])).
            ")</a><br>\n";
           }
           while ($row=$sql4->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradetwomath.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            "(published".
            date("F j,Y",strtotime($row['date_published'])).
            ")</a><br>\n";
           }
           while ($row=$sql5->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradetwoeng.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            "(published".
            date("F j,Y",strtotime($row['date_published'])).
            ")</a><br>\n";
           }
           while ($row=$sql6->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradetwoscie.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            "(published".
            date("F j,Y",strtotime($row['date_published'])).
            ")</a><br>\n";
           }
           while ($row=$sql7->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradethreemath.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            "(published".
            date("F j,Y",strtotime($row['date_published'])).
            ")</a><br>\n";
           }
           while ($row=$sql8->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradethreeeng.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            "(published".
            date("F j,Y",strtotime($row['date_published'])).
            ")</a><br>\n";
           }
           while ($row=$sql9->fetch(PDO::FETCH_ASSOC)) {
            echo '<a href="gradethreescie.php?article='.
            $row['article_id']. '">'.htmlspecialchars($row['title']).
            "(published".
            date("F j,Y",strtotime($row['date_published'])).
            ")</a><br>\n";
           }
        }else {
            echo "<em class='date_'>No Published Articles Available</em>";
        }
      ?>
  </div><br>
      </div>
      </div>
 </div>
<?php require_once 'footer.php';?>