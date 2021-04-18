<?php
require_once 'conn.php';
require_once 'output_functions.php';
require_once 'header.php';
error_reporting(0);
$_SESSION['getg1math']=$_GET["getg1math"];
$_SESSION['getg1eng']=$_GET["getg1eng"];
$_SESSION['getg1scie']=$_GET["getg1scie"];
$_SESSION['getg2math']=$_GET["getg2math"];
$_SESSION['getg2eng']=$_GET["getg2eng"];
$_SESSION['getg2scie']=$_GET["getg2scie"];
$_SESSION['getg3math']=$_GET["getg3math"];
$_SESSION['getg3eng']=$_GET["getg3eng"];
$_SESSION['getg3scie']=$_GET["getg3scie"];

if ($_SESSION['getg1math']) {
 $sql=$conn->prepare("SELECT article_id FROM grade_one_math WHERE is_published=1 ORDER BY  date_published DESC");
 $sql->execute();
 if($sql->rowCount()==0){
    echo "<br\n>";
    echo "There are currently no articles to view.\n";
}else {
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        outputgradeonemath($row['article_id'],TRUE);
    }
}
}
if ($_SESSION['getg1eng']) {
    $sql=$conn->prepare("SELECT article_id FROM grade_one_eng WHERE is_published=1 ORDER BY  date_published DESC");
    $sql->execute();
    if($sql->rowCount()==0){
       echo "<br\n>";
       echo "There are currently no articles to view.\n";
   }else {
       while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
           outputgradeoneeng($row['article_id'],TRUE);
       }
   }
   }
if ($_SESSION['getg1scie']) {
    $sql=$conn->prepare("SELECT article_id FROM grade_one_sci WHERE is_published=1 ORDER BY  date_published DESC");
    $sql->execute();
    if($sql->rowCount()==0){
       echo "<br\n>";
       echo "There are currently no articles to view.\n";
   }else {
       while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
           outputgradeonescie($row['article_id'],TRUE);
       }
   }
   }
if ($_SESSION['getg2math']) {
    $sql=$conn->prepare("SELECT article_id FROM grade_two_math WHERE is_published=1 ORDER BY  date_published DESC");
    $sql->execute();
    if($sql->rowCount()==0){
       echo "<br\n>";
       echo "There are currently no articles to view.\n";
   }else {
       while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
           outputgradetwomath($row['article_id'],TRUE);
       }
   }
   }
if ($_SESSION['getg2eng']) {
       $sql=$conn->prepare("SELECT article_id FROM grade_two_eng WHERE is_published=1 ORDER BY  date_published DESC");
       $sql->execute();
       if($sql->rowCount()==0){
          echo "<br\n>";
          echo "There are currently no articles to view.\n";
      }else {
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
              outputgradetwoeng($row['article_id'],TRUE);
          }
      }
      }
if ($_SESSION['getg2scie']) {
       $sql=$conn->prepare("SELECT article_id FROM grade_two_sci WHERE is_published=1 ORDER BY  date_published DESC");
       $sql->execute();
       if($sql->rowCount()==0){
          echo "<br\n>";
          echo "There are currently no articles to view.\n";
      }else {
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
              outputgradetwoscie($row['article_id'],TRUE);
          }
      }
      }
if ($_SESSION['getg3math']) {
        $sql=$conn->prepare("SELECT article_id FROM grade_three_math WHERE is_published=1 ORDER BY  date_published DESC");
        $sql->execute();
        if($sql->rowCount()==0){
           echo "<br\n>";
           echo "There are currently no articles to view.\n";
       }else {
           while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
               outputgradethreemath($row['article_id'],TRUE);
           }
       }
       }
if ($_SESSION['getg3eng']) {
           $sql=$conn->prepare("SELECT article_id FROM grade_three_eng WHERE is_published=1 ORDER BY  date_published DESC");
           $sql->execute();
           if($sql->rowCount()==0){
              echo "<br\n>";
              echo "There are currently no articles to view.\n";
          }else {
              while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                  outputgradethreeeng($row['article_id'],TRUE);
              }
          }
          }
    if ($_SESSION['getg3scie']) {
           $sql=$conn->prepare("SELECT article_id FROM grade_three_sci WHERE is_published=1 ORDER BY  date_published DESC");
           $sql->execute();
           if($sql->rowCount()==0){
              echo "<br\n>";
              echo "There are currently no articles to view.\n";
          }else {
              while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                  outputgradethreescie($row['article_id'],TRUE);
              }
          }
          }
require_once 'footer.php';
?>