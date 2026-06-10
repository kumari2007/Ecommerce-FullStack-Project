<?php
session_start();
?>
<!DOCTYPE html>
<html>
<script src="assets/js/script.js" defer></script>
<head>

<title>E-Commerce Website</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<nav>

<div class="logo">
UrbanCart
</div>

<ul>

<li>
<a href="index.php">Home</a>
</li>

<li>
<a href="products.php">Products</a>
</li>

<li>
<a href="cart.php">Cart</a>
</li>

<?php
if(isset($_SESSION['user']))
{
?>

<li>

<a href="#">
Hi,
<?php echo $_SESSION['user']; ?>

</a>

</li>

<li>
<a href="logout.php">
Logout
</a>
</li>

<?php
}
else
{
?>

<li>
<a href="login.php">Login</a>
</li>

<li>
<a href="register.php">Register</a>
</li>

<?php
}
?>

</ul>

</nav>