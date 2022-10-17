<a href="quotes/create.php">Create a quote</a>
<a href="authors/index.php"> Manage Authors</a>
<a href="quotes/index.php">Manage Quotes</a>
<hr />
<h1>AUTHORS/QUOTES:</h1>
<hr>


<?php
require 'quotes/csv_util.php'; // NEED THIS TO RUN FUNCTIONS

$authors = readRecords('data/authors.csv'); //READS THE RECORDS TO THE $authors ARRAY
$quotes = readRecords('data/quotes.csv');   //READS THE RECORDS TO THE $quotes ARRAY

?>
<ul class="list-group">
<?php

//PRINTS OUT ALL THE AUTHORS AND QUOTES
for ($i = 0; $i < count($authors); $i++){
    
    echo '<h2>'.$authors[$i].'</h2>';

    for ($x = 0; $x < count($quotes); $x++){
        $breakLine = explode(';', $quotes[$x]);
        if ($breakLine[0] == $i){
            echo '<li class="list-group-item">'.$breakLine[1].'</a>(<a href="quotes/detail.php?index='.$x.'&author='.$i.'">Detail)</a>(<a href="quotes/delete.php?index='.$x.'">Delete)</a></li>';
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
                echo '<li class="list-group-item">'.$quotes[$x].'</a> (<a href="quotes/detail.php?index='.$x.'">Detail)</a>(<a href="quotes/delete.php?index='.$x.'">Delete)</a></li>';
            }

        }
    }
