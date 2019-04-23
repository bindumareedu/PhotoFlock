<?php
require("connect.php");

if(isset($_POST['but_upload']) and isset($_POST['username'])){

  $photographer = $_POST['username'];
//   $category = $_POST['category'];
//   $tags = $_POST['tags'];
  $name = $_FILES['file']['name'];
  $target_dir = "../profile/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if(in_array($imageFileType,$extensions_arr) ){
      
      // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
     chmod($target_dir.$name, 0755);
     // Insert record
     $query = "UPDATE public.users_info SET profilepic='$name' WHERE email = '$photographer'";
     $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
        // if($result){
        //     echo 'success';
        // }
        // else {
        //     echo 'error';
        // }
    
    header('Location:../profile-photo.php'); 

  }

}
header('Location:../profile-photo.php'); 
pg_close($connection);
?>
