<?php
include("includes/db.php");
include("includes/header.php");

$sql="SELECT * FROM products";

$result=mysqli_query($conn,$sql);
?>

<section class="products">

<h2>
Our Products
</h2>

<!-- SEARCH BAR -->

<div style="text-align:center;margin-bottom:40px;">

<input
type="text"
id="searchInput"
placeholder="Search products..."
style="
padding:15px;
width:300px;
border-radius:10px;
border:none;
outline:none;
font-size:16px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
">

</div>

<div class="product-grid">

<?php

while($row=mysqli_fetch_assoc($result))
{
?>

<div class="card">

<img src="<?php echo $row['image']; ?>">

<div class="card-content">

<h3>
<?php echo $row['product_name']; ?>
</h3>

<p class="price">

₹<?php echo $row['price']; ?>

</p>

<p>

<?php echo $row['description']; ?>

</p>

<br>

<a href="add_to_cart.php?id=<?php echo $row['id']; ?>">

<button>
Add to Cart
</button>

</a>
</div>

</div>

<?php
}
?>

</div>

</section>

<?php
include("includes/footer.php");
?>