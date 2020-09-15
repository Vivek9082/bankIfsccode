<?php
	include("connection.php");
	include("brand.php");

	$branch_id = mysqli_real_escape_string($conn, str_replace('-', ' ', $_GET['branch_id']));
	$bank_name = str_replace('-', ' ', mysqli_real_escape_string($conn, $_GET['bank_name']));

	$result = mysqli_query($conn, "SET NAMES utf8mb4");
	$result = mysqli_query($conn, "SELECT * FROM data WHERE md5(id)='$branch_id'");
	$run = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$title = "$run[name] $run[adr1] IFSC Code, MICR, Contact Number, Address";
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
<table>
	<tr><th>Bank Name</th> <td style='font-weight: bold;'><a href='./branches.php?bank_name=<?php echo str_replace(' ', '-', $run['name']); ?>'><?php echo $run['name']; ?></a></td></tr>
	<tr><th>IFSC Code</th> <td style='font-weight: bold; text-decoration: underline;'><?php echo $run['ifsc']; ?></td></tr>
	<tr><th>MICR Code</th> <td><?php echo $run['micr']; ?></td></tr>
	<tr><th>Contact</th> <td><?php echo $run['contact']; ?></td></tr>
	<tr><th>Adress 1</th> <td><textarea style='width:200px; height: 150px; resize: none;'><?php echo "$run[adr1],\n$run[adr2],\n$run[adr3],\n$run[adr4],\n$run[adr5]"; ?></textarea></td></tr>
</table>

</div>
<?php include("./footer.php"); ?>
</body>