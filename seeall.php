<!DOCTYPE html>
<html>
<head>
	<title>Erp software</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#show').hide();


	v=parseInt(<?php if(isset($_GET['cat'])){echo $_GET['cat'];}else{echo "0";}?>);
	var l=v;

if (l!=0) {
$('#here').hide(2000);
$('#show').show();
}else{

$('#here').show();
$('#show').hide();
 }

$("#update").click(function(){
	var id=$("#id").val();
	var value1=$("#value1").val();
	alert(id+value1);
if (id!=null&&value1!=null) {
    $.ajax({url: "update/update.php?id="+id+"&value1="+value1, success: function(result){
        alert('success');
    }});
}

});

  	});

  </script>
</head>
<body class="container-fluid">




	<div id="here">


<div class="panel panel-default">
    <div class="panel-heading">
    


<table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Lastname</th>
        <th>see more</th>
      </tr>
    </thead>
</div>
<div class="panel-body">

    <tbody>
      <tr>
<?php

	$conn=mysqli_connect("localhost","root","","erp");
	if (!$conn) {
		echo mysql_error();
	}
	$sql="select * from projects";
	$result=mysqli_query($conn, $sql);
	
	while ($row = mysqli_fetch_assoc($result)) {

?>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo "<a href='seeall.php?cat=".$row['id']."'>see more</a>"?> </td>
        
      </tr>
  <?php
  	}
?>   
    </tbody>
</div>
  </table>
</div>



 </div>
</div>

<div class="row">
<div id="show" class="col-lg-6" style="background-color: skyblue;">
	<h3><a href="seeall.php">Back</a></h3>
	<table class="table table-hover">
    <thead>
      <tr>
        <th>description</th>
        <th>cost</th>
      </tr>
    </thead>
      

    <tbody>
     
	<?php

if (isset($_GET['cat'])) {


	$conn1=mysqli_connect("localhost","root","","erp");
	if (!$conn1) {
		echo mysql_error();
	}
	$sql1="select * from runningpro where pid=".$_GET['cat'];
	$result1=mysqli_query($conn1, $sql1);
	while ($row = mysqli_fetch_assoc($result1)) {
?> <tr>
<td><?php echo $row['pid']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['cost']; ?></td>
        <?php echo "<input type='hidden' id='id' value='".$row['id']."'"?>
      </tr>
<?php
	}
}else
{
echo "<tr><td>".$row['cost']."</td></tr>";
}
	?>
</tbody>

</table>
</div>

<div class="col-lg-6" style="background-color: skyblue;">
	 <h3>update progress</h3>
<table class="table">
	<thead><tr><td>update progress</td></tr></thead>
	<tbody><tr><td><input type="text" class="form-control" name="" id="value1"></td><td><input type="button" class="btn btn-default" value="Update" name="" id="update"> </td></tr></tbody>

</table>

<div class="progress" >
 
  <?php
  if (isset($_GET['cat'])) {
$conn=mysqli_connect("localhost","root","","erp");
if (!$conn) {
	echo mysql_error();
}

$sql="select * from projects where id=".$_GET['cat'];
$result=mysqli_query($conn,$sql);

	while($row=mysqli_fetch_assoc($result)){
	
?>
  <div class="progress-bar" id="progressbar" role="progressbar" 
  aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row['status']."%"; ?>" >
  <?php echo $row['status']."%"; ?> completed  </div>
<input type="hidden" name="">
  <script type="text/javascript">
  	$(document).ready(function(){

  		var p=<?php echo $row['status']; ?>;
if (p<20) {
$("#progressbar").addClass("progress-bar-danger");
}else if (p>=20&&p<50) {
	$("#progressbar").addClass("progress-bar-warning");
}else if (p>=50&&p<75) {
	$("#progressbar").addClass("progress-bar-info");
}else if (p>=75&&p<=100) {
	$("#progressbar").addClass("progress-bar-success");
}




  	});

  </script>
  <?php

	}

}else{

}
?>
</div>
</div>
</div>
</body>
</html>