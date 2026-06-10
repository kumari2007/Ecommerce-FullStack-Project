<?php
session_start();

include("includes/db.php");

if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];

$sql=
"SELECT * FROM users
WHERE email='$email'";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

if($row &&
password_verify(
$password,
$row['password']
))
{
$_SESSION['user']=$row['name'];

header("Location:index.php");
}
else
{
echo "<script>
alert('Invalid Email or Password');
</script>";
}
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="auth-body">

<div class="auth-container">

<h2>Welcome Back 👋</h2>

<form method="POST">

<input
type="email"
name="email"
placeholder="Enter Email"
required>

<div class="password-box">

<input
type="password"
name="password"
id="loginPassword"
placeholder="Enter Password"
required>

<span id="toggleLoginPassword">👁</span>

</div>

<button
name="login">

Login

</button>

<p>

Don't have account?

<a href="register.php">
Register
</a>

</p>

</form>

</div>
<script>

const loginPassword =
document.getElementById("loginPassword");

const toggleLoginPassword =
document.getElementById("toggleLoginPassword");

toggleLoginPassword.addEventListener("click", function(){

if(loginPassword.type === "password"){

loginPassword.type = "text";

toggleLoginPassword.innerHTML = "🙈";
}
else{

loginPassword.type = "password";

toggleLoginPassword.innerHTML = "👁";
}

});

</script>
</body>

</html>