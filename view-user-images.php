<?php
session_start();
$link=mysqli_connect("localhost","root","","my_db");
if(!$link){
  die('Could not connect: ' . mysqli_error());
}


//mysql_select_db("my_db",$link);
$sql="SELECT * FROM ".$_SESSION['user']."_images";

$result = mysqli_query($link,$sql);
$count=0;
while($row = mysqli_fetch_array($result))
  {
//echo "<a href='".$row['filepath']."'>
echo "<a href='view-image-info.php?filename=".$row['filename']."'>
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
mysqli_close($link);
?>
<br />
<a href='main.php'>Back to Main Page</a>