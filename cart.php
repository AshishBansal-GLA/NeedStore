<?php
error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>cart item details</title>
	<link rel="stylesheet" type="text/css" href="cart.css">
	<link rel="stylesheet" href="style.css">
	<script src="bootstrap.js"></script>

<body>
	<div class="navbar" style="width:100%;">
		<div class="logo">
			<marquee direction=""><!-- for floating right to left -->
				<?php include 'logo.php'; ?>
			</marquee>
		</div>
		<nav>
			<?php include 'nav.php'; ?>
		</nav>
		<?php include 'cartcount.php'; ?>
		<img src="images/menu.png" class="menu-icon" alt="no image" onclick="menutoggle()">
	</div>
	<!-- <form action="" -->

	<div class="cart-name">
	<table>
		<tr>

		<th style="width: 50%;">Product</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Sub Total </th>

	</tr>
	<?php
	include 'cartfunction.php';
	?>



</div>
<div style="height: 100px; width: 100px">
	<table>
		<tr>
			<td style="background-color: #f1e2e2; font-size: x-large;">Total</td>
			<td style="background-color: #f1e2e2; font-size: x-large; text-align-last: center;" class="total"><?php echo "Rs. ".$total; ?></td>
			<?php 
			$email = $_SESSION['userid'];
			$sql = "SELECT * from cart_item where email='$email'";
			$result = mysqli_query($connect,$sql);
			$rows = mysqli_num_rows($result);
			if($rows==0)
			{
				echo '<td style="
    text-align: inherit;
">
			<a href="payment.php"><input type="button" disabled value="Pay Now" style="
    background: red;
    color: white;
    border-radius: 63px;
    /* font-size: xx-large; */
    padding-inline: revert;
    margin-left: 1px;
    /* margin-bottom: 90px; */
    width: auto;
"></a>
			</td>';
			}
			else
			{
				echo '<td style="
    text-align: inherit;
">
			<a href="payment.php"><input type="button" value="Pay Now" style="
    background: red;
    color: white;
    cursor: pointer;
    border-radius: 63px;
    /* font-size: xx-large; */
    padding-inline: revert;
    margin-left: 1px;
    /* margin-bottom: 90px; */
    width: auto;
"></a>
			</td>';
			}
			?>
			<td>
			<a href="orders.php"><input type="button" value="Your Orders" style="
    background: red;
    color: white;
    cursor: pointer;
    border-radius: 63px;
    /* font-size: xx-large; */
    padding-inline: revert;
    margin-left: 1px;
    /* margin-bottom: 90px; */
    width: auto;
"></a>
			</td>
		</tr>
	</table>
</div>
</body>
</html>
