<?php 
include 'inc/session.php';
if (isset($_GET['del_education'])) {
	$id = $_GET['del_education'];

	$sql = "DELETE FROM education WHERE id = '{$id}'";
	$query = mysqli_query($connect, $sql);
	header('location: education.php');
}elseif (isset($_GET['del_experience'])) {
	$id = $_GET['del_experience'];

	$sql = "DELETE FROM experience WHERE id = '{$id}'";
	$query = mysqli_query($connect, $sql);
	header('location: experience.php');
}elseif (isset($_GET['del_skill'])) {
	$id = $_GET['del_skill'];

	$sql = "DELETE FROM skills WHERE id = '{$id}'";
	$query = mysqli_query($connect, $sql);
	header('location: skills.php');
}elseif (isset($_GET['del_msg'])) {
	$id = $_GET['del_msg'];

	$sql = "DELETE FROM messages WHERE id = '{$id}'";
	$query = mysqli_query($connect, $sql);
	header('location: messages.php');
}
?>