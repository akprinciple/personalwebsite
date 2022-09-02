<?php  
include 'inc/session.php';
if (isset($_GET['edit']) && isset($_GET['position'])) {
$id = $_GET['edit'];
if (isset($_POST['update'])) {
$position = mysqli_real_escape_string($connect, $_POST['position']);
$company = mysqli_real_escape_string($connect, $_POST['company']);
$roles = mysqli_real_escape_string($connect, $_POST['roles']);
$date = date('d/M/Y');
$ind_sql = "UPDATE experience SET position = '{$position}', company = '{$company}', roles = '{$roles}', date = '{$date}' WHERE id = '{$id}'";
$ind_query = mysqli_query($connect, $ind_sql);
if ($ind_query) {
	header("location: experience.php");
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Experience</title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
<div class="row ml-0 mr-0">
<div class="col-md-10">
<?php 

$sql = "SELECT * FROM experience WHERE id = '{$id}'";
$query = mysqli_query($connect, $sql);
while ($user=  mysqli_fetch_array($query)) {
		
		

?>
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
	<button type="submit" name="update" class="btn btn-success mt-4 w-100">update</button>
	</div>
	<div class="clearfix"></div>
	
	
	</form>

	</div>

<?php }} ?>
</div>
<?php include 'inc/sidebar.php'; ?>
</div>
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