<?php 
include 'inc/config.php'; 
$msg = "";
if (isset($_POST['submit'])) {
$name = mysqli_real_escape_string($connect, $_POST['name']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$message = mysqli_real_escape_string($connect, $_POST['message']);
$date = date('h:i:sa d/M/Y');
$sql = "INSERT INTO messages (name, email, message, date) VALUES ('$name', '$email', '$message', '$date')";
$query = mysqli_query($connect, $sql);
if ($query) {
$msg = "<div class='alert-primary text-center p-2 rounded'>Message Successfully Delivered</div>";
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php 
$sql = "SELECT text from profile WHERE id = 6";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['text'];
 ?> Profile</title>
	<?php include 'inc/link.php'; ?>
     <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
     
</head>
<body class="bg-orange">
<div class="col-md-10 m-auto">
	<!-- Header -->
	<header class="nav float-left">
	<a href="default.php" class="nav-link text-light">Home</a>
	<a href="#about" class="nav-link text-light">About</a>
	<a href="#service" class="nav-link text-light">Services</a>
	<a href="#experience" class="nav-link text-light">Education & Experience</a>
	<a href="#contact" class="nav-link text-light">Contact me</a>
	</header>
	<div class="nav float-right">
	<a href="tel:<?php 
$sql = "SELECT link from links WHERE id = 1";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['link'];
 ?>" class="nav-link text-light fas fa-phone"></a>
	<a href="<?php 
$sql = "SELECT link from links WHERE id = 2";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['link'];
 ?>" class="nav-link text-light fab fa-facebook"></a>
	<a href="<?php 
$sql = "SELECT link from links WHERE id = 3";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['link'];
 ?>" class="nav-link text-light fab fa-twitter"></a>
	<a href="<?php 
$sql = "SELECT link from links WHERE id = 5";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['link'];
 ?>" class="nav-link text-light fab fa-linkedin"></a>
	<a href="mailto:<?php 
$sql = "SELECT link from links WHERE id = 4";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['link'];
 ?>" class="nav-link text-light fab fa-google"></a>
	</div>
	<div class="clearfix"></div>
	<hr class="bg-white mt-0">
	<h3 class="text-light mt-2 text-center shadow"><?php 
$sql = "SELECT text from profile WHERE id = 6";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['text'];
 ?>'s Profile</h3>
	
	<div class="clearfix"></div>
	<div style="background-image: url('images/<?php 
$sql = "SELECT text from profile WHERE id = 5";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['text'];
 ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
	<div class="pb-5" style="background-color: rgba(0, 0, 0, 0.5);">
	<div class="col-md-8 m-auto">
	<h1 class="pt-5 text-light mb-0">Hi. I'm	</h1>
	<h1 class="font-weight-bold text-light mt-0 mb-3">Web Developer</h1>
	<span class="col-md-8 text-light text-justify p-0 mb-3">
	<?php 
$sql = "SELECT text from profile WHERE id = 1";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['text'];
 ?>
	</span>
	<a class="pt-2" href="#about" ><span class="p-2 border font-weight-bold text-light mb-3">Read More</span></a>
	</div>
	</div>
	</div>
	<div class="row bg-white ml-0 mr-0">
	<div class="p-3 col-md-8">
	<h1 id="about" class="font-weight-light text-center">About Me___</h1>
	<span class="text-justify p-3">
	<?php 
$sql = "SELECT text from profile WHERE id = 2";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['text'];
 ?>
	</span>
	<h1 class="font-weight-light text-center">Career Aim___</h1>
	<p class="text-justify p-3">
	<?php 
$sql = "SELECT text from profile WHERE id = 3";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['text'];
 ?>
	</p>
	<center>
	<a href="uploads/<?php 
$sql = "SELECT link from links WHERE id = 6";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['link'];
 ?>" download="<?php 
$sql = "SELECT link from links WHERE id = 6";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['link'];
 ?>" class="text-light"><button class="p-2 border-0 text-light btn bg-orange" style="border-radius: 0; background-color: orange">Download Resume</button></a>

	<a href="#contact" class="text-light"><button class="p-2 border-0 text-light btn darkorange" style="border-radius: 0; background-color: darkorange">Hire Me</button></a>
	</center>
	</div>
	<div class="p-5 col-md-4">
	<img src="images/<?php 
$sql = "SELECT text from profile WHERE id = 4";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['text'];
 ?>" class="float-right mt-3 w-100">
	</div>
	</div>
	
	<div style="" class="bg-white">
		<div style=" transform: skewY(-2deg); background-color: ghostwhite;">
		<h1 class="pl-5 pt-5 font-weight-light" id="service" style="transform: skewY(2deg);">Services___</h1>
	
	<div class="row ml-0 mr-0 p-3" style="transform: skewY(2deg);">
		<div class="col-md-4 p-3">
		<div class="bg-white text-center p-2 shadow">
			<i class="fas fa-map-marked p-2 fa-2x rounded-circle mb-3 mt-3" style="color: orange; border: 1px solid orange;"></i>
		<h4>Designing</h4>
		<p>
		Giving you working and beautiful Design for your web interface.
		</p>
		</div>
		</div>
		<div class="col-md-4 p-3">
		<div class="bg-white text-center p-2 shadow">
			<i class="fab fa-connectdevelop p-2 fa-2x rounded-circle mb-3 mt-3" style="color: orange; border: 1px solid orange;"></i>
		<h4>Developing</h4>
		<p>
		Giving you working and beautiful Design for your web interface.
		</p>
		</div>
		
		</div>
		<div class="col-md-4 p-3">
		<div class="bg-white text-center p-2 shadow">
		<i class="fas fa-text-width p-2 fa-2x rounded-circle mb-3 mt-3" style="color: orange; border: 1px solid orange;"></i>
		<h4>Responsiveness</h4>
		<p>
		Ability to responsive web pages to suit all screen sizes.
		</p>
		</div>
		</div>
		</div>
	</div>
	<div>
	</div>	
	</div>
	<div class="p-5 bg-white">
		<h1 class="font-weight-light">My Skills___</h1>
		<div class="row">
		<?php 
$sql = "SELECT * FROM skills";
$query = mysqli_query($connect, $sql);
$n = 1;
while ($show = mysqli_fetch_array($query)){
$v = $n++;
 ?>
		<div class="col-md-6 mt-3">
		<span class="font-weight-bold"><?php echo $show['skill']. ' - '.$show['level']; ?> </span>
		<div class="p-1 
		<?php if($v%2){echo "bg-orange";}
		else{echo "bg-primary";}
		 ?> " style="width: <?php echo $show['level']; ?>%"></div>
		
		</div>
<?php } ?>
		<!-- <div class="col-md-6 mt-3">
		<span class="font-weight-bold">Responsive Designing - 85%</span>
		<div class="p-1 bg-orange" style="width: 85%;"></div>
		</div>
		<div class="col-md-6 mt-3">
		<span class="font-weight-bold">PHP - 85%</span>
		<div class="p-1 darkorange" style="width: 80%;"></div>
		</div>
		<div class="col-md-6 mt-3">
		<span class="font-weight-bold">Web Development - 90%</span>
		<div class="p-1 bg-info" style="width: 90%"></div>
		</div> -->
	</div>
	</div>
	<div style="background-color: ghostwhite;" class="p-2">
		<h1 id="experience" class="font-weight-light mb-3">Education & Experience___</h1>
		<center>
		<a href="#education" class="text-light">
		<button class="p-2 border-0 text-light btn bg-orange" style="background-color: orange; border-radius: 0;">Education</button>
		</a>
		<a href="#experiences" class="text-light">
		<button class="p-2 border-0 text-light btn" style="background-color: darkorange; border-radius: 0;">Experience</button>
		</a>
		</center>
		<div class="row ml-0 mr-0 p-3" id="education">
		<?php 
$sql = "SELECT * FROM education ORDER BY year DESC";
$query = mysqli_query($connect, $sql);
$n = 1;
while ($show = mysqli_fetch_array($query)){
$v = $n++;

 ?>
		<div class="col-md-6 mt-2">
		<h4><?php echo $show['degree']; ?></h4>
		<div class="p-1 col-md-12 text-light <?php if($v%2){echo "bg-orange";}else{echo "darkorange";} ?> "> - <?php echo $show['institution']; ?> - <?php echo $show['year']; ?></div>
		<p><?php echo $show['about']; ?></p>
		</div>
<?php } ?>
<!-- <h4>Web Design and Development</h4>
		<div class="p-1 col-md-12 text-light bg-orange">- Globaltechs World Computer Institute- 2019</div>
		<p>I was trainned in Globaltechs World Computer Institute on web design and web development using PHP programming language. </p>
		</div> -->
		<!-- <div class="col-md-6 mt-2">
		<h4>National Youth Service Corps</h4>
		<div class="p-1 col-md-12 text-light bg-orange">- Lagos State- 2019</div>
		<p>I served as a youth corps in Hope and Grace Schools, Ikorodu, Lagos State between 2018 and 2019. </p>
		</div>

		<div class="col-md-6 mt-2">
		<h4>Project Managing Professional (PMP)</h4>
		<div class="p-1 col-md-12 text-light bg-orange">- PMKONNECT CONSULT- 2019</div>
		<p>I underwent trainning at PMKONNECT CONSULT on Project Management between the year 2018 and 2019 </p>
		</div>

		<div class="col-md-6 mt-2">
		<h5>Health, Safety and Environment Management Studies</h5>
		<div class="p-1 col-md-12 text-light bg-orange">- PMKONNECT CONSULT- 2019</div>
		<p>I earned a certificate in Health, Safety and Environment Management Studies in 2019 with PMKONNECT CONSULT</p>
		</div>

		<div class="col-md-6 mt-2">
		<h4>Bachelor's Degree</h4>
		<div class="p-1 col-md-12 text-light bg-orange">- University of Ibadan - 2017</div>
		<p>Studied Education/Mathematics at the university of Ibadan and graduated with second class upper degree in 2017.</p>
		</div>

		<div class="col-md-6 mt-2">
		<h4>Senior Secondary Certificate Examination</h4>
		<div class="p-1 col-md-12 text-light bg-orange">- Educational Legacy College - 2013</div>
		<p>Graduated from Seconadary in the year 2013.</p>
		</div> -->
		</div>
		<div class="bg-white">
		<h3 id="experiences">Work Experience</h3>
		<hr class="bg-orange">
		<div class="row ml-3 mr-0">
<?php 
$sql = "SELECT * FROM experience";
$query = mysqli_query($connect, $sql);
$n = 1;
while ($show = mysqli_fetch_array($query)){
$v = $n++;

 ?>
		<div class="col-md-6">
		<div>
		<h4><?php echo $show['position']; ?></h4>
		<div class="<?php if($v%2){echo "bg-orange";}else{echo "darkorange";} ?> p-1 text-light">
		- <?php echo $show['company']; ?>
		</div>
		<?php echo $show['roles']; ?>
				
		</div>
		</div>
<?php } ?>
		<!-- <div class="col-md-6">
		<div>
		<h4>Programming and Mathematics teacher</h4>
		<div class="darkorange p-1 text-light">
		- Fidelity Motessori School & College, Surulere Estate, Ikorodu.  
		</div>
		<ul>
		<li>Developing and local hosting of of web applications for collection of assignments, posting and checking of results.</li>
		<li>Tutoring of learners on web programming and Mathematics.</li>
		<li>Management of school’s website and uploading of results.</li>
		<li>Uploading of examination questions for computer based test.</li>
		<li>Teaching and marking of assignments.</li>
		<li>Resolving issues and conflicts from parents.</li>
		<li>Taking of students' attendance and marking of notes.</li>
		</ul>		
		</div>
		</div>

		<div class="col-md-6">
		<div>
		<h4>Web Development Trainner</h4>
		<div class="darkorange p-1 text-light">
		- Exploitechs Solutions, Ikorodu, Lagos. 
		</div>
		<ul>
		<li>Learning and teaching of web programming. </li>
		<li>Developing web applications.</li>
		</ul>		
		</div>
		</div>
 -->
		</div> 
		</div>
	</div>
	<div class="p-3">
		<h1 id="contact" class="font-weight-light text-light">Get in touch___</h1>
		<?php echo $msg; ?>
		<form method="post" enctype="multipart/form-data">
			<div class="row">
			<div class="col-md-6 form-group text-light">
			<label class="font-weight-bold">Name :</label>
			<input type="text" required="" name="name" placeholder="Enter Your Name" class="outline w-100 p-2 border-0 text-light" style="background-color: darkorange">

			<label class="font-weight-bold mt-3">Email :</label>
			<input required="" type="email" name="email" placeholder="Enter Your Email" class="outline w-100 p-2 border-0 text-light" style="background-color: darkorange">
		</div>
		<div class="col-md-6 mb-3">
			<label class="font-weight-bold text-light">Send a Message</label>
			<textarea required="" name="message" class="outline w-100 p-2 border-0 text-light h-75"  style="background-color: darkorange" placeholder="Send us a Message"></textarea>
			<button class="btn w-100 text-light shadow" style="background-color: darkorange;" type="Submit" name="submit">Submit</button>
		</div>
		</div>
		</form>
	</div>
	<hr class="mt-3 bg-white">
	<div class="text-light text-center p-2">
		&copy; <?php echo date('Y'); ?> <?php 
$sql = "SELECT text from profile WHERE id = 6";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['text'];
 ?>
	</div>
</div>
</body>
</html>
<!-- rgba(255, 165, 0, 0.5) -->