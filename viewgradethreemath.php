<?php
require_once 'conn.php';
require_once 'output_functions.php';
require_once 'header.php';
outputgradethreemath1($_GET['article']);

g3mathcomments($_GET['article'],TRUE);
require_once 'footer.php';
?>
        