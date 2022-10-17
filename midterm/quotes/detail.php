<?php
include 'csv_util.php';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.php">Authors & Quotes Index</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="delete.php?index=<?= $_GET['index']?>">Delete<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="modify.php?index=<?= $_GET['index'].'&author='.$_GET['author']?>">Modify</a>
      </li>
</nav>





<hr>
<hr>
<?php
$quote = explode(';', getRecord('../data/quotes.csv', $_GET['index']));    //GRABS THE QUOTE
$author = getRecord('../data/authors.csv', $_GET['author']);    //GRABS THE AUTHOR
?>
</div>


<div>

<h3>Author: <?php echo $author?></h3>
<hr>
<p>Quote:<?php echo $quote[1]?><p>
</div>
