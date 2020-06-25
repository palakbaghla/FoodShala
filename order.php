<?php
include("connection.php");
echo $cust_id=$_GET['cust_id'];

$query=mysqli_query($con,"select dish.id,dish.name,menu.restaurant_id,menu.price, order_items(cart).id, order_items(cart).dish_id, order_items(cart).user_id from dish inner join menu on dish.id=menu.dish_id, menu inner join order_items(cart) on menu.dish_id=order_items(cart).dish_id where tblcart.fld_customer_id='$cust_id'");

$re=mysqli_num_rows($query);
while($row=mysqli_fetch_array($query))
{
	echo "<br>";
	echo "cart id is".$cart_id=$row['id'];
	echo "vendor id is".$ven_id=$row['restaurant_id'];
	echo "food_id is".$food_id=$row['dish_id'];
	echo "cost is".$cost=$row['cost'];
	echo 'payment status is'.$paid="In Process";
	
	if(mysqli_query($con,"insert into order(summary)
		(id,retaurant_id,user_id, dish_id,cost, fldstatus) values
		('$cart_id','$ven_id','$food_id','$cust_id','$cost','$paid')"))
	{
		if(mysqli_query($con,"delete from order_items(cart) where id='$cart_id'"))
		{
			header("location:customerupdate.php");
		}
	}
	else
	{
		echo "failed";
	}
}
?>