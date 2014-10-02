<?PHP
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
echo "<h4>Recent images uploaded:</h4><br />";
$link=mysqli_connect("localhost","root","","my_db");

$sql = "SELECT i.filepath,i.filename,ua.username	 FROM images i, userimages ui, user_accounts ua WHERE i.imageid=ui.imageid AND ua.user_id=ui.userid ORDER BY i.date DESC LIMIT 20";

$result = mysqli_query($link,$sql);
$count=0;
while($row = mysqli_fetch_array($result)){
	echo "<a href='view-image-info.php?filename=".$row['filename']."&username=".$row["username"]."'>";
	echo "<img src='".$row['filepath']."' width='100' height='71' border='0' />";
	echo "</a>";
	$count++;
	if($count==5) echo "<br />";
}
mysqli_close($link);




?>