<?php
		include '../inc/config.php';
		 session_start();

$msg = $username = $password = "";

if (isset($_POST['submit'])) {
$username = mysqli_real_escape_string($connect, $_POST['username']);
$password = mysqli_real_escape_string($connect, $_POST['password']);

$sql = "SELECT * FROM user WHERE username = '{$username}' && password = '{$password}'";
$query = mysqli_query($connect, $sql);
$count = mysqli_num_rows($query);
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($count > 0) {
$_SESSION['id'] = $row['id'];
header('location:index.php');
	header('location: index.php');
}
else{
$msg = "<div class='alert-danger text-center p-2 rounded'>Incorrect Username or Password</div>";
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login | Personal Website</title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
								

<div class="mt-5">
<div class="col-md-6 bg-white p-3 m-auto text-orange">
<div class="mt-5">

<h2 class="text-center font-weight-bold">Admin Login</h2>

											
<div class="col-md-6 m-auto text-center ">

<i class="w-25 ml-3 p-2 fab fa-facebook border fa-2x"></i>
<i class="w-25 ml-3 p-2 fab fa-google border fa-2x"></i>
<i class="w-25 ml-3 p-2 fab fa-linkedin border fa-2x"></i>
</div>
<p class="text-center">
__________________Or Continue with_______________
</p>

<form method="post" enctype="multipart/form-data" class="col-md-8 pl-5 pr-5 pt-2 m-auto">
	<?php echo $msg; ?>
<label class="font-weight-bold">Username</label>
<div class="form-group">
<input type="text" name="username" class="outline w-100 p-2 border-0 text-light bg-orange" placeholder="Input Your Username">
</div>

<label class="font-weight-bold">Password</label>
<div class="form-group">
<input type="password" minlength="6" name="password" class="outline w-100 p-2 border-0 text-light bg-orange" placeholder="Enter Your Password">
</div>

<input type="checkbox" name="check">
<span>Keep me Logged in</span> 
<a href="" class="float-right" style="color: orange;">Forgot Password?</a>

<button type="submit" name="submit" class="btn mt-2 w-100 font-weight-bold text-light darkorange">LOG IN</button>
</form>


</div>
</div>
</div>

               

</body>
</html>