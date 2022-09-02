<?php  
ob_start();
include 'inc/session.php';
$msg = "";
$position = $company = $roles = "";

if (isset($_POST['submit'])) {
	$position = mysqli_real_escape_string($connect, $_POST['position']);
	$company = mysqli_real_escape_string($connect, $_POST['company']);
	$roles = mysqli_real_escape_string($connect, $_POST['roles']);
	$date = date('d/M/Y');

	$select = "SELECT * FROM experience WHERE position = '{$position}' && company = '{$company}'";
	$ins = mysqli_query($connect, $select);
	$count = mysqli_num_rows($ins);
	if ($count > 0) {
	$msg = "<div class='alert-danger text-center p-2 rounded'>Details already Existing</div>";	
	}
	else{
	$sql = "INSERT INTO experience (position, company, roles, date) VALUES ('$position', '$company', '$roles', '$date')";
	$query = mysqli_query($connect, $sql);
	if ($query) {
		$msg = "<div class='alert-primary text-center p-2 rounded'> Success</div>";
	$position = $company = $roles = "";
		

	}
	else{
		echo "<script>alert('Error! Try Again.')";
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Education Details</title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
<div class="row ml-0 mr-0">
	<div class="col-md-10">
	<h2 class="mt-3 text-light">Details on Experience</h2>

	<hr class="bg-white mb-5">
	<div class="float-right border-bottom border-top shadow p-2 darkorange mb-3">
	<span title="Add Qualification" class="fas mr-2 fa-plus text-light pointer" id="add"></span>
	<a href="" class="text-light fas fa-power-off" title="Refresh"></a>

	</div>
	<div class="clearfix"></div>
<?php echo $msg; ?>
<!----------------- Form for Adding Education Details ---------------------->
	<div class="col-md-9 m-auto p-3 text-orange bg-white" id="showcase" style="display: none;">
	<form method="post" enctype="multipart/form-data">
	<h4 class="text-orange  font-weight-bold">Add Experience</h4>
	<hr class="bg-orange">


	<div class="form-group">
	<label class="font-weight-bold">Position :</label>
	<input type="text" required="" name="position" placeholder="Enter Your Position" value="<?php echo $position; ?>" class="form-control">

	<label class="font-weight-bold mt-3">Organization :</label>
	<input type="text" required="" value="<?php echo $company; ?>" name="company" placeholder="Enter the name of the Organization" class="form-control">
	
	<label class="font-weight-bold mt-3">Roles</label>
	<textarea name="roles" placeholder="Input Your Roles" id="textarea"><?php echo $roles; ?></textarea>

	
	</div>
	<button type="submit" name="submit" class="col-md-4 darkorange p-2 border-0 mb-3 outline text-light float-right btn">Submit</button>
	<div class="clearfix"></div>
	</form>
	</div>
<!---------------- Table for Work Experience ------------------------->
<h4 class="text-light">Manage Work Experience</h4>
	<table class="table table-striped table-bordered text-center bg-white">
		<thead>
			<tr>
				<th>S/N</th>
				<th>Position</th>
				<th>Organiztion</th>
				<th>Roles</th>
				<th>Last Update</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php  
		$s_sql = "SELECT * FROM experience";
		$s_query = mysqli_query($connect, $s_sql);
		$n = 1;
		while ($row = mysqli_fetch_array($s_query)) {
			
		

		?>
		<tr>
			<td><?php echo $n++; ?></td>
			<td><?php echo $row['position']; ?></td>
			<td><?php echo $row['company']; ?></td>
			<td class="text-left"><?php echo $row['roles']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td>
			<!-- <span id="update<?php echo $row['id']; ?>" class="fas fa-pen pointer"></span> -->
			
			<a href="experience.php?edit=<?php echo $row['id']; ?>&&position=<?php echo $row['position']; ?>" class="fas fa-pen text-dark"></a>
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
 $u_sql = "SELECT * FROM experience";
$u_query = mysqli_query($connect, $u_sql);
$n = 1;
while ($user = mysqli_fetch_array($u_query)) {
?>
<div id="fetch<?php echo $user['id']; ?>" class="w-100 position-absolute position-fixed" style="background-color: rgba(0,0,0,0.5); min-height: 100%; top: 0; z-index: 2; display: none;">
<div class=" bg-dark w-100 text-light text-center position-absolute p-2" style="bottom: 0; ">Are you sure you want to <b class="text-danger"> DELETE</b> the report for  
	<b class="text-capitalize"> <?php 
	echo $user['position'];
	?>   Details
	</b> 
	
	permanently?
<a href="delete.php?del_experience=<?php echo $user['id']; ?>"><button class="btn-success btn">Yes</button></a>
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

<!---------------- Modal Editing Qualifications ------------->

<?php
if (isset($_GET['edit']) && isset($_GET['position'])) {
$id = $_GET['edit'];
$u_sql = "SELECT * FROM experience WHERE id = '{$id}'";
$u_query = mysqli_query($connect, $u_sql);
$n = 1;

while ($user = mysqli_fetch_array($u_query)) {


?>

<div class="w-100 position-absolute position-fixed" style="background-color: rgba(0,0,0,0.8); min-height: 100%; top: 0; z-index: 2;">
	<div class="col-md-10 m-auto p-3 shadow">
		<a href="experience.php" class="fas fa-times text-danger float-right fa-2x"></a>

	<div class="mt-5 shadow p-3" style="background-color: ghostwhite;">
	<h4 class="text-center font-weight-bold">Edit Experience</h4>
	<hr>
	
	<form method="post" enctype="multipart/form-data">
	<div class="row">
	<div class="col-md-6">
	<label class="">Position</label>
	<div class="form-group ">
 	<input type="text" required="required" name="position" value="<?php echo $user['position'] ?>" class="text-center form-control">
	</div>
	</div>

	<div class="col-md-6">
	<label>Organization</label>
	<div class="form-group">
 	<input type="text" required="required" name="company" value="<?php echo $user['company'] ?>" class="text-center form-control">
	</div>
	</div>

	<div class="col-md-12">
	<label>About</label>
	<div class="form-group">
 	<textarea name="roles" row="7" id="area" class="form-control"><?php echo $user['roles'] ?></textarea>
	</div>
	</div>
	</div>
	<div class="col-md-6 float-right">
	<button type="submit" name="ind_update" class="btn btn-success mt-4 w-100">update</button>
	</div>
	<div class="clearfix"></div>
	
	
	</form>

	</div>
	</div>
<?php 

// Code to update Experience on Modal
if (isset($_POST['ind_update'])) {
$position = mysqli_real_escape_string($connect, $_POST['position']);
$company = mysqli_real_escape_string($connect, $_POST['company']);
$roles = mysqli_real_escape_string($connect, $_POST['roles']);
$date = date('d/M/Y');
$ind_sql = "UPDATE experience SET position = '{$position}', company = '{$company}', roles = '{$roles}', date = '{$date}' WHERE id = '{$id}'";
$ind_query = mysqli_query($connect, $ind_sql);
if ($ind_query) {
	header("location: experience.php");
}
else{
	echo "<script>alert('Error! Try Again.')</script>";
}
}
?>
</div>

<?php }} ?>

</body>
</html>
<!----------------- Script for textarea tinymce  ---------------------------->
<script src='../tinymce/js/tinymce/tinymce.min.js'></script>
<script type="text/javascript">
	
tinymce.init({
    selector: '#area',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
    link_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_class_list: [
        { title: 'None', value: '' },
        { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    file_picker_callback: function (callback, value, meta) {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        }
    
        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        }
    
        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        }
    },
    templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 250,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    contextmenu: "link image imagetools table",
});
</script>


 <script type="text/javascript">
	
tinymce.init({
    selector: '#textarea',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
    link_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_class_list: [
        { title: 'None', value: '' },
        { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    file_picker_callback: function (callback, value, meta) {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        }
    
        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        }
    
        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        }
    },
    templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 350,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    contextmenu: "link image imagetools table",
});
</script>

