<?php

session_start();

include("includes/db.php");
include("includes/header.php");

if(!isset($_SESSION['user']))
{
header("Location:login.php");
exit();
}

$user_name=$_SESSION['user'];

$user_query=
"SELECT * FROM users
WHERE name='$user_name'";

$user_result=
mysqli_query($conn,$user_query);

$user=mysqli_fetch_assoc($user_result);

$user_id=$user['id'];

$sql=
"SELECT cart.id AS cart_id,
cart.quantity,
products.*
FROM cart
JOIN products
ON cart.product_id=products.id
WHERE cart.user_id='$user_id'";

$result=mysqli_query($conn,$sql);

$total=0;

?>

<section class="cart-container">

<h2>
My Cart 🛒
</h2>

<div class="cart-grid">
<?php
while($row=mysqli_fetch_assoc($result))
{
$total += $row['price'] * $row['quantity'];
?>

<div class="cart-card">

<img src="<?php echo $row['image']; ?>">

<div class="cart-content">

<h3>
<?php echo $row['product_name']; ?>
</h3>

<p class="cart-price">
₹<?php echo $row['price']; ?>
</p>
<div class="quantity-box">

<a href="decrease_quantity.php?id=<?php echo $row['cart_id']; ?>">

<button class="qty-btn">-</button>

</a>

<span>
<?php echo $row['quantity']; ?>
</span>

<a href="increase_quantity.php?id=<?php echo $row['cart_id']; ?>">

<button class="qty-btn">+</button>

</a>

</div>

<br>

<a href="remove_cart.php?id=<?php echo $row['cart_id']; ?>">

<button>
Remove
</button>

</a>

</div>

</div>

<?php
}
?>

</div>

<h2 class="total-box">
    <div style="text-align:center; margin-top:30px;">

<a href="checkout.php">

<button class="checkout-btn">
Proceed To Checkout 💳
</button>

</a>

</div>
Total:
₹<?php echo $total; ?>
</h2>

</section>

<?php
include("includes/footer.php");
?>