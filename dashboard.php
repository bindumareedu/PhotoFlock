<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Admin Pro Admin Template - The Ultimate Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="css/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/dashboard-style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="css/pages/dashboard.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/default-dark.css" id="theme" rel="stylesheet">


    <link href="css/sidebar.scss" rel="stylesheet">
     <!-- Favicon  -->
     <link rel="icon" href="img/core-img/favicon.ico">

     <!-- Core Style CSS -->
     <link rel="stylesheet" href="css/core-style.css">
     <link rel="stylesheet" href="style.css">
 
     <!-- Responsive CSS -->
     <link href="css/responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border" style="background-color:#f4f6f9">

    <style>
        .close-icon {
            cursor: pointer;
        }
    </style>
    
    <!-- Gradient Background Overlay -->
    <div class="gradient-background-overlay"></div>

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 h-100">
                    <div class="main-menu h-100">
                        <nav class="navbar h-100 navbar-expand-lg">
                            <!-- Logo Area  -->
                            <a class="navbar-brand" href="#"><img src="img/core-img/logo.png"  width="240px" height="100px" alt="Logo" style="margin-left: -25%;"></a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#studioMenu" aria-controls="studioMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                            <div class="collapse navbar-collapse" id="studioMenu">
                                <!-- Menu Area Start  -->
                                <ul class="navbar-nav ml-auto">
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="backend/logout.php"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" style="padding-top:5%;">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="pages-profile.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="photos.php" aria-expanded="false"><i class="mdi mdi-image"></i><span class="hide-menu">Photos</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="profile-photo.php" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Profile Photo</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" id="container">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <!-- <h3 class="text-themecolor">Dashboard</h3> -->
                    </div>
                </div>
                <?php 
                    session_start();
                    if(isset($_SESSION['username'])){
                        
                        $username = $_SESSION['username'];
                        // echo '<script language="javascript">';
                        // echo 'alert("'.$username.'Hello!")';
                        // echo '</script>';
                        require('./backend/connect.php');
                        
                        $query="SELECT guest_email,guest_name,message_subject,message_body FROM public.messages WHERE photographer_id='$username' and read_msg=0";
                        $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
                        // $arr=pg_fetch_all($result);
                        if(pg_num_rows($result) > 0){
                            $i=0;
                            $arr=pg_fetch_all($result);
                            while($i < pg_num_rows($result))
                            {
                                $guest_email=$arr[$i]['guest_email'];
                                $guest_name=$arr[$i]['guest_name'];
                                $message_subject=$arr[$i]['message_subject'];
                                $message_body=$arr[$i]['message_body'];
                                // $id = $arr[$i]['email'];
                                echo '<div class="card" style="width:30%;height:50%;float:left;margin-right:2%;">';
                                echo '<div class="card-body">';
                                echo '<span class="pull-right clickable close-icon" data-effect="fadeOut" style="float:right;"><i class="fa fa-times"></i></span>';
                                echo '<div class="d-flex">';
                                echo '<div>';
                                echo '<h3 class="card-title m-b-5"><span class="lstick"></span>Message</h3>';
                                echo '<p>';
                                echo '<b>From: </b>'.$guest_name.'<br>';
                                echo "<b>Email: </b>".$guest_email."<br>";
                                echo ' <b>Subject: </b>'.$message_subject.'<br>';
                                echo  "<b>Message: </b>".$message_body;
                                echo "</p>";
                                echo "</div></div></div></div>";
                                $i=$i+1;
                            }
                        }
                        else {
                            echo '<script language="javascript">';
                            echo "alert('No messages!')";
                            echo '</script>';
                        }
                    }
                    pg_close($connection);
                ?>
            </div>
        </div>
    </div>

    <script src="js/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

    <!-- Active js -->
    <script src="js/active.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard.js"></script>


    <script>
        // var tile = document.getElementById("")
        $('.close-icon').on('click',function() {
            $(this).closest('.card').fadeOut();
        });
    </script>
</body>
</html>