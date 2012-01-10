<?php
// simplecms
// sc-editpost.php

include 'settings.php';
include 'sqlconnect.php';
define('TITLE', 'Edit Post');
include 'header.php';

$title = $_POST['title'];
$content = $_POST['content'];
$id = $_POST['id'];
?>

<div id="content">
<?php

if($title)
  edit_post();
else
  display_form();

function display_form() {
  if(!isset($_SESSION['login'])) {
    echo "ERROR: You are not logged in!";
    return;
  }
  else if(!$_GET['id']) {
    echo "ERROR: No post ID given!";
    return;
  }

  include 'sqlconnect.php';
  $result = mysql_query("select * from posts where id = ".$_GET['id']);
  $row = mysql_fetch_assoc($result);
  $id = $row['id'];
  $title = $row['title'];
  $content = $row['content'];
  $displayform = <<<DISPLAYFORM
    <h1>Edit Post</h1>
    <form action="sc-editpost.php" method="post">
    <input type="hidden" name="id" value="$id">
    <b>Post Title: </b>
    <input type="text" size="40" maxlength="200" name="title" value="$title">
    <br><br>
    <b>Post Content: </b><br>
    <textarea rows="20" cols="60" name="content">$content</textarea><br><br>
    <input type="submit" value="submit" name="submit">
    </form>
DISPLAYFORM;
  echo $displayform;
}

function edit_post() {
  global $title, $content, $id;
  if(!isset($_SESSION['login'])) {
    echo "ERROR: You are not logged in!";
    return;
  }
  if(!$title || !$content)
    echo 'ERROR: no title or content';
  else {
    $q = mysql_query("UPDATE posts SET title = '".$title."', content = '".$content."' where id = ".$id);
    if(!$q)
      echo "Submit failed.";
    else
      echo "Submit succeeded."; 
  }
}
?>
</div>

<?php
include 'footer.php';
?>
