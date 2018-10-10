<!DOCTYPE html>
<html>
<head>
	<title>my projects</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
$("#Employee").click(function(){
$('#div1').load('Employee.php');
});
	$(document).ready(function(){
$("#seeall").click(function(){
$('#div1').load('seeall.php');
});


$("#submit").click(function(){

var name=$("#name").val();
var startd=$("#date").val();
var description=$("#description").val();
var end=$("#end").val();
var budget=$("#budget").val();
alert(name+startd+description+end+budget);
if (date!=null&&description!=null) {
    $.ajax({url: "projects.php?name="+name+"&date="+startd+"&description="+description+"&end="+end+"&budget="+budget, success: function(result){
      //  $("#msg").html(result);
    }});
}

});

 	});
 </script>
</head>

<body class="container">
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Projects</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active" id="Employee"><a href="#">Home</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
    </ul>
    <button class="btn btn-danger navbar-btn">Button</button>
  </div>
</nav>
<div id="div1"></div>

</div>
<div id="load">
<table class="table table-hover">
   <form>
    <thead >
      <tr >
    
        <th ><h3>Add new projet</h3></th>
     
      </tr>
    </thead>
    <tbody>
      <tr>
 
        <td>Project Name</td>
        <td><input type="text" class="form-control name="name" id="name"></td>
      </tr>
      <tr>
         <td>Start Date</td>
        <td><input type="date" class="form-control"  name="date" id="date"></td>
      </tr>
      <tr>
       <td>Project Description</td>
        <td> <textarea class="form-control" rows="5" id="description"></textarea></td>
      </tr>
      <tr>
         <td>End Date</td>
        <td><input type="date" class="form-control" name="date" id="end"></td>
      </tr>
      <tr>
       <td>Initial Budget</td>
        <td><input type="textarea" class="form-control "  style="background-color: " name="name" id="budget"></td>
      </tr>
      <tr>
       <td><input type="reset" class="btn-primary"  name="name" id="name"></td>
        <td><input type="button" class="btn-success"  name="name" value="Submit" id="submit"></td>
      </tr>

    </tbody>
  </form>
  </table>
</div>
<?php
$conn=mysqli_connect("localhost","root","","erp");

	if (isset($_GET['name'])&&isset($_GET['date'])&&isset($_GET['description'])&&isset($_GET['end'])&&isset($_GET['budget'])) {
		$name=$_GET['name'];
		$date=$_GET['date'];
		$description=$_GET['description'];
		$end=$_GET['end'];
		$budget=$_GET['budget'];
	
	$sql = "INSERT INTO `projects` (`id`, `name`, `start-date`, `description`, `end-date`, `budget`) VALUES (NULL, '$name', '$date', '$description', '$end', '$budget');";
if (mysqli_query($conn,$sql)) {
	echo 'inserted';

}

}
?>
<div id="msg"></div>
</body>
</html>