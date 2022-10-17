<?php
require '../quotes/csv_util.php'; // NEED THIS TO RUN FUNCTIONS
?>
<a href="create.php">Add a new author</a>
<a href="../quotes/index.php">Manage Quotes</a>
<a href="../index.php">View Authors & Quotes</a>
<hr />

<?php
$authors = readRecords('../data/authors.csv');

$index = 0;
for ($i = 0; $i < count($authors); $i++){
    if ($authors[$i] > 0){
        echo '<h3>'.$authors[$i].'</h3>'.'<a href="detail.php?index='.$i.'">(Detail)</a>(<a href="delete.php?index='.$i.'">Delete</a>)</h1>';
        echo '<br>';
        
    }
    
}

