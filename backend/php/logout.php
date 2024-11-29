<?php
session_start();

session_unset();
session_destroy();

header("Location: http://localhost/eu4_parodie/frontend/html/index.html");
exit;
?>
