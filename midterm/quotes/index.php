<a href="create.php">Create a quote</a>
<a href="../authors/index.php"> Manage Authors</a>
<a href="../index.php">View Authors & Quotes</a>
<hr />
<h1>Quotes:</h1>
<hr>


<?php
require 'csv_util.php'; // NEED THIS TO RUN FUNCTIONS

$authors = readRecords('../data/authors.csv');
$quotes = readRecords('../data/quotes.csv');   //READS THE RECORDS TO THE $quotes ARRAY

?>
<ul class="list-group">
<?php



//PRINTS OUT ALL THE QUOTES
for ($i = 0; $i < count($authors); $i++){
    for ($x = 0; $x < count($quotes); $x++){
        $breakLine = explode(';', $quotes[$x]);
        if ($breakLine[0] == $i){
            echo '<li class="list-group-item">'.$breakLine[1].'</a>(<a href="detail.php?index='.$x.'&author='.$i.'">Detail)</a>(<a href="delete.php?index='.$x.'">Delete)</a></li>';
        }
    }
}
?>
</ul>
<h2>Anonymous Quotes<h2>
<?php
    for ($x = 0; $x < count($quotes); $x++){
        if (trim($quotes[$x])>0){
            if (str_contains($quotes[$x], ';') == false){
                echo '<li class="list-group-item">'.$quotes[$x].'</a> (<a href="detail.php?index='.$x.'">Detail)</a>(<a href="delete.php?index='.$x.'">Delete)</a></li>';
            }

        }
    }






   

