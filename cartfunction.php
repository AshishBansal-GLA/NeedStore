
<?php

include 'connect.php';
include 'logincheck.php';
include 'cartphp.php';
$userid = $_SESSION['userid'];
$sql = "SELECT * FROM cart_item WHERE email='$userid'";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);
if($num>0)
{
  $total = 0;
while ($row = mysqli_fetch_array($result)) {
  $name = $row['product_name'];
  $image = $row['image'];
  $subtotal = $row['price']*$row['qty'];
  $total = $subtotal+$total;
  $price = $row['price'];
  $id = $row['product_id'];
echo "

<tr>
  <td>
<div class='cart-info'>

    <img src='images/$image' width='300px' height='300px'>
    <div>
      <p>$name</p>
     </div>
     <form method = 'post'>
     <textarea name='deleteid' hidden> $id </textarea>
     <button type='submit' class='btn btn-secondary btn-sm' name='buttonremove'>remove</button>
</div>
  </td>
  <td> <input type='number' id = 'cart_$row[product_id]' name='qty' value='$row[qty]' min='1' onchange='qt($row[product_id])' style='width:90px;'> </td>
  <td style='text-align-last: start;'><input type='text' id='demo$row[product_id]' value='$price' style='width:90px; border-style: none; background: white;' disabled></td>
  <td style='text-align-last: end; padding-right: 30px;'><input type='text' style='border-style: none; width: 90px; background: white;' id='subtotal$row[product_id]' value='$subtotal' disabled></td>
  </form>
</tr>
";

}
}
else {
echo "<h1> Cart is Empty </h1>";
}
 ?>