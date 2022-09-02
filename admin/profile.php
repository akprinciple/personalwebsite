<?php 
include 'inc/session.php';
$msg = ""; 
if (isset($_POST['first'])) {
	$first = mysqli_real_escape_string($connect, $_POST['b_text']);
	$p_sql = "UPDATE profile SET text = '{$first}' WHERE id = 1";
	$p_query = mysqli_query($connect, $p_sql);
	if ($p_query) {
	$msg = "<div class='alert-primary text-center p-2 rounded'>Profile Successfully Updated</div>";
	}else{
		echo "<script>alert('Error');</script>";
	}
}elseif (isset($_POST['second'])) {
	$first = mysqli_real_escape_string($connect, $_POST['about']);
	$p_sql = "UPDATE profile SET text = '{$first}' WHERE id = 2";
	$p_query = mysqli_query($connect, $p_sql);
	if ($p_query) {
	$msg = "<div class='alert-primary text-center p-2 rounded'>Profile Successfully Updated</div>";
	}else{
		echo "<script>alert('Error');</script>";
	}
}else{
	if (isset($_POST['third'])) {
	$first = mysqli_real_escape_string($connect, $_POST['career']);
	$p_sql = "UPDATE profile SET text = '{$first}' WHERE id = 3";
	$p_query = mysqli_query($connect, $p_sql);
	if ($p_query) {
	$msg = "<div class='alert-primary text-center p-2 rounded'>Profile Successfully Updated</div>";
	}else{
		echo "<script>alert('Error');</script>";
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<?php include 'inc/link.php'; ?>
</head>
<body>

<div class="row ml-0 mr-0">
	<div class="col-md-10">
	<h2 class="mt-3 text-light">Profile Update</h2>
	<hr class="bg-white">
	


	<ul class="row mr-0 ml-0 p-3 text-center font-weight-bold nav nav-tabs">
		<li class="col-md-4 p-1 active">
		<a class="text-orange" data-toggle="tab" href="#first">	
			<div class="p-2 bg-white shadow pointer">Background Image Text</div>
		</a>
		</li>
		<li class="col-md-4 p-1">
		<a class="text-orange" data-toggle="tab" href="#second">
		<div class="bg-white p-2 pointer">About Me</div>
		</a>
		</li>
		<li class="col-md-4 p-1">
		<a class="text-orange" data-toggle="tab" href="#third">
		<div class="bg-white p-2 pointer">Career Aims</div>
		</a>
		</li>
	</ul>
<?php echo $msg; ?>
	<div class="tab-content">
	<div class="tab-pane fade-in active" id="first">
		<h4 class="mb-0 mt-3 text-light">Text on Background Image</h4>
	<form method="post" enctype="multipart/form-data" class="p-2 mb-3 ">
		<textarea name="b_text" class="w-100 text-light darkorange p-2 outline border-0" required=""  id="myTextarea">
		<?php 
		$sql = "SELECT * FROM profile WHERE head = 'first'";
		$query = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_array($query)) {
		echo $row['text'];
		}
		?>
		</textarea>
		<button type="submit" name="first" class="col-md-4 float-right darkorange p-2 border-0 mb-3 outline text-light btn mt-3">Submit</button>
	</form>
	</div>

	<div class="tab-pane fade" id="second">
		<h4 class="mb-0 mt-3 text-light">About Me</h4>
	<form method="post" enctype="multipart/form-data" class="p-2 mb-3 ">
		<textarea name="about" id="textarea" class="w-100 text-light darkorange p-2 outline border-0" required="" rows="9">
		<?php 
		$sql = "SELECT * FROM profile WHERE head = 'second'";
		$query = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_array($query)) {
		echo $row['text'];
		}
		?>
		</textarea>
		<button type="submit" name="second" class="col-md-4 float-right darkorange p-2 border-0 mb-3 outline text-light btn mt-3">Submit</button>
	</form>
	</div>

	<div id="third" class="tab-pane fade">
		<h4 class="mb-0 mt-3 text-light">Career Aims</h4>
	<form method="post" enctype="multipart/form-data" class="p-2 mb-3 ">
		<textarea name="career" id="area" class="w-100 text-light darkorange p-2 outline border-0" required="" rows="9">
		<?php 
		$sql = "SELECT * FROM profile WHERE head = 'third'";
		$query = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_array($query)) {
		echo $row['text'];
		}
		?>
		</textarea>
		<button type="submit" name="third" class="col-md-4 float-right darkorange p-2 border-0 mb-3 outline text-light btn mt-3">Submit</button>
	</form>
	</div>
	</div>
	</div>
	<?php include 'inc/sidebar.php'; ?>

</div>


	</div>
</body>
</html>

<script src='../tinymce/js/tinymce/tinymce.js'></script>
<script src='../tinymce/js/tinymce/tinymce.min.js'></script>
<script type="text/javascript">
	
tinymce.init({
    selector: '#myTextarea',
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
    height: 350,
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