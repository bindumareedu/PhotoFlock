<?php  //Start the Session

// $connection = pg_connect("host=ec2-54-243-197-120.compute-1.amazonaws.com dbname=d177pv40du4u9d port=5432 user=gtmfzbleodjebq password=54f79a8b0a5678a8a0660c1ebc9ec9fdb17ccb2fc8df295ffec9e30325ed9220");
//  if (!$connection){
//      echo ('Could not connect: ' );
//  }
//  else{
//    echo "connected";
//  }

require('connect.php');

if (isset($_GET['email']) and isset($_GET['pass']) and isset($_GET['lname']) and isset($_GET['fname']) and isset($_GET['pnum']))
{
//3.1.1 Assigning posted values to variables.


$username = $_GET['email'];
$password = $_GET['pass'];
$lname=$_GET['lname'];
$fname=$_GET['fname'];
$pnum=$_GET['pnum'];
$hashpwd= sha1("$password");
$isActive='true';
//3.1.2 Checking the values are existing in the database or not
$check="SELECT * FROM public.users_info WHERE email='$username'";
$checkresult=$result = pg_query($connection, $check) or  die('Query failed: ' . pg_last_error());
if(pg_num_rows($checkresult)<1){
$query = "INSERT INTO public.users_info(email,pass,isactive,fname,lname,pnum) VALUES ('$username','$hashpwd','$isActive','$fname','$lname','$pnum')";
$result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
if($result){
  //          $smsg = "User Created Successfully.";
//header('Location: http://ella.ils.indiana.edu/~smareedu/project/mail.php');
$subject = "Activate your account at Photoflock";
$link="<a href='http://ella.ils.indiana.edu/~smareedu/project/login.html'>link</a>";
$txt = "Hello $lname $fname," . "\r\n" . "Welcome to Photoflock. Please click this http://ella.ils.indiana.edu/~smareedu/project/pages-profile.php to activate your account" . "\r\n\n" . "-Photoflock Team" ;
$headers = "From: photoflock@photoflock.com" . "\r\n" ;
mail($username,$subject,$txt,$headers);
header('Location: http://ella.ils.indiana.edu/~smareedu/project/registersuccess.html');

 }
 else {
   echo "Error!!";
 }
}
  else {
          header('Location: http://ella.ils.indiana.edu/~smareedu/project/registerfail.html');
        }
}
//3.1.4 if the user is logged in Greets the user with message
// if (isset($_SESSION['Username'])){
// header('Location: http://ella.ils.indiana.edu/~smareedu/login/home.php');
// exit;
//  }
pg_close($connection);
?>
