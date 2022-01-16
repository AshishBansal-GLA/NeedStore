<!DOCTYPE html>
<html>
<head>
	<title>cart item details</title>
	<link rel="stylesheet" type="text/css" href="order.css">
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
		<img src="images/menu.png" class="menu-icon" alt="no image" onclick="menutoggle()"></div>
        <div class="cart-name">
	<table>
		<tr>

		<th style="width: 50%;">Product</th>
		<th>Quantity</th>
		<th>Paid Price</th>

	</tr>
    
        <?php
        
        include 'connect.php';
        include 'logincheck.php';
        $email = $_SESSION['userid'];
        $sql = "SELECT * from orders where email = '$email'";
        $result = mysqli_query($connect, $sql);
        if($result)
        {
            while($row = mysqli_fetch_array($result))
            {
                $name = $row['product_name'];
                $image = $row['image'];
                $qty = $row['qty'];
                $price = $row['price']*$qty;
                
                echo "
                <tr>
  <td>
<div class='cart-info'>

    <img src='images/$image' width='300px' height='300px'>
    <div>
      <p>$name</p>
     </div>
</div>
  </td>
  <td> <input type='text' value='$row[qty]' style='width:90px;' disabled> </td>
  <td style='text-align-last: start;'><input type='text' id='demo$row[product_id]' value='$price' style='width:90px; border-style: none; background: white;' disabled></td>
  </form>
</tr>";
            }
        }
        
        ?>
  <td>
    </table>
    <a href='index.php' ><input type="button" value="Continue to Shopping" style="
    background: greenyellow;
    font-size: xx-large;
    cursor: pointer;
"></a>
        </div>
	</div>