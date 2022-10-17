<?php
require '../quotes/csv_util.php';

$author = getRecord('../data/authors.csv', $_GET['index']); 
$quotes = readRecords('../data/quotes.csv'); ?>



<a href="index.php">Go back to index</a><br />
<a href="delete.php?index=<?=$_GET['index']?>">Delete</a>
<a href="modify.php?index=<?=$_GET['index']?>">Modify</a>
<hr>
<h3>Author:<br><?php echo $author?></h3>
<hr>



<h3>Quotes:<br></h3>

<?php
for ($x = 0; $x < count($quotes); $x++){
    $temp = $quotes[$x];
    $check = explode(';',$temp);
    $value = $check[0];
    $line = $check[1];
    if ($value == $_GET['index']){
        echo $line;
        echo '<br><hr>';
    }
}



