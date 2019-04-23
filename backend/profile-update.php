<?php  

    session_start();
    require('connect.php');

    if (isset($_GET['username']) and isset($_GET['fname']) and isset($_GET['lname']) and isset($_GET['email'])){
        $photographer = $_GET['username'];
        $fname = $_GET['fname'];
        $lname = $_GET['lname'];
        $email = $_GET['email'];
        // $msg_subject = $_GET['Subject'];

        if(isset($_GET['facebook'])){
            $facebook = $_GET['facebook'];
        }

        if(isset($_GET['twitter'])){
            $twitter = $_GET['twitter'];
        }

        if(isset($_GET['instagram'])){
            $instagram = $_GET['instagram'];
        }

        if(isset($_GET['pinterest'])){
            $pinterest = $_GET['pinterest'];
        }

        if(isset($_GET['phone'])){
            $phone = $_GET['phone'];
        }

        if(isset($_GET['title'])){
            $title = $_GET['title'];
        }

        if(isset($_GET['about'])){
            $about = $_GET['about'];
        }

        if(isset($_GET['address'])){
            $address = $_GET['address'];
        }

        if(isset($_GET['projects'])){
            $projects = $_GET['projects'];
        }

        if(isset($_GET['clients'])){
            $clients = $_GET['clients'];
        }

        if(isset($_GET['skills'])){
            $skills = json_decode(stripslashes($_GET['skills']));
        }

        if(isset($_GET['percs'])){
            $percs = json_decode(stripslashes($_GET['percs']));
        }

        // echo $username;
        
        $query = "UPDATE public.users_info SET profile_email='$email',fname = '$fname',lname = '$lname',facebook_url = '$facebook',twitter_url = '$twitter',pinterest_url = '$pinterest',instagram_url = '$instagram',pnum = '$phone',designation = '$title',about = '$about',address = '$address',projects = '$projects',clients = '$clients' WHERE email = '$photographer'";
        $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
        if($result){
            echo 'success';
        }
        else {
            echo 'error';
        }

        for($i=0; $i < count($skills); $i++){
            $query2 = "INSERT INTO public.skills(photographer_id,skill_name,strength) VALUES ('$photographer','$skills[$i]','$percs[$i]')";
            $result2 = pg_query($connection, $query2) or  die('Query failed: ' . pg_last_error());
            if($result2){
                echo 'success';
            }
            else {
                echo 'error';
            }
        }

    //     if(!empty($address)){
    //         //Formatted address
    //         $formattedAddr = str_replace(' ','+',$address);
    //         //Send request and receive json data by address
    //         $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
    //         $output = json_decode($geocodeFromAddr);
    //         //Get latitude and longitute from json data
    //         $data['latitude']  = $output->results[0]->geometry->location->lat; 
    //         $data['longitude'] = $output->results[0]->geometry->location->lng;
    //         //Return latitude and longitude of the given address
    //         if(!empty($data)){
    //             $lat= $data['latitude'] ;
    //             $lng= $data['longitude']; 
    //         }else{
    //             return false;
    //         }
    //     }else{
    //         echo "Error"; 
    //     }
    // echo "$lat";
    // // $query3="UPDATE public.users_info SET latitude='$lat',longitude='$lng' WHERE email = '$photographer'";
    // // $result3 = pg_query($connection, $query3) or  die('Query failed: ' . pg_last_error());
    // // if(!$result3){
    // //     echo 'failed';
    // // }



        pg_close($connection);
        // echo 'success';
    }
?>
