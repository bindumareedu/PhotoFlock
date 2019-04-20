<?php  

    session_start();
    require('connect.php');

    if (isset($_GET['username']) and isset($_GET['Name']) and isset($_GET['Subject']) and isset($_GET['Email'])){
        //3.1.1 Assigning posted values to variables.
        $photographer = $_GET['username'];
        $customer = $_GET['Name'];
        $customer_email = $_GET['Email'];
        $msg_subject = $_GET['Subject'];

        if(isset($_GET['Message'])){
            $msg = $_GET['Message'];
        }

        // echo $username;

        $query = "INSERT INTO public.messages(photographer_id,guest_email,guest_name,message_subject,message_body) VALUES ('$photographer','$customer','$customer_email','$msg_subject','$msg')";
        $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
        if($result){
            // $response_array['status'] = 'success'; 
            echo 'success';
        }
        else {
            // $response_array['status'] = 'error';
            echo 'error';
        }
        // header('Content-type: application/json');
        // echo json_encode($response_array);
        // pg_close($connection);
    }
?>
