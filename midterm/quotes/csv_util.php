<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php

//one function for reading the content of a CSV-formatted file into a PHP array (with all the records)
function readRecords($fileName){
    $myArray = [];
    $i = 0;
    if (file_exists($fileName)){
        $fh = fopen($fileName, 'r');
        while ($line = fgets($fh)){
            if (strlen($line)>0){
                $myArray[$i] = $line;
            }
            $i++;
        }
    }
    else{
        return 'The File does not exist!';
    }
    fclose($fh);
    return $myArray;
}

//one function for reading the content of a CSV-formatted file into a PHP array and returning one element with index $element (i.e., only one record )
function getRecord($fileName, $index){
    if (file_exists($fileName)){
        $fh = fopen($fileName, 'r');
        $line_counter = 0;
        while($line = fgets($fh)){
            if ($line_counter == $index){
                return $line;
            }
            $line_counter++;
        }
    }
}





//CHANDLER THIS NEEDS TO CHECK IF FILE EXISTS
//one function for emptying the record on a specific line (delete the content of a line, but leave an empty line  in the file)
function deleteQuote($index){
    $line_counter = 0;
    $new_file_content = '';

    $fh = fopen('../data/quotes.csv', 'r');
    while ($line = fgets($fh)){
        if ($line_counter == $index){
            $new_file_content.=PHP_EOL;
        }
        else{
            $new_file_content.=$line;
        }
        $line_counter++;
    }
    fclose($fh);
    file_put_contents('../data/quotes.csv', $new_file_content);
}



//one function for modifying the record on a specific line
function modifyQuote($index, $quote){
    if (strlen($quote)>0){
        if (!isset($index)){
            die('Please enter the quote you want to delete');
        }
        if (file_exists('../data/quotes.csv')){
            $line_counter = 0;
            $new_file_content = '';
            $fh = fopen('../data/quotes.csv', 'r');
            while ($line = fgets($fh)){
                if ($line_counter == $index){
                    $substring = explode(';', $line);
                    $new_file_content .= $substring[0].';';
                    $new_file_content.= $quote.PHP_EOL;
                }
                else{
                    $new_file_content.= $line; 
                }
                $line_counter++;
            }
        }
        fclose($fh);
        file_put_contents('../data/quotes.csv', $new_file_content);
        echo 'You have succesfully modified the quote!';
    }
    else{
        $quote_name = '';
        $line_counter = 0;
        $fh = fopen('../data/quotes.csv', 'r');

        while ($line = fgets($fh)){
            if ($line_counter == $index){
                $quote_name = trim($line);
            }
            $line_counter++;
        }
        fclose($fh);
    }
}


function deleteAuthorsQuotes($index){
    $quotes = readRecords('../data/quotes.csv');    //CONTAINS QUOTES
    for ($i = 0; $i < count($quotes); $i++){
        $line = $quotes[$i];
        $substring = explode(';', $line);
        if ($substring[0] == $index){
            $quotes[$i] = "";
        }
    }    
    if ($fh = fopen('../data/quotes.csv', 'w')){
            foreach($quotes as $quote){
                fputs($fh, $quote);
            }
        }
        fclose($fh);
    }
    




    
    


