<?php
require_once 'conn.php';
require_once 'output_functions.php';
require_once 'header.php';
outputgradethreescie1($_GET['article']);

g3sciecomments($_GET['article'],TRUE);
require_once 'footer.php';
?>
        