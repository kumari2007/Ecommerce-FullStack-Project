<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['user']))
{
header("Location:login.php");
exit();
}

$user=$_SESSION['user'];

$total=$_GET['total'] ?? 0;

if(isset($_POST['place_order']))
{

$address=$_POST['address'];
$phone=$_POST['phone'];
$total=$_POST['total'];

$sql=
"INSERT INTO orders
(user_name,total_price,address,phone)
VALUES
('$user','$total','$address','$phone')";

mysqli_query($conn,$sql);

mysqli_query($conn,"DELETE FROM cart");

echo "<script>

alert('🎉 Order Placed Successfully');

window.location='index.php';

</script>";
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Checkout</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body class="auth-body">

<div class="auth-container">

<h2>
Checkout 💳
</h2>

<form method="POST">

<input
type="text"
name="address"
placeholder="Enter Delivery Address"
required>

<input
type="text"
name="phone"
placeholder="Enter Phone Number"
required>

<input
type="number"
name="total"
value="<?php echo $_GET['total']; ?>"
readonly>

<button name="place_order">
Place Order
</button>

</form>

</div>

</body>

</html>