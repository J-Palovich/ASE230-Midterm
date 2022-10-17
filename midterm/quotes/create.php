<?php 
require 'csv_util.php';

$authors = readRecords('../data/authors.csv');
?>
<a href="index.php">Index Page</a>
<hr />


<select class="form-select" aria-label="Default select example">
  <option selected><?php echo 'Please choose an author: '?></option>
    
    
        <?php
        // A sample product array
         require_once 'csv_util.php';

      $authors_name=readRecords('../data/authors.csv');
        // Iterating through the product array
        foreach($authors_name as $item){
            echo "<option value='strtolower($item)'>$item</option>";
        }

        ?>

</select>

<form action="" method="POST">
    <label> Enter a quote you like:</label>
    <br>
    <input type="text" name="quote" id="authors_name" /><br />
    <button type="submit" name="submit" id="authors_name"> Add Quote</button>
</form>

<?php


if(count($_POST)>0) {

    $error='';
    //make sure the name isnt in the file 
    if(file_exists('data/quotes.csv')){
        
        $fh=fopen('../data/quotes.csv','r');
        while($line=fgets($fh)) {
            if($_POST['quote']==trim($line)) {
                //found the name already
                $error='the quote already exists';
            }
        }

        fclose($fh);
    }


//add the name to the csv file

    if(strlen($error)>0) echo $error;
    else{
        $fh = fopen("../data/quotes.csv", "a");
        fputs($fh, "\n".$_POST['quote']);
        fclose($fh);
        echo('Thanks for adding "' .$_POST['quote']. '" to our amazing website!');
    }
}

?>

<br>
<br>