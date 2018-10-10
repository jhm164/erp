<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	
	 $("#myt").toggle();
	  $("h1").text('click see employee Details');
    $("h1").click(function(){
      $("h1").text('click Add employee Details');
        $("#tb2").toggle(2000);
          $("#myt").toggle(4000);
    });

    $("#click").click(function(){
var fname=$('#fname').val();
var lname=$('#lname').val();
var dob=$('#dob').val();
var address=$('#address').val();
//alert(fname+lname);
if (fname!=null&&lname!=null&&dob!=null&&address!=null) {
    $.ajax({url: "employee.php?fname="+fname+"&lname="+lname+"&dob="+dob+"&address="+address, success: function(result){
       $("#msg").append("<h3 style='color:green;'>Record created successfully</h3>");
    }});
}else{
	 $("#msg").append("<h3 style='color:red;'>unable to create record</h3>")
	 
}
});
});
</script>
</head>
<body>
	<form action="employee.php" method="GET" >
		<input type="submit" name="" value="sss">
	</form>
<h1 style="color: blue;text-decoration: underline; font-family:monospace;">customer Details</h1>
<table class="table " id="myt">
	<thead>
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Join</th>
		<th>DOB</th>
	</tr>
	</thead>
	<tbody>
		<?php
	
	$conn=mysqli_connect("localhost","root","","erp");
	if (!$conn) {
		echo mysql_error();
	}
	$sql="select * from employee";
	$result=mysqli_query($conn, $sql);
	?>
	<?php
	while ($row = mysqli_fetch_assoc($result)) 
	{
		?>
	    <tr>
				<td><?php echo $row['id'];?></td>
				<td style="font-size: 20px;"><?php echo $row['fame']." \t ".$row['lname'];?></td>
				<td><?php echo $row['date'];?></td>
				<td><?php
if(time()-strtotime($row['dob'])==0){
	echo time()-strtotime($row['dob']);
 echo "<p style='color:green;'>".$row['dob']."</p>";
}else{
	echo time()-strtotime($row['dob']);
	 echo $row['dob'];
}
				

				 ?></td>
		</tr>
	<?php
		}
			?>
		
	</tbody>

</table>

<table class="table" id="tb2">

<tbody>
	<form action="" id="myform">
	<tr>
	<td><p>first name</p></td>	<td><input type="text" name="fname" id="fname"></td>
	</tr>
	<tr>
	<td><p>last name</p></td>	<td><input type="text" name="lname" id="lname"></td>
	</tr>
	<tr>
	<td><p>Date of Birth</p></td>	<td><input type="date" name="date" id="dob"></td>
	</tr>
	<tr>
	<td><p>Address</p></td>	<td><input type="text" name="address" id="address"></td>
	</tr>
	<tr>
	<td><input type="reset" name="" value="clear"></td>	<td><input type="button"  id="click" name="" value="submit"></td>
	</tr>
	</form>
</tbody>
</table>

<?php
  if (isset($_GET['fname'])&&isset($_GET['lname'])&&isset($_GET['dob'])&&isset($_GET['address'])) {
    if ($_GET['fname']==null&&$_GET['lname']==null&&$_GET['dob']==null&&$_GET['address']==null) {
    	
    }else{
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $dob=$_GET['dob'];
    $address=$_GET['address'];
  $conn=mysqli_connect("localhost","root","","erp");
  if (!$conn) {
    echo mysql_error();
  }
  
  $sql = "INSERT INTO `erp`.`employee` (`id`, `fame`, `lname`, `date`, `dob`, `address`) VALUES (NULL,'$fname','$lname',now(),'$dob','$address')";
  if (mysqli_query($conn, $sql)) {
    echo "record created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}   
}
}
  ?>
  <div id="msg"></div>
</body>
</html>