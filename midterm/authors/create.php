<a href="index.php"> Go back to index</a>


<?php
if (count($_POST)>0){
    $error = '';

    if (file_exists('../data/authors.csv')){
        $fh = fopen('../data/authors.csv', 'r');
        while ($line=fgets($fh)){
            if ($_POST['name']==trim($line)){
            $error = 'The author already exists';
            }
        }
    }

    fclose($fh);


    if (strlen($error)>0) echo $error;
    else{
        $fh=fopen('../data/authors.csv', 'a');
        fputs($fh,$_POST['name'].PHP_EOL);
        fclose($fh);
        echo 'Thanks for adding '.$_POST['name'].' to our amazing website!';
    }

    print_r($_POST);
    $error = '';


    $fh = fopen('../data/authors.csv', 'r');
    while ($line=fgets($fh)){
        if ($_POST['name']==trim($line)){
            $error = 'The author already exists';
        }   
    }

    fclose($fh);


    if (strlen($error)>0) echo $error;
    else{
        $fh=fopen('../data/authors.csv', 'a');
        fputs($fh,$_POST['name'].PHP_EOL);
        fclose($fh);
    }
}
?>

<form method="POST">
    <input type="text" name="name" /><br />
    <button type="submit"> Add authors</button>
</form>