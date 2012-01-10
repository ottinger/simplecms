<?php
// simplecms 
// header.php

session_start();
?>
<html>
<head><link rel="stylesheet" href="style.css" type="text/css" />
<title><?php if(defined('TITLE'))
               print $site_name." - ".TITLE;
             else
               print $site_name; ?></title>
</head>
<body>
<div id="topbar">
<font size="30px"><?php echo $site_name; ?></font>
<div id="menu">
<table border="0" cellpadding="5">
<tr>
<td><a href="sc-listposts.php">Index</a></td>
<?php
// display extra links if logged in
if(isset($_SESSION['login'])) {
  echo <<<LINKS
  <td><a href="sc-submitpost.php">Add Post</a></td>
  <td><a href="sc-login.php?logout=1">Logout</a></td>
LINKS;
} 

?>
</tr></table>

</div>
</div>
