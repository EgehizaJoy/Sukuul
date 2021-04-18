<?php
session_start();
require_once 'conn.php';
require_once('http.php');
require_once 'output_functions.php';
 $result=NULL;
if (isset($_GET['keywords'])){
$sql=$conn->query("SELECT article_id, MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) as mysearch
     FROM grade_one_math WHERE MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) ORDER BY mysearch DESC");

$sql1=$conn->query("SELECT article_id, MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) as mysearch
FROM grade_one_eng WHERE MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) ORDER BY mysearch DESC");


$sql2=$conn->query("SELECT article_id, MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) as mysearch
FROM grade_two_sci WHERE MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) ORDER BY mysearch DESC");


$sql3=$conn->query("SELECT article_id, MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) as mysearch
FROM grade_two_math WHERE MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) ORDER BY mysearch DESC");


$sql4=$conn->query("SELECT article_id, MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) as mysearch
FROM grade_two_eng WHERE MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) ORDER BY mysearch DESC");


$sql5=$conn->query("SELECT article_id, MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) as mysearch
FROM grade_two_sci WHERE MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) ORDER BY mysearch DESC");


$sql6=$conn->query("SELECT article_id, MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) as mysearch
FROM grade_three_math WHERE MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) ORDER BY mysearch DESC");

$sql7=$conn->query("SELECT article_id, MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) as mysearch
FROM grade_three_eng WHERE MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) ORDER BY mysearch DESC");


$sql8=$conn->query("SELECT article_id, MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) as mysearch
FROM grade_three_sci WHERE MATCH(title,body) AGAINST ('".$_GET['keywords']."' IN BOOLEAN MODE) ORDER BY mysearch DESC");

}
if (!$sql||!$sql) {
    die("query error:".print_r($conn->errorInfo(),true));
}else {
    echo "<h2></h2>\n";

    if ($sql->rowCount()==0 && $sql1->rowCount()==0&& $sql2->rowCount()==0&& $sql3->rowCount()==0&& $sql4->rowCount()==0&& $sql5->rowCount()==0&& $sql6->rowCount()==0&& $sql7->rowCount()==0&& $sql8->rowCount()==0) {
        redirect('sorry.php');
    }else {
        require_once 'header.php';
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
            outputgradeonemath($row['article_id'],TRUE);
        }
        while ($row1=$sql1->fetch(PDO::FETCH_ASSOC)) {
            outputgradeoneeng($row1['article_id'],TRUE);
        }
        while ($row1=$sql1->fetch(PDO::FETCH_ASSOC)) {
            outputgradescie($row1['article_id'],TRUE);
        }
        while ($row1=$sql1->fetch(PDO::FETCH_ASSOC)) {
            outputgradetwomath($row1['article_id'],TRUE);
        }
        while ($row1=$sql1->fetch(PDO::FETCH_ASSOC)) {
            outputgradetwoeng($row1['article_id'],TRUE);
        }
        while ($row1=$sql1->fetch(PDO::FETCH_ASSOC)) {
            outputgradetwoscie($row1['article_id'],TRUE);
        }
        while ($row1=$sql1->fetch(PDO::FETCH_ASSOC)) {
            outputgradethreemath($row1['article_id'],TRUE);
        }
        while ($row1=$sql1->fetch(PDO::FETCH_ASSOC)) {
            outputgradethreeeng($row1['article_id'],TRUE);
        }
        while ($row1=$sql1->fetch(PDO::FETCH_ASSOC)) {
            outputgradethreescie($row1['article_id'],TRUE);
        }
    }
}
require_once 'footer.php';
?>