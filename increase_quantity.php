<?php

include("includes/db.php");

$id=$_GET['id'];

mysqli_query(
$conn,
"UPDATE cart
SET quantity=quantity+1
WHERE id='$id'"
);

header("Location:cart.php");

?>