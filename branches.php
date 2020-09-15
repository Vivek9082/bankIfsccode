<?php
include("connection.php");
include("brand.php");
$bank_name = str_replace('-', ' ', mysqli_real_escape_string($conn, $_GET['bank_name']));
$title = $bank_name . " IFSC, MICR, Contact Number, Address";
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/css/colors.css">
		<link rel="stylesheet" type="text/css" href="/css/main.css">
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php include("./header.php"); ?>
<div class="box">

	<h2><?php echo $title; ?></h2>

<?php

$result = mysqli_query($conn, "SET NAMES utf8mb4");
$result = mysqli_query($conn, "SELECT * FROM data WHERE name='$bank_name' ORDER BY id DESC");
while ($run = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo "<li><a href='/branch.php?branch_name=".str_replace(' ', '-', $run['adr1'])."&bank_name=".str_replace(' ', '-', $run['name'])."&branch_id=".md5($run['id'])."'>".$run['adr1']."</a></li>";
}
?>
</div>
<?php include("./footer.php"); ?>
</body>