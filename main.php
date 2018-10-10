<!DOCTYPE html>
<html>
<head>
	<title>Erp software</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/animate.css">

  <style type="text/css">
    #anim {
  animation-duration: 3s;
  animation-delay: 2s;
  animation-iteration-count: 4;
}
  </style>
  		<script type="text/javascript">
  			$(document).ready(function(){
          /*
	$("#oppintment").click(function(){
    $.ajax({url: "setoppintment.php", success: function(result){
        $("#div1").html(result);
    }});
});
*/
$('#div1').load('home.php');

$("#home").click(function(){
$('#div1').load('home.php');
});

$("#oppintment").click(function(){
$('#div1').load('setoppintment.php');
});

$("#Customer").click(function(){
$('#div1').load('Customer.php');
});

$("#Employee").click(function(){
$('#div1').load('Employee.php');
});

$("#projects").click(function(){
$('#div1').load('projects.php');
});
$("#seeall").click(function(){
$('#div1').load('seeall.php');
});

$("form").submit(function(){
var date=$('#date').val();
var description=$('#description').val();
alert(date+description);
if (date!=null&&description!=null) {
    $.ajax({url: "etoppintment.php?date="+date+"&description="+description, success: function(result){
        $("#msg").html(result);
    }});
}
});


});
	</script>
</head>
<body class="container-fluid">
  <h1 class="animated infinite bounce delay-5s" id="anim">erp city</h1>
<?php
  if (isset($_GET['date'])&&isset($_GET['description'])) {
    $date=$_GET['date'];
    $details=$_GET['description'];
  $conn=mysqli_connect("localhost","root","","erp");
  if (!$conn) {
    echo mysql_error();
  }
  $sql="insert into oppintmets(id,date,today,daysleft,details) values(null,'$date',now(),0,'$details')";
  if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}   
}
  ?>
  
<nav class="navbar ">
  <div class="container-fluid">
    <div class="navbar-header">
      
      <a class="navbar-brand" href="#">Erp Software</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" style="">
        <li class="active"><a href="#" id="home">Home</a></li>
        <li><a href="#" id="oppintment">Oppintmets</a></li>
        <li><a href="#" id="Customer">Customer Score</a></li> 
        <li><a href="#" id="Employee">Employee Management</a></li> 
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>


  <div class="row">
    <div class="col-lg-2">
      <table class="table table-striped">
  <thead>
    <th></th>
  </thead>
  <tbody>
    <form action="" id="myform">
    <tr><td>date of oppintment</td><td><input type="date" id="date" name="date" placeholder="mm/dd/yyyy"></td></tr>
<tr><td>description</td><td><input type="textarea" id="description" name="description"></td></tr>
  <tr><td><input type="submit" value="submit"  id="submit" ></td></tr>
  </form>
  </tbody>
</table>
<p style="color: green;" id="msg"></p>

       <ul class="nav navbar-nav">
      
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#" id="seeall">see all</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  
</nav>
    </div>
    <div class="col-lg-1"></div>
   <div id="div1" class="col-lg-9"><center></center></div>

  </div>


</body>
</html>