<?php
// simplecms
// sc-login.php

include 'settings.php';
include 'sqlconnect.php';

// must set session before <html> tag
if($_SERVER['REQUEST_METHOD'] == "POST")
  handle_session();
else if($_GET['logout'])
  do_logout();
else
  display_form();

function handle_session() {
  global $admin_user,$admin_pass;
  if(($_POST['user'] == $admin_user) && ($_POST['pass'] == $admin_pass)) {
    session_start();
    $_SESSION['login'] = 1;
    include 'settings.php';
    include 'header.php';
    echo '<div id="content">Login succeeded!';
  }
  else {
    define('TITLE', 'Login');
    include 'header.php';
    echo '<div id="content">Login failed.';
  }
}

function display_form() {
  include 'settings.php';
  define('TITLE', 'Login');
  include 'header.php';
  if(isset($_SESSION['login']))
    echo "<div id=\"content\">You are already logged in!";
  else 
    echo <<<DISPLAYFORM
    <div id="content">
    <h1>Login</h1>
    <form action="sc-login.php" method="post">
    <b>Username:</b>
    <input type="text" size="20" maxlength="50" name="user">
    <br><br><b>Password:</b>
    <input type="password" size="20" maxlength="50" name="pass">
    <br><br><input type="submit" value="submit" name="submit">
    </form>
DISPLAYFORM;
}

function do_logout() {
  session_start();
  $_SESSION['login'] = NULL;
  include 'settings.php';
  define('TITLE', 'Login');
  include 'header.php';
  echo '<div id="content">Logout succeeded!';
}

?>

</div>

<?php
include 'footer.php';
?>

