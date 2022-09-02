<?php 

    session_start();
  include('../inc/config.php');
    $user_check = $_SESSION['id'];

    $ses_sql = mysqli_query($connect, "SELECT * FROM user WHERE id = '$user_check'");
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    // $login_session = $row['id'];

    if (!isset($_SESSION['id'])) {
      header("location: login.php");

    }
     

  //   $_SESSION['firstname'] = $row['firstname'];
		// $_SESSION['lastname'] = $row['lastname'];
		// $_SESSION['email'] = $row['email'];
		// $_SESSION['gender'] = $row['gender'];
		// $_SESSION['phone'] = $row['phone'];
		// $_SESSION['address'] = $row['address'];
		// $_SESSION['nationality'] = $row['nationality'];
		// $_SESSION['date'] = $row['date'];

        // $_SESSION['username'] = $row['username'];
               ?>