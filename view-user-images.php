<?php
session_start();
$link=mysql_connect("localhost","root");
if(!$link){
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("my_db",$link);

$result = mysql_query("SELECT filepath FROM ".$_SESSION['user']."_images");
$count=0;
while($row = mysql_fetch_array($result))
  {
echo "<a href='".$row['filepath']."'>
<img src='".$row['filepath']."' width='100' height='71' border='0' />
</a>";
$count++;
if($count==5){
echo "<br />";
$count=0;
}
  }
/*
echo "<a href='user_images/testuser_images/ARXNOVENA300.jpg'>
<img src='user_images/testuser_images/ARXNOVENA300.jpg' width='100' height='71' border='0' />
</a>";
*/
mysql_close($link);
?>
<br />
<a href='main.php'>Back to Main Page</a>