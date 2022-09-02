<?php 
ob_start(); 
include 'inc/session.php';
$skill = $level = "";
$msg = "";
if (isset($_POST['submit'])) {
	$skill = mysqli_real_escape_string($connect, $_POST['skill']);
	$level = mysqli_real_escape_string($connect, $_POST['level']);
	$date = date('d/M/Y');
$select = "SELECT * FROM skills WHERE skill = '{$skill}'";
	$ins = mysqli_query($connect, $select);
	$count = mysqli_num_rows($ins);
	if ($count > 0) {
	$msg = "<div class='alert-danger text-center p-2 rounded'>Skill already Existing</div>";	
	}
	else{
	$sql = "INSERT INTO skills (skill, level, date) VALUES ('$skill', '$level', '$date')";
	$query = mysqli_query($connect, $sql);
	if ($query) {
		$msg = "<div class='alert-primary text-center font-weight-bold p-2 rounded'> Success</div>";
	$skill = $level = "";
		

	}
	else{
		echo "<script>alert('Error! Try Again')";
	}
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Skills</title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
<div class="row ml-0 mr-0">
<div class="col-md-10">
<h2 class="mt-3 text-light">Skills</h2>
<hr class="bg-white mb-5">
<div class="float-right border-bottom border-top shadow p-2 darkorange mb-3">
<span title="Add a New Skill" class="fas mr-2 fa-plus text-light pointer" id="add"></span>
<a href="" class="text-light fas fa-power-off" title="Refresh"></a>

</div>
	<div class="clearfix"></div>
<?php echo $msg; ?>
<!----------------- Form for Adding Skills ---------------------->
	<div class="col-md-9 m-auto p-3 text-orange bg-white" id="showcase" style="display: none;">
	<form method="post" enctype="multipart/form-data">
	<h4 class="text-orange  font-weight-bold">Add Skills</h4>
	<hr class="bg-orange">


	<div class="form-group">
	<label class="font-weight-bold">Skill</label>
	<input type="text" required="" name="skill" placeholder="Enter Your Skill" value="<?php  $position; ?>" class="form-control">

	<label class="font-weight-bold mt-3">Level</label>
	<input type="number" required="" value="<?php  $company; ?>" name="level" placeholder="Enter your level in percentage" class="form-control">
	
	</div>
	<button type="submit" name="submit" class="col-md-6 darkorange p-2 border-0 mb-3 outline text-light float-right btn">Submit</button>
	<div class="clearfix"></div>
</form>
</div>


<!---------------- Table for Work Experience ------------------------->
<h4 class="text-light">Manage Skills</h4>
	<table class="table table-striped table-bordered text-center bg-white">
	<thead>
	<tr>
	<th>S/N</th>
	<th>Skills</th>
	<th>Rating(%)</th>
	<th>Last Update</th>
	<th>Actions</th>
	</tr>
	<thead>
	<tbody>
	<?php  
	$s_sql = "SELECT * FROM skills";
	$s_query = mysqli_query($connect, $s_sql);
	$n = 1;
	while ($row = mysqli_fetch_array($s_query)) {
			
		

	?>
	<tr>
	<td><?php echo $n++; ?></td>
	<td><?php echo $row['skill']; ?></td>
	<td><?php echo $row['level']; ?></td>
	<td><?php echo $row['date']; ?></td>
	<td>
	<span id="update<?php echo $row['id']; ?>" class="fas fa-pen pointer"></span>
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
 $u_sql = "SELECT * FROM skills";
$u_query = mysqli_query($connect, $u_sql);
$n = 1;
while ($user = mysqli_fetch_array($u_query)) {
?>
<div id="fetch<?php echo $user['id']; ?>" class="w-100 position-absolute position-fixed" style="background-color: rgba(0,0,0,0.5); min-height: 100%; top: 0; z-index: 2; display: none;">
<div class=" bg-dark w-100 text-light text-center position-absolute p-2" style="bottom: 0; ">Are you sure you want to <b class="text-danger"> DELETE</b> the report for  
	<b class="text-capitalize"> <?php 
	echo $user['skill'];
	?>  
	</b> 
	
	permanently?
<a href="delete.php?del_skill=<?php echo $user['id']; ?>"><button class="btn-success btn">Yes</button></a>
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



<!---------------- Modal Editing Skills ------------->
<?php 
$u_sql = "SELECT * FROM skills";
$u_query = mysqli_query($connect, $u_sql);
$n = 1;
while ($user = mysqli_fetch_array($u_query)) {
$id = $user['id'];

?>

<div id="fetcher<?php echo $user['id']; ?>" class="w-100 pt-5 position-absolute position-fixed" style="background-color: rgba(0,0,0,0.5); min-height: 100%; top: 0; z-index: 2; display: none;">
	<div class="col-md-6 m-auto p-3">
		<span id="clearer<?php echo $user['id']; ?>" class="fas fa-times text-danger float-right fa-2x"></span>

	<div class="mt-5 shadow p-3" style="background-color: ghostwhite;">
	<h4 class="text-center font-weight-bold">Edit Skill</h4>
	<hr>
	
	<form method="post" enctype="multipart/form-data">
	<div class="">
	<div class="">
	<label class="">Skill</label>
	<div class="form-group ">
 	<input type="text" required="required" name="skill" value="<?php echo $user['skill'] ?>" class="text-center form-control">
	</div>
	</div>

	<div class="">
	<label>Level</label>
	<div class="form-group">
 	<input type="text" required="required" name="level" value="<?php echo $user['level'] ?>" class="text-center form-control">
	</div>
	</div>

	
	
	</div>


	<button type="submit" name="ind_update<?php echo $id; ?>" class="btn btn-success float-right col-md-6">update</button>
	<div class="clearfix"></div>
	
	</form>

	</div>
	</div>
<?php 

// Code to update Scores on Modal
if (isset($_POST['ind_update'.$id])) {
$skill = mysqli_real_escape_string($connect, $_POST['skill']);
$level = mysqli_real_escape_string($connect, $_POST['level']);

$date = date('d/M/Y');
$ind_sql = "UPDATE skills SET skill = '{$skill}', level = '{$level}',  date = '{$date}' WHERE id = '{$user["id"]}'";
$ind_query = mysqli_query($connect, $ind_sql);
if ($ind_query) {
	header("location: skills.php");
}
}
?>
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