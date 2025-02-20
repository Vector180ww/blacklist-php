<?php
include('../db_connection.php');

// Перенаправляем на main.php
header('Content-Type: text/html');
readfile('../main.php');
?>