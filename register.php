<?php
include("includes/db.php");

if(isset($_POST['register']))
{
$name=$_POST['name'];
$email=$_POST['email'];

$password=password_hash(
$_POST['password'],
PASSWORD_DEFAULT
);

$sql=
"INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')";

if(mysqli_query($conn,$sql))
{
echo "<script>
alert('Registration Successful');

window.location='login.php';
</script>";
}
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Register</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="auth-body">

<div class="auth-container">

<h2>Create Account ✨</h2>

<form method="POST">

<input
type="text"
name="name"
placeholder="Enter Name"
required>

<input
type="email"
name="email"
placeholder="Enter Email"
required>
<div class="password-box">

<input
type="password"
name="password"
id="password"
placeholder="Enter Password"
required>

<span id="togglePassword">👁</span>

</div>

<div id="strengthMessage"></div>

<button
name="register">

Register

</button>

<p>

Already have an account?

<a href="login.php">
Login
</a>

</p>

</form>

</div>
<script>

/* PASSWORD STRENGTH */

const passwordInput =
document.getElementById("password");

const strengthMessage =
document.getElementById("strengthMessage");

passwordInput.addEventListener("keyup", function(){

const value = passwordInput.value;

let strength = 0;

let message = "";

if(value.length >= 8){
strength++;
}

if(/[A-Z]/.test(value)){
strength++;
}

if(/[0-9]/.test(value)){
strength++;
}

if(/[!@#$%^&*]/.test(value)){
strength++;
}

/* Weak */

if(strength <= 1){

message =
"❌ Weak Password <br> Add uppercase, number, symbol and minimum 8 characters.";

strengthMessage.style.color = "red";
}

/* Medium */

else if(strength <= 3){

message =
"⚠ Medium Password <br> Try adding more security.";

strengthMessage.style.color = "orange";
}

/* Strong */

else{

message =
"✅ Strong Password";

strengthMessage.style.color = "lightgreen";
}

strengthMessage.innerHTML = message;

});

/* SHOW / HIDE PASSWORD */

const togglePassword =
document.getElementById("togglePassword");

togglePassword.addEventListener("click", function(){

if(passwordInput.type === "password"){

passwordInput.type = "text";

togglePassword.innerHTML = "🙈";
}

else{

passwordInput.type = "password";

togglePassword.innerHTML = "👁";
}

});

</script>
</body>

</html>