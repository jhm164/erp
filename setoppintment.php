<!DOCTYPE html>
<html>
<head>
	<title></title>

	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
</head>
<body class="container-fluid">
	<a href="main.php"><h2><span class="glyphicon glyphicon-circle-arrow-left"/>Back</h2></a>
	<?php
	
	$conn=mysqli_connect("localhost","root","","erp");
	if (!$conn) {
		echo mysql_error();
	}
	$sql="select * from oppintmets";
	$result=mysqli_query($conn, $sql);
	?>
<table class="table table-hover">
	<thead>
	<tr><th>sr</th>
<th>Description</th>
<th>date of oppointment</th>
<th>Days Left</th>
<th>Status</th>
<th>delete</th>
</tr>

</thead>
<tbody>
	<?php
	while ($row = mysqli_fetch_assoc($result)) 
	{
		?>
		<tr><td><?php echo $row['id'];?></td>
<td><?php echo $row['details'];?></td>
<td><?php echo $row['date'];?></td>
    <?php
    $datediff=strtotime($row['date'])-time();
			$res= $datediff/(60*60*24);
		//	echo $res.'\r';
			?>
			
			<?php
			if ($res<=0) {
			//	echo "miss/n";
				?>
				<td><?php echo "0";?></td>
				<td style="color: red;"><?php echo "missed";?></td>
<td><a href="setoppintment.php?delete=<?php echo $row['id']; ?>">delete</a></td>
			</tr>
				<?php
			}else if ($res>=0&&$res<=2) {
			//	echo "comming/n";
				?>
				<td><?php echo (int)$res;?></td>
				<td style="color: green;"><?php echo "very soon";?></td>
<td><a href="setoppintment.php?delete=<?php echo $row['id']; ?>">delete</a></td>
			</tr>
				<?php
			}else{
			//	echo "futuer";
				?>
				<td><?php echo (int)$res;?></td>
				<td><?php echo "comming";?></td>
			<td><a href="setoppintment.php?delete=<?php echo $row['id']; ?>">delete</a></td>
		</tr>
				<?php
			}
		           }
     
	?>

<?php
if (isset($_GET['delete'])) {
	$d=$_GET['delete'];
$conn=mysqli_connect("localhost","root","","erp");
	if (!$conn) {
		echo mysql_error();
	}
	$sql="delete from oppintmets where id=$d";
	if(mysqli_query($conn,$sql)){
		echo "<h1>deleted</h3>";
	}

}
?>
	</tbody>
	</table>
</body>
</html>