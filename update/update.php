<?php
$conn=mysqli_connect("localhost","root","","erp");

if (!$conn) {
	echo mysql_error();
}
if (isset($_GET['value1'])&&isset($_GET['id'])) {
	$id=$_GET['id'];
	$status=$_GET['value1'];
$sql = "UPDATE `erp`.`projects` SET `status` = $status WHERE `projects`.`id` =$id ";

if (mysqli_query($conn,$sql)) {
echo "success";	
}
}
?>