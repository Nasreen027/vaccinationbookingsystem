
<?php
include_once('models/config.php');
session_start();
session_unset();
session_destroy();
redirectWindow('index.php');
?>
