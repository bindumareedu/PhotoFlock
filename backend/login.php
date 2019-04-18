<?php  //Start the Session
session_start();
  require('connect.php');

 // $connection = pg_connect("host=db.ils.indiana.edu dbname=smareedu port=5433 user=smareedu password=V482e5A7");
 // if (!$connection){
 //     or die('Could not connect: ' . pg_last_error());
 // }
 // else{
 //   echo"connected";
 // }
//3. If the form is submitted or not.
//3.1 If the form is submitted


if (isset($_GET['email']) and isset($_GET['pass'])){
//3.1.1 Assigning posted values to variables.
$username = $_GET['email'];
$password = $_GET['pass'];
//3.1.2 Checking the values are existing in the database or not
 $query = "SELECT * FROM public.users_info WHERE username='$username' and pass='$password'";
$result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
 $count = pg_num_rows($result);
// //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count >= 1){
$_SESSION['username'] = $username;

}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
  // I'm re-directing it to index page for now.
  // But needs to be pointed to DASHBOARD.
header('Location: http://ella.ils.indiana.edu/~smareedu/project/index.html');
exit;
 }
 else{
   echo "something went wrong, please try again!";
 }

?>
