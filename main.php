<?="Hello PHP<br />"?>

<?php
session_start();


if(isset($_SESSION['user'])){
setcookie("user",$_SESSION['user'],time()+3600);
echo "Welcome " . $_SESSION["user"] . " userid is ".$_SESSION['userid']."!<br />";
	if(isset($_SESSION["views"]))
		$_SESSION["views"]++;
	else
		$_SESSION["views"]=1;
	echo "Pageviews: ".$_SESSION["views"]." <br /><a href='sign-in.php'>Sign Out</a><br /><br />";
}else{
echo "Welcome guest!<br />";
?>
Sign in: <br />
<form method="post" action="sign-in.php">
<label>Username: </label>
<input type="text" name="username">
<br />
<label>Password: </label>
<input type="password" name="password">
<br />
<input type="submit" value= "Submit" name="submit">
</form>
<?php
echo "<a href='register.php'>Click to Register</a>";
}
?>

<html>

<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>

$(document).ready(function(){

	$('#create-folder').click(function(){
		createDir();
	});
});

	function createDir(){
	alert("in here");
		$.getJSON('test.php',{limit : 0},function(result){
			$.each(result, function(i) {
				$('#create-folder').append(result[i]);
			});
		});
	}

</script>
</head>



<body>

<?php
if(isset($_SESSION['user'])){
	include 'upload-image-form.php';
	echo "<a href='view-user-images.php'>View Image Database</a><br />";
	echo "<a href='view-users.php'>View Users</a><br />";
}
/*$age = array("b"=>1,"a"=>2);
echo $age["b"];
$age["c"]=3;
echo $age["c"];
foreach ($age as $value){
	echo $value;
}*/
?>

<!--
<h4>TEST-------------------------------------------------------------------------------------------------------------------------------------------------------</h4><br />
<div id="database">
<h4>Add a Persons database entry!<br /></h4>
<form action="insert-database.php" method="post">
<label>First Name:</label>
<input type="text" name="firstname"/>
<br />
<label>Last Name:</label>
<input type="text" name="lastname"/>
<br />
<label>Age:</label>
<input type="text" name="age"/>
<input type="submit"/>
</form>
</div>

<div id="database">
<h4>Add a Gundam database entry!<br /></h4>
<form action="insert-gundam-database.php" method="post">
<label>Name:</label>
<input type="text" name="name">
<br />
<label>Pilot:</label>
<input type="text" name="pilot">
<br />
<label>Affiliation:</label>
<input type="text" name="affiliation">
<br />
<input type="submit"/>
</form>
</div>

<div id="database-view">
<h4>View Persons database!<br /></h4>
<a href='view-database.php'>View.</a><br />
</div>

<div id="upload">
<h4>Upload a File! <br /></h4>
<form action="upload-file.php" method="post" enctype="multipart/form-data">
<label>Filename:</label>
<input type="file" name="file" id="file"/>
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</div>

<div id="mail-form">
<h4>Mail Form!</h4>
<form action="mail-form.php" method="post">
<label>Email:</label>
<input type="text" name="email" id="email-address"/>
<br />
<label>Subject:</label>
<input type="text" name="subject" id="subject" />
<br />
<label>Message:<br /></label>
<textarea name="message" id="message" rows="15" cols="40"></textarea>
<br />
<input type="submit" name="email-submit">
</form>
</div>

<div id='create-folder'>
<p>create a folder test</p>
</div>


<h4>END TEST-------------------------------------------------------------------------------------------------------------------------------------------------------</h4><br />
-->
</body>

</html>