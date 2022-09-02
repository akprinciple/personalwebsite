<?php  
include 'inc/session.php';
$msg = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Messages</title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
<div class="row ml-0 mr-0">
<div class="col-md-10">
<h2 class="mt-3 text-light">Messages</h2>
<hr class="bg-white mb-5">

<?php echo $msg; ?>

<h4 class="text-light">Manage messages</h4>
	<table class="table table-striped table-bordered text-center bg-white">
	<thead>
	<tr>
	<th>S/N</th>
	<th>Name</th>
	<th>Email</th>
	<th>Message</th>
	<th>Time</th>
	<th>Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php  
	$s_sql = "SELECT * FROM messages ORDER BY id DESC";
	$s_query = mysqli_query($connect, $s_sql);
	$n = 1;
	while ($row = mysqli_fetch_array($s_query)) {
			
		

	?>
	<tr>
	<td><?php echo $n++; ?></td>
	<td><?php echo $row['name']; ?></td>
	<td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
	<td><?php echo substr($row['message'], 0, 100). " ..."; ?></td>
	<td><?php echo $row['date']; ?></td>
	<td>
	<span id="update<?php echo $row['id']; ?>" title="Open Message" class="fas fa-eye pointer"></span>
	<span id="del<?php echo $row['id']; ?>" href="" class="fas fa-times text-danger pointer"></span>
	</td>
	</tr>
	<?php } ?>
	</tbody>
	</table>
</div>
<?php include 'inc/sidebar.php'; ?>
</div>

<!-------------- Delete Modal ------------------------>
<?php 
 $u_sql = "SELECT * FROM messages";
$u_query = mysqli_query($connect, $u_sql);
$n = 1;
while ($user = mysqli_fetch_array($u_query)) {
?>
<div id="fetch<?php echo $user['id']; ?>" class="w-100 position-absolute position-fixed" style="background-color: rgba(0,0,0,0.5); min-height: 100%; top: 0; z-index: 2; display: none;">
<div class=" bg-dark w-100 text-light text-center position-absolute p-2" style="bottom: 0; ">Are you sure you want to <b class="text-danger"> DELETE</b> 
	<b class="text-capitalize"> <?php 
	echo $user['name'];
	?>   
	</b> 
	
	permanently?
<a href="delete.php?del_msg=<?php echo $user['id']; ?>"><button class="btn-success btn">Yes</button></a>
<span id="clear<?php echo $user['id']; ?>"><button class="btn-danger btn">No</button></span>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $("#del<?php echo $user['id']; ?>").click(function(){
  $("#fetch<?php echo $user['id']; ?>").toggle("slow");
  })
  $("#clear<?php echo $user['id']; ?>").click(function(){
  $("#fetch<?php echo $user['id']; ?>").hide("slow"); 
})
})                     
</script>
<?php } ?>

<!---------------- Modal Viewing Messages ------------->
<?php 
$u_sql = "SELECT * FROM messages";
$u_query = mysqli_query($connect, $u_sql);
$n = 1;
while ($user = mysqli_fetch_array($u_query)) {
$id = $user['id'];

?>

<div id="fetcher<?php echo $user['id']; ?>" class="w-100 position-absolute position-fixed" style="background-color: rgba(0,0,0,0.5); min-height: 100%; top: 0; z-index: 2; display: none;">
	<div class="col-md-6 m-auto p-3 shadow">
		<span id="clearer<?php echo $user['id']; ?>" class="fas fa-times text-danger float-right fa-2x"></span>

	<div class="mt-5 shadow p-3" style="background-color: ghostwhite;">
	<h4 class="text-center font-weight-bold">View Message</h4>
	<hr>
	
	
	<div class="row ml-0 mr-0 mt-3">
	<div class="col-md-6 text-center text-capitalize">
		<b>Sender :</b> 
		<span><?php echo $user['name'] ?></span>
	
	</div>

	<div class="col-md-6 text-center">
	<b>E-mail :</b>
	<a href="mailto:<?php echo $user['email'] ?>">	<?php echo $user['email'] ?></a>
	
	</div>
	

	<div class="col-md-12 mt-3 border p-3 rounded">
	
	<?php echo $user['message'] ?>
	</div>
	</div>
	<span class="float-right mt-3">
	<i>Sent on: <?php echo $user['date'] ?></i>
	</span>
	<div class="clearfix"></div>

	</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $("#update<?php echo $user['id']; ?>").click(function(){
  $("#fetcher<?php echo $user['id']; ?>").toggle("slow");
  })
  $("#clearer<?php echo $user['id']; ?>").click(function(){
  $("#fetcher<?php echo $user['id']; ?>").hide("slow"); 
})
})                     
</script>
<?php } ?>
</body>
</html>