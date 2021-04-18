<?php
require_once 'conn.php';
require_once 'output_functions.php';
require_once 'header.php';
outputgradeonescie1($_GET['article']);

g1sciecomments($_GET['article'],TRUE);
require_once 'footer.php';
?>
        