<?php
// simplecms
// sc-listposts.php

session_start();

include 'settings.php';
include 'sqlconnect.php';
define('TITLE', 'List of Posts');
include 'header.php';

?>

<div id="content">
<h1><?php echo TITLE; ?></h1>
<?php
$result = mysql_query("select * from posts ORDER BY id DESC");

while($row = mysql_fetch_assoc($result)) {
  echo '<a href="sc-showpost.php?id='.$row['id'].'">'.$row['title'].'</a>';
  if(isset($_SESSION['login'])) {
    echo ' <a href="sc-editpost.php?id='.$row['id'].'">(edit)</a>';
    echo ' <a href="sc-delpost.php?id='.$row['id'].'">(del)</a>';
  }
  echo '<br>';
}

?>
</div>

<?php
include 'footer.php';
?>
