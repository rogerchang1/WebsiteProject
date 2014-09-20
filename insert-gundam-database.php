<?php
$link = mysql_connect("localhost","root");
if(!$link){
	die('Could not connect: '.mysql_error());
}

mysql_select_db("my_db",$link);
$create = "CREATE TABLE gundams
(gundamID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(gundamID),
name varchar(15),
pilot varchar(15),
affiliation varchar(15))";

if(mysql_query($create,$link))
	echo "table created";
else
	echo "table already created: ".mysql_error()."<br />";
	
$sql="INSERT INTO gundams (name, pilot, affiliation) 
VALUES ('$_POST[name]', '$_POST[pilot]', '$_POST[affiliation]')";
 if (!mysql_query($sql,$link))
  {
  die('Error: ' . mysql_error());
  }
$result = mysql_query("SELECT * FROM gundams");
echo "Gundams Database:<br />";
while($row = mysql_fetch_array($result))
 {
 echo "<ul>";
 echo "<li>".$row['name'] . " " . $row['pilot']." ".$row['affiliation']."</li>";
 echo "</ul>";
 }

echo "1 record added: ".$_POST["name"] . " " . $_POST["pilot"]." ".$_POST["affiliation"];
mysql_close($link);
?>