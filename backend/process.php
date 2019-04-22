<?php require('connect.php');

  $email = $_GET['email'];;
  if (isset($_GET['email'];)) {

  	$query = "SELECT * FROM users_info WHERE email='$email'";
  	$result = pg_query($connection, $query);
  	$count = pg_num_rows($result);

  	if ($count> 0) {
  	  $name_error = "Sorry, An account exists with this email ID";
  	}
  }
  pg_close($connection);
 ?>
