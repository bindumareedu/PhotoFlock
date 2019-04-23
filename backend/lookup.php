<?php
      require('connect.php');

      $data = $_GET['search'];

      $query="SELECT * FROM imagestore WHERE (photographer_id like '%".$data."%') or (category like '%".$data."%') or (tags like '%".$data."%')";
      $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());

      if($result){
            echo "success";
      }

      else {
            echo "error";
      }

      pg_close($connection);

 ?>
