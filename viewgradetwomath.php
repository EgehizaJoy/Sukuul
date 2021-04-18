<?php
require_once 'conn.php';
require_once 'output_functions.php';
require_once 'header.php';
outputgradetwomath1($_GET['article']);

g2mathcomments($_GET['article'],TRUE);
require_once 'footer.php';
?>
        