<?php
	include("brand.php");
	include("connection.php");
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/css/colors.css">
		<link rel="stylesheet" type="text/css" href="/css/main.css">
		<title><?php echo $blog_name; ?> - Bank IFSC, MICR Codes, Contact NUmber, Address</title>
	</head>
	<body>
	<?php include("./header.php"); ?>
<div class="box">
<?php

$result = mysqli_query($conn, "SET NAMES utf8mb4");
$result = mysqli_query($conn, "SELECT * FROM bank_names");
while ($run = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo "<li><a href='/branches.php?bank_name=".str_replace(' ', '-', $run['name'])."&bank_id=".md5($run['id'])."'>".$run['name']."</a></li>";
}
?>
</div>
<?php include("./footer.php"); ?>
</body>