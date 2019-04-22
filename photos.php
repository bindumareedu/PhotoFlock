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
    <title>Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/dashboard-style.css" rel="stylesheet">
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
     <!-- <link href="netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border fix-sidebar">
    <style>
        .w3-row-padding img {
            width: 500px;
            margin-right: 3%;
            margin-bottom: 3%;
        }
    </style>

    <?php  
        session_start();
        if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }
    ?>

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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 align-self-center">
                        <h3 class="text-themecolor">Photos</h3>
                        <!-- <button class="btn btn-success">Upload Photos</button> -->
                    </div>
                    <!-- <div class="col-md-6">
                        <form method="post" action="save_path.php" enctype='multipart/form-data'>
                            <input type='file' name='file' />
                            <button class="btn btn-success" type='submit'>Upload Photos</button>
                        </form>
                    </div> -->
                </div>
                <form class="form-inline" method="post" action="save_path.php" enctype='multipart/form-data' style="margin-bottom:3%;">
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($username);?>">
                    <input type='file' name='file' />
                    <select class="form-control" name="category" style="margin-right:0.5%">
                        <option value="" selected disabled>Category</option>
                        <option>Portraits</option>
                        <option>Weddings</option>
                        <option>Studio</option>
                        <option>Fashion</option>
                        <option>Lifestyle</option>
                        <option>Nature</option>
                        <option>Other</option>
                    </select>
                    <input type="text" placeholder="tags" class="form-control form-control-line" name="tags" style="margin-right:0.5%">
                    <input class="btn btn-success" type='submit' value='Upload Photos' name='but_upload'>
                    <!-- <button class="btn btn-success" type='submit'name='but_upload'>Upload Photos</button> -->
                </form>
                <div class="w3-row-padding">
                    <div class="w3-half ">
                        <?php 
                            session_start();
                            if(isset($_SESSION['username'])){
                                
                                $username = $_SESSION['username'];
                                require('backend/connect.php');
                                
                                $query="SELECT name FROM public.imagestore WHERE photographer_id='$username'";
                                $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
                                if(pg_num_rows($result) > 0){
                                    $i=0;
                                    $arr=pg_fetch_all($result);
                                    while($i < pg_num_rows($result))
                                    {
                                        $img_file="upload/".$arr[$i]['name'];
                                        echo '<img src="'.$img_file.'">';
                                        $i=$i+1;
                                    }
                                }
                                else {
                                    echo '<script language="javascript">';
                                    echo "alert('No images!')";
                                    echo '</script>';
                                }
                            }
                            pg_close($connection);
                        ?>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
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
    <script>
    </script>
</body>

</html>