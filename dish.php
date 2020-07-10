<?php
session_start();
include("connection.php");
extract($_REQUEST);
if(isset($_SESSION['id']))
{
	$id=$_SESSION['id'];
	$vq=mysqli_query($con,"select * from dish");
	$vr=mysqli_fetch_array($vq);
	$vrid=$vr['dish_name'];
}

if(!isset($_SESSION['id']))
{
	header("location:Restaurant_login.php?msg=Please Login To continue");
}
else
{
	$query=mysqli_query($con,"select * from dish");
	if(mysqli_num_rows($query))
	{  
		$row=mysqli_fetch_array($query);
		$v_id=$row['name'];
	}
	else
	{
		
		header("location:index.php");
		
		
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dishes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		
		<a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">FoodShala</span></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			
			<ul class="navbar-nav ml-auto">
				
				<li class="nav-item">
					<form method="post">
						<?php
						if(empty($_SESSION['id']))
						{
							?>
							<button class="btn btn-outline-danger my-2 my-sm-0" name="login">Log In</button>&nbsp;&nbsp;&nbsp;
							
							<?php
						}
						?>
					</form>
				</li>
				
				
			</ul>
			
		</div>
		
	</nav>
	<div class="tab-content" id="myTabContent">
			
			<div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="home-tab">
				<div class="container"> 
					<table border="1" bordercolor="#F0F0F0" cellpadding="20px">
						<th>food name</th>
						<th>Category</th>
						<?php
						if($query=mysqli_query($con,"select * from dish"))
						{
							if(mysqli_num_rows($query))
							{
								while($row=mysqli_fetch_array($query))
								{
									
									?>
									<tr>
										
										
										<td style="width:150px;"><?php  echo $row['name']."<br>";?></td>
										<td style="width: 150px;"><?php echo $row['Category']."<br>";?></td>
									</tr>
					</table>
				</div>    	 
			</div>
			<!--tab 1 ends-->	   
			</form>
		</div>
</body>
</html>
