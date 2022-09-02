<?php 
include 'inc/session.php';
ob_start(); 
$msg = $message = "";
if (isset($_POST['submit'])) {
	
$file = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
$type = pathinfo("upload/$file", PATHINFO_EXTENSION);



if ($type != "PNG" && $type != "jpg" && $type != "JPG" && $type != "png") {
$msg = "<div class='alert-danger p-1 font-weight-bold mb-1 text-center'>File type must be jpg or png</div>";
				 	
}
elseif ($_FILES["file"]["size"] > 500000) {
$msg = "<div class='alert-danger p-3 font-weight-bold rounded mb-3 text-center'>File size is larger than 500kb</div>";
}

else{
$sql = "UPDATE profile SET text = '{$file}' WHERE id = 4";
$query = mysqli_query($connect, $sql);
move_uploaded_file($tmp, "../images/$file");

if ($query) {
			
$msg = "<div class='alert-primary p-3 font-weight-bold rounded mb-3 text-center'>Success </div>";
header('location: index.php');
                        
}
else{
$msg = "<div class='alert-primary p-2 font-weight-bold rounded mb-3 text-center'>Error</div>";
}
}

}
if (isset($_POST['update'])) {
	
$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
$type = pathinfo("upload/$image", PATHINFO_EXTENSION);



if ($type != "PNG" && $type != "jpg" && $type != "JPG" && $type != "png") {
$message = "<div class='alert-danger p-1 font-weight-bold mb-1 text-center'>File type must be jpg or png</div>";
				 	
}
elseif ($_FILES["image"]["size"] > 500000) {
$message = "<div class='alert-danger p-3 font-weight-bold rounded mb-3 text-center'>File size is larger than 500kb</div>";
}

else{
$sql = "UPDATE profile SET text = '{$image}' WHERE id = 5";
$query = mysqli_query($connect, $sql);
move_uploaded_file($tmp, "../images/$image");

if ($query) {
			
$message = "<div class='alert-primary p-3 font-weight-bold rounded mb-3 text-center'>Success </div>";
header('location: index.php');
                        
}
else{
$message = "<div class='alert-primary p-2 font-weight-bold rounded mb-3 text-center'>Error</div>";
}
}

}
if (isset($_POST['updater'])) {
	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$sql = "UPDATE profile SET text = '{$name}' WHERE id = 6";
	$query = mysqli_query($connect, $sql);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
<div class="row ml-0 mr-0">
	<div class="col-md-10">
	<h1 class="text-light font-weight-bold text-center">Welcome</h1>
	<hr class="bg-white">
	<h4 class="float-right text-light dropdown">
		<?php  
	$sql = "SELECT * FROM profile WHERE id = 6";
	$query = mysqli_query($connect, $sql);
	while ($row = mysqli_fetch_array($query)) {
	echo $row['text'];
	
	?>
	<span class=" small dropdown-toggle" data-toggle="dropdown"></span>
	<div class="dropdown-menu p-2">
		<b class="text-orange">Change Name</b>
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	<input type="text" name="name" required="" value="<?php echo $row['text']; ?>" class="form-control">
	<button type="submit" name="updater" class="w-100 darkorange p-2 border-0 mb-3 outline text-light btn mt-1">Update</button>
	<?php } ?>
	</div>
	</form>
	</div>	
	</h4>
	<div class="clearfix"></div>
<div class="mt-3 ">
	<div class="col-md-3 float-left">
	<b class="text-light">Profile Image</b>
	<?php echo $msg; ?>
	<?php  
	$sql = "SELECT * FROM profile WHERE id = 4";
	$query = mysqli_query($connect, $sql);
	while ($row = mysqli_fetch_array($query)) {
	
	
	?>	
	<img src="../images/<?php echo $row['text']; ?>" class="w-100" style="height: 200px;">
<?php } ?>
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	<input type="file" name="file" class="form-control">
	<button type="submit" name="submit" class="col-md-6 float-right darkorange p-2 border-0 mb-3 outline text-light btn mt-1">Change</button>
	<div class="clearfix"></div>
	</div>
	</form>
	</div>
	<div class="float-left col-md-6">
	<b class="text-light">Links</b>
	<table class="table table-striped col-md-12 table-bordered text-center bg">
	<thead>
	<tr>
		<th>S/N</th>
		<th>Media</th>
		<th>Link</th>
		<th>Edit</th>
	</tr>
	</thead>
	<tbody>
	<?php  
	$l_sql = "SELECT * FROM links";
	$l_query = mysqli_query($connect, $l_sql);
	$n = 1;
	while ($link = mysqli_fetch_array($l_query)) {
		
	
	?>
	<tr>
	<td><?php echo $n++; ?></td>
	<td><?php echo $link['media']; ?></td>
	<td><?php echo $link['link']; ?></td>
	<td><span class="w-25 dropdown">
	<span class="dropdown-toggle" data-toggle="dropdown"></span>
		<div class="dropdown-menu p-2">
			<form method="post" enctype="multipart/form-data">
			<b>Edit</b>
			<div class="form-group">
			<input type="<?php if($link['id'] == 6){echo "file";}else{echo "text";} ?>" name="link" class="form-control" value="<?php echo $link['link']; ?>">
			</div>
			<button type="submit" name="submit<?php echo $link['id']; ?>" class="w-100 float-right darkorange p-2 border-0 outline text-light btn">Update</button>
	<div class="clearfix"></div>
			</form>
		</div>
	</span>
	</td>
	</tr>
	<?php  
	if (isset($_POST['submit'.$link['id']])) {
		$id = $link['id'];
		if ($id == 6) {
$file = $_FILES['link']['name'];
$tmp = $_FILES['link']['tmp_name'];
$type = pathinfo("upload/$file", PATHINFO_EXTENSION);
if ($type != "pdf" && $type != "PDF" && $type != "docx" && $type != "doc") {
echo "<script>alert('File type must be pdf, docx or doc')</script>";
				 	
}
elseif ($_FILES["link"]["size"] > 500000) {
echo "<script>alert('File size is larger than 500kb')</script>";
}else{


$u_sql = "UPDATE links SET link = '{$file}' WHERE id = '{$id}'";
$u_query = mysqli_query($connect, $u_sql);
if ($u_query) {
echo "<script>alert('Success')</script>";
move_uploaded_file($tmp, "../uploads/$file");
header('location: index.php');

}
}
}else{
		$linker = $_POST['link'];

		$u_sql = "UPDATE links SET link = '{$linker}' WHERE id = '{$id}'";
		$u_query = mysqli_query($connect, $u_sql);
		if ($u_query) {
			header('location: index.php');
	}
	}
	}
	?>
	<?php } ?>	
	</tbody>
	</table>
	</div>
	<div class="col-md-3 float-right">
	<b class="text-light">Background Image</b>
	<?php echo $message; ?>
	<?php  
	$sql = "SELECT * FROM profile WHERE id = 5";
	$query = mysqli_query($connect, $sql);
	while ($row = mysqli_fetch_array($query)) {
	
	
	?>	
	<img src="../images/<?php echo $row['text']; ?>" class="w-100" style="height: 200px;">
<?php } ?>
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	<input type="file" name="image" class="form-control">
	<button type="submit" name="update" class="col-md-6 float-right darkorange p-2 border-0 mb-3 outline text-light btn mt-1">Change</button>
	<div class="clearfix"></div>
	</div>
	</form>
	</div>
	<div class="clearfix"></div>

	
</div>
<div class="row ml-0 mr-0">
	<div class="col-md-3 mb-3">
	<a href="experience.php" class="text-light">
	<div class="darkorange text-light p-2 rounded">
	<b>Experiences</b>
	<h1 class=" text-right">
	<?php  
	$sql = "SELECT * FROM experience";
	$query = mysqli_query($connect, $sql);
	echo mysqli_num_rows($query);
	?>	
	</h1>
	</div>
	</a>
	</div>


	<div class="col-md-3 mb-3">
	<a href="education.php" class="text-light">
	<div class="darkorange text-light p-2 rounded">
	<b>Qualifications</b>
	<h1 class=" text-right">
	<?php  
	$sql = "SELECT * FROM education";
	$query = mysqli_query($connect, $sql);
	echo mysqli_num_rows($query);
	?>	
	</h1>
	</div>
	</a>
	</div>

	<div class="col-md-3 mb-3">
	<a href="skills.php" class="text-light">
	<div class="darkorange text-light p-2 rounded">
	<b>Skills</b>
	<h1 class=" text-right">
	<?php  
	$sql = "SELECT * FROM skills";
	$query = mysqli_query($connect, $sql);
	echo mysqli_num_rows($query);
	?>	
	</h1>
	</div>
	</a>
	</div>

	<div class="col-md-3 mb-3">
	<a href="messages.php">
	<div class="darkorange text-light p-2 rounded" >
	<b>Messages(s)</b>
	<h1 class=" text-right">
	<?php  
	$sql = "SELECT * FROM messages";
	$query = mysqli_query($connect, $sql);
	echo mysqli_num_rows($query);
	?>	
	</h1>
	</div>
	</a>
	</div>
<?php
include 'inc/graph.php';
?>
	
<div class="col-md-3 p-0">
<h5 class="text-light mt-3 text-center">Viewers Leader Board</h5>
<div class="shadow pl-4 pr-4 pt-2 h-75 darkorange">
<div class="row text-light border-bottom border-light">
	<div class="w-50">Ip address</div>
	<div class="w-25">Times</div>
	<div class="w-25">Last Visit</div>
</div>
	<marquee direction="up" class="h-75">
<?php  
	$sql = "SELECT * FROM comers ORDER BY times DESC";
	$query = mysqli_query($connect, $sql);
	while ($row = mysqli_fetch_array($query)) {
		
	
	?>
<div class="row text-light border-bottom border-light p-2">
	<div class="w-50"><?php echo $row['address']; ?></div>
	<div class="w-25 text-center"><?php echo $row['times']; ?></div>
	<div class="w-25"><?php echo substr($row['date'], 0, 6).'/'. substr($row['date'], 0, 2); ?></div>
</div>
<?php } ?>
</marquee>
</div>
</div>
</div>

</div>
<?php include 'inc/sidebar.php'; ?>

</div>
</body>
</html>
	<script type="text/javascript" src="../js/chart.min.js"></script>


<!-- pass.ng -->