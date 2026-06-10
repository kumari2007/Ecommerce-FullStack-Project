<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['user']))
{
header("Location:login.php");
exit();
}

$product_id=$_GET['id'];

$user_name=$_SESSION['user'];

/* GET USER ID */

$user_query=
"SELECT * FROM users
WHERE name='$user_name'";

$user_result=
mysqli_query($conn,$user_query);

$user=mysqli_fetch_assoc($user_result);

$user_id=$user['id'];

/* CHECK IF ALREADY IN CART */

$check_query=
"SELECT * FROM cart
WHERE user_id='$user_id'
AND product_id='$product_id'";

$check_result=
mysqli_query($conn,$check_query);

if(mysqli_num_rows($check_result)>0)
{
mysqli_query(
$conn,
"UPDATE cart
SET quantity=quantity+1
WHERE user_id='$user_id'
AND product_id='$product_id'"
);
}
else
{
mysqli_query(
$conn,
"INSERT INTO cart(user_id,product_id)
VALUES('$user_id','$product_id')"
);
}

echo "<script>

alert('🛒 Product Added To Cart');

window.location='products.php';

</script>";

?>