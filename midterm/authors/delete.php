<?php
require '../quotes/csv_util.php';

if (!isset($_GET['index'])){
    die("Please enter the author you want to delete.");
}

deleteAuthor($_GET['index']);


//header('location: index.php');