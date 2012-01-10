<?php
// simplecms
// sclistposts.php

include 'settings.php';
include 'sqlconnect.php';
define('TITLE', 'Submit Post');
include 'header.php';

$title = $_POST['title'];
$content = $_POST['content'];
?>

<div id="content">
<?php

if($title)
  add_post();
else
  display_form();

function display_form() {
  if(!isset($_SESSION['login'])) {
    echo "ERROR: You are not logged in!";
    return;
  }
  echo <<<DISPLAYFORM
    <h1>Submit Post</h1>
    <form action="sc-submitpost.php" method="post">
    <b>Post Title: </b>
    <input type="text" size="40" maxlength="200" name="title"><br><br>
    <b>Post Content: </b><br>
    <textarea rows="20" cols="60" name="content"></textarea><br><br>
    <input type="submit" value="submit" name="submit">
    </form>
DISPLAYFORM;
}

function add_post() {
  global $title, $content;
  if(!isset($_SESSION['login'])) {
    echo "ERROR: You are not logged in!";
    return;
  }
  if(!$title || !$content)
    echo 'ERROR: no title or content';
  else {
    $q = mysql_query("INSERT INTO posts (title, content) VALUES ('".$title."', '".$content."')");
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
