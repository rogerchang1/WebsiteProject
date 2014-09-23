<?php
session_start();
echo $_SESSION['user'];
if ($_FILES["file"]["error"] > 0){
	echo "Error: " . $_FILES["file"]["error"] . "<br />";
}else{
	$fileName = $_FILES['file']['name'];
	$tmpName  = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size']/1024;
	$fileType = $_FILES['file']['type'];
	$uploadDir = "user_images/".$_SESSION['user']."_images/";
	echo "<br />upload dir: ".$uploadDir."<br />";
	$filePath = $uploadDir.$fileName;
	echo "<br />filepath: ".$filePath."<br />";
	if(!get_magic_quotes_gpc()){
		$fileName = addslashes($fileName);
		$filePath = addslashes($filePath);
	}
	echo "Upload: " . $fileName . "<br />";
	echo "Type: " . $fileType . "<br />";
	echo "Size: " . $fileSize. " Kb<br />";
	echo "Stored in: " . $tmpName;
	echo "<br />";
	$imageData = getimagesize($tmpName);
	echo "<br />filepath: ".$filePath."<br />";
    if($imageData === FALSE || !($imageData[2] == IMAGETYPE_GIF || $imageData[2] == IMAGETYPE_JPEG || $imageData[2] == IMAGETYPE_PNG)) {
		echo "Error: File is not an image";
    }else{
		echo "<br />";
		if (file_exists($filePath)){
			echo $fileName . " already exists. ";
		}else{
			$link = mysqli_connect("localhost","root","","my_db");
			if (!$link){
			  die('Could not connect: ' . mysqli_error());
			}

		//	mysql_select_db("my_db",$link);
			$sql="INSERT INTO ".$_SESSION['user']."_images (filename, filesize, filetype,filepath) 
			VALUES ('".$fileName."', '".$fileSize."', '".$fileType."','".$filePath."')";

			  if (!mysqli_query($link,$sql))
			  {
			  die('Error: ' . mysqli_error());
			  }

			move_uploaded_file($tmpName,$filePath);
			echo "Stored in: " . $filePath;
			mysqli_close($link);
		}
	}
}  
?>
<br />
<a href='main.php'>Back to Main Page</a>