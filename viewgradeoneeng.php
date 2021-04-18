<?php
require_once 'conn.php';
require_once 'output_functions.php';
require_once 'header.php';
outputgradeoneeng1($_GET['article']);

g1engcomments($_GET['article'],TRUE);
require_once 'footer.php';
?>
        