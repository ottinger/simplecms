<?php
// simplecms
// sc-editpost.php

include 'settings.php';
include 'sqlconnect.php';
define('TITLE', 'Delete Post');
include 'header.php';

$id = $_GET['id'];
?>

<div id="content">
<?php
del_post();

function del_post() {
  global $id;
  if(!isset($_SESSION['login'])) {
    echo "ERROR: You are not logged in!";
    return;
  }
  if(!$id)
    echo 'ERROR: no post id given';
  else {
    $q = mysql_query("DELETE FROM posts WHERE id = ".$id);
    if(!$q)
      echo "Deletion failed.";
    else
      echo "Deletion succeeded."; 
  }
}
?>
</div>

<?php
include 'footer.php';
?>
