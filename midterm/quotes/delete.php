<?php
require 'csv_util.php';
deleteQuote($_GET['index']);
header('location: ../index.php');
?>