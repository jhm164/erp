<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>

<body background="images/back2.jpg">



	<center>
		<div class="container" >
<h1 class="form-heading" style="color: white;font-family: monospace;">login Form</h1>
<div class="login-form"  style="color: white">
<div class="main-div">
    <div class="panel">
   <h2 style="font-family: monospace;">Admin Login</h2>
   <p>Please enter your email and password</p>
   </div>
   <div class="panel panel-default"  style="background-color: black ;opacity: 0.8;">

<form id="Login" class="panel-body" style="padding: 40px;" method="POST" action="main.php">
 
        <div class="form-group">


            <input type="text" class="form-control" name="Username" id="inputEmail" placeholder="Email Address" style="width: 250px;">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" name="Password" id="inputPassword" placeholder="Password" style="width: 250px;">

        </div>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a>
</div>
<div>
        <button type="submit" class="btn btn-primary">Login</button>
</div>
    </form>

</div>

	</center>

</body>
</html>