<?php
require_once 'conn.php'; 
function get_city($conn , $term){ 
 $query ="SELECT * FROM grade_one_math WHERE body LIKE '%".$term."%' ";
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}

if (!$query) {
    die("query error:".print_r($conn->errorInfo(),true));
}else {
if (isset($_GET['term'])) {
 $getCity = get_city($conn, $_GET['term']);
 $cityList = array();
 foreach($getCity as $city){
 $cityList[] = $city['body'];
 }
 echo json_encode($cityList);
}
}
?>