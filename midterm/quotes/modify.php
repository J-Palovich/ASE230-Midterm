<a href="../index.php">Authors & Quotes Index Page</a>
<a class="nav-link" href="detail.php?index=<?= $_GET['index'].'&author='.$_GET['author']?>">Detail</a>
<br>
<br>
<?php

require 'csv_util.php';



if (count($_POST)>0){
    modifyQuote($_GET['index'], $_POST['quote']);
}
?>
    <form method="POST">
    Please enter a quote<br/>
    <input type="text" name="quote" value="..." /><br />
    <button type="submit" >Modify Quote</button>
    </form>





