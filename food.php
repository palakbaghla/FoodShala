<?php
session_start();
include("connection.php");
extract($_REQUEST);
if(isset($_SESSION['id']))
{
	$id=$_SESSION['id'];
	$vq=mysqli_query($con,"select * from user where email='$id' and role_id=2");
	$vr=mysqli_fetch_array($vq);
	$vrid=$vr['restaurant_id'];
}

if(!isset($_SESSION['id']))
{
	header("location:Restaurant_login.php?msg=Please Login To continue");
}
else
{
	$query=mysqli_query($con,"select * from user where email='$id' and role_id=2");
	if(mysqli_num_rows($query))
	{  
		$row=mysqli_fetch_array($query);
		$v_id=$row['restaurant_id'];
	}
	else
	{
		
		header("location:index.php");
		
		
	}
}


if(isset($add))
	{   if(isset($_SESSION['id']))
{
	
	if(!empty($chk)) 
	{
		
		if(mysqli_query($con,"insert into tbfood(restaurant_id,dish_id,cost) values
			
			('$v_id','$dish_id','$cost')"))
		
		else{
			echo "failed";
		}
	}
	
}
else
{
	header("location:Restaurant_login.php");
}
}

if(isset($logout))
{
	session_destroy();
	header("location:index.php");
}
if(isset($upd_account))
{
	if(mysqlI_query($con,"update user set Firstname='$fn',email='$emm',mob='$mob',password='$pwsd' where email='$id'"))
	{
		header("location:infoUpdate.php");
	}
}

else
{
	header("location:Restaurant_login.php?msg=Please Login To continue");
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Food</title>
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
	<style>
		ul li{}
		ul li a {color:white;padding:40px; }
		ul li a:hover {color:white;}
	</style>

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		
		<a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">FoodShala</span></a>
		<?php
		if(!empty($id))
		{
			?>
			<a class="navbar-brand" style="color:black; text-decoration:none;"><i class="far fa-user"><?php if(isset($id)) { echo $vr['fld_name']; }?></i></a>
			<?php
		}
		?>
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

	<!--navbar ends-->


	<br><br>
	<div class="middle" style=" padding:40px; border:1px solid #ED2553;  width:100%;">
		<!--tab heading-->
		<ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:#ED2553;border-radius:10px 10px 10px 10px;" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="home" aria-selected="true">Manage Products</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="profile" aria-selected="false">Add Products</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="accountsettings-tab" data-toggle="tab" href="#accountsettings" role="tab" aria-controls="accountsettings" aria-selected="false">Account Settings</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="false">Update Logo</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Order Status</a>
			</li>
			
		</ul>
		<br><br>
		<span style="color:green;"><?php if(isset($msgs)) { echo $msgs; }?></span>
		<!--tab 1 starts-->   
		<div class="tab-content" id="myTabContent">
			
			<div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="home-tab">
				<div class="container"> 
					<table border="1" bordercolor="#F0F0F0" cellpadding="20px">
						<th>food name</th>
						<th>food Price</th>
						<th>Delete Item   </th>
						<th>Update item Details </th>
						<?php
						if($query=mysqli_query($con,"select tblvendor.fldvendor_id,tblvendor.fld_email,tbfood.food_id,tbfood.foodname,tbfood.cost,tbfood.paymentmode,tbfood.cuisines,tbfood.fldimage,tblvendor.fld_name from tblvendor inner join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tblvendor.fld_email='$id'"))
						{
							if(mysqli_num_rows($query))
							{
								while($row=mysqli_fetch_array($query))
								{
									
									?>
									<tr>
										
										
										<td style="width:150px;"><?php  echo $row['foodname']."<br>";?></td>
										<td align="center" style="width:150px;"><?php  echo $row['cost']."<br>";?></td>
										
										<td align="center" style="width:150px;">
											
											<a href="Restaurant_delete_food.php?food_id=<?php echo $row['food_id'];?>"><button type="button" class="btn btn-warning">Delete </button></a>
											
										</td>
										<td align="center" style="width:150px;">
											
											<a href="update.php?food_id=<?php echo $row['food_id'];?>"><button type="button" class="btn btn-danger">Update </button></a>
											
										</td>
									</tr>
									
									<?php 
									
									$foodname="";
									
									$cost="";					
								}
							}
							else 
								
							{
								$msg="please add some Items";
							}
						}
						else 
						{
							echo "failed";
						}
						
						?>
					</table>
				</div>    	 
			</div>
			<!--tab 1 ends-->	   
			
			
			<!--tab 2 starts-->
			<div class="tab-pane fade" id="manageaccount" role="tabpanel" aria-labelledby="profile-tab">
				<!--add Product-->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group"><!--food_name-->
						<label for="food_name">Food Name:</label>
						<input type="text" class="form-control" id="food_name" value="<?php if(isset($food_name)) { echo $food_name;}?>" placeholder="Enter Food Name" name="food_name" required>
					</div>
					
					
					<div class="form-group"><!--cost-->
						<label for="cost">Cost :</label>
						<input type="number" class="form-control" id="cost"  value="<?php if(isset($cost)) { echo $cost;}?>" placeholder="10000" name="cost" required>
					</div>
					
					<button type="submit" name="add" class="btn btn-primary">ADD Item</button>
					<br>
					<span style="color:red;"><?php if (isset($msg)){ echo $msg;}?></span>
				</form>
				
			</div>
			<!--tab 2 ends-->
			
			
			<!--tab 3-- starts-->
			<div class="tab-pane fade" id="accountsettings" role="tabpanel" aria-labelledby="accountsettings-tab">
				<form method="post" enctype="multipart/form-data">
					<?php
					$upd_info=mysqli_query($con,"select * from user where email='$id' and role_id=2");
					$upd_info_row=mysqlI_fetch_array($upd_info);
					$nm=$upd_info_row['name'];
					$emm=$upd_info_row['email'];
					$mb=$upd_info_row['mob'];
					$psd=$upd_info_row['password'];
					
					?>
					
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" id="username" value="<?php if(isset($nm)){ echo $nm;}?>" class="form-control" name="fn" />
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" id="email" value="<?php if(isset($emm)){ echo $emm;}?>" class="form-control" name="emm" readonly="readonly"/>
					</div>
				</div>
				<div class="form-group">
					<label for="mobile">Mobile</label>
					<input type="text" id="mobile" pattern="[6-9]{1}[0-9]{9}" value="<?php if(isset($mb)){ echo $mb;}?>" class="form-control" name="mob" required/>
				</div>
				
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" name="pwsd" class="form-control" value="<?php if(isset($psd)){ echo $psd;}?>" id="pwd" required/>
				</div>
				
				
				
				<button type="submit" name="upd_account" style="background:#ED2553; border:1px solid #ED2553;" class="btn btn-primary">Update</button>
				
			</form>
		</div>
		
		<div class="tab-pane fade " id="status" role="tabpanel" aria-labelledby="status-tab">
			<table class="table">
				<tbody>
					<th>Order Id</th>
					<th>Customer Email</th>
					<th>Food Id</th>
					<th>Order Status</th>
					<th>Update Status</th>
					<?php
					$orderquery=mysqli_query($con,"select * from order(summary) where restaurant_id='$vrid'");
					if(mysqli_num_rows($orderquery))
					{
						while($orderrow=mysqli_fetch_array($orderquery))
						{
							$stat=$orderrow['status'];
							?>
							<tr>
								<td><?php echo $orderrow['order_id']; ?></td>
								<td><?php echo $orderrow['email_id']; ?></td>
								<td><?php echo $orderrow['dish_id']; ?></td>
								<?php
								if($stat=="cancelled" || $stat=="Out Of Stock")
								{
									?>
									<td><i style="color:orange;" class="fas fa-exclamation-triangle"></i>&nbsp;<span style="color:red;"><?php echo $orderrow['status']; ?></span></td>
									<?php
								}
								else
									
								{
									?>
									<td><span style="color:green;"><?php echo $orderrow['status']; ?></span></td>
									<?php
								}
								?>
								<form method="post">
									<td><a href="changestatus.php?order_id=<?php echo $orderrow['fld_order_id']; ?>"><button type="button" name="changestatus">Update Status</button></a></td>
								</form>
								<tr>
									<?php
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>  
		
	</body>
	</html>