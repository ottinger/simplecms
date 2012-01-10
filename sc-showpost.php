<?php
include 'settings.php';
include 'sqlconnect.php';

$id = $_GET['id'];
$result = mysql_query("select * from posts where id = ".$id);
$row = mysql_fetch_assoc($result);
define('TITLE', $row['title']);

include 'header.php';

echo '<div id="content">';
echo '<h1>';
print_title();
echo '</h1>';

echo '<p>';
print_content();
echo '</p>';

echo '</div>';

include 'footer.php';

function print_content() {
  $id = $_GET['id'];
  $result = mysql_query("select * from posts where id = ".$id);

  $row = mysql_fetch_assoc($result);
  echo nl2br($row['content']);
}

function print_title() {
  $id = $_GET['id'];
  $result = mysql_query("select * from posts where id = ".$id);

  $row = mysql_fetch_assoc($result);
  echo $row['title'];
}

?>
