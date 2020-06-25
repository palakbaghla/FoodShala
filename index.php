<?php
session_start();
include("connection.php");
$con = OpenCon();

$query="Select * from role";
$result=mysqli_query($query);

?>

<html>
<head>
	<title>Home</title>
	<!--bootstrap files-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!--bootstrap files-->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes|Permanent+Marker" rel="stylesheet"> 

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<a class="navbar-brand" href="index.php"><span style="color: green; font-family: 'Permanent Marker', cursive;">FoodShala</span></a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				
				<li class="nav-item">
					<form method="post" action="">
						
						<button class="btn btn-outline-danger my-2 my-sm-0" name="Restaurant" type="submit"><a href="Restaurant_login.php?msg=you must be login first">Restaurant Login</a></button>	
						&nbsp;&nbsp;&nbsp;
						
						<button class="btn btn-outline-danger my-2 my-sm-0" name="Foodielogin" type="submit"><a href="login.php?msg=you must be login first">Foodie Login</a></button>&nbsp;&nbsp;&nbsp;
					</form>
				</li>
			</ul>
		</div>
	</nav>
	<!-- navbar ends -->
	<div id="demo" class="carousel slide" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		</ul>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images\6-thalli.jpg" alt="6-thalli" class="d-block w-100">
			</div>
			<div class="carousel-item">
				<img src="images\_109887796_gettyimages-153775715-1.jpg" alt="_109887796_gettyimages-153775715-1" class="d-block w-100">
			</div>
			<div class="carousel-item">
				<img src="images\best-indian-restaurants-in-india.jpg" alt="best-indian-restaurants-in-india" class="d-block w-100">
			</div>
		</div>
		<a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	</div>
	<!-- slider ends-->

</body>
</html>