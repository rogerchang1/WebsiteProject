

<?php
session_start();

$link = mysqli_connect("localhost","root","","my_db");

if(!$link){
	die('Could not connect: ' . mysqli_error());
}

$filename = $_GET["filename"];

if(!ISSET($_GET["username"]))
	$sql = "SELECT * FROM ".$_SESSION['user']."_images WHERE filename='".$filename."'";
else
	$sql = "SELECT * FROM ".$_GET["username"]."_images WHERE filename='".$filename."'";



$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
	//echo $row['filepath'];
	echo "<a href='".$row['filepath']."'>";
	echo "<img src='".$row['filepath']."' width='100' height='71' border='0' />";
	echo "</a> <br />";
	echo "File Name: " . $row['filename'] . "<br />";
	echo "File Type: " . $row['filetype'] . "<br />";
	echo "File Size: " . $row['filesize']. " Kb<br />";
}

//echo $filename;

mysqli_close($link);

if(!ISSET($_GET["username"]))
	echo "<a href='view-user-images.php'>Back to your images</a>";
else
	echo "<a href='view-user-images.php?username=".$_GET['username']."'>Back to your images</a>";
?>
