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
        .entry:not(:first-of-type)
        {
            margin-top: 10px;
        }
    </style>

    <?php  
        session_start();
        if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }
        // if(isset($_GET['message'])){
        //     $msg_status = $_GET['message'];
        //     if($msg_status == "sent"){
        //         echo '<script language="javascript">';
        //         echo 'alert("Message successfully sent!")';
        //         echo '</script>';
        //     }
        // }
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
                            <a class="navbar-brand" href="index.html"><img src="img/core-img/logo.png"  width="240px" height="100px" alt="Logo" style="margin-left: -25%;"></a>

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
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Profile</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" id="updateForm">
                                <input type="hidden" name="username" id="username" value="<?php echo htmlspecialchars($username);?>" >
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Job Title</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Photographer/Web Designer/Artist" class="form-control form-control-line" id="title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">About</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" placeholder="What do you want the users to know about you, your work and your accomplishments" id="about"></textarea>
                                        </div>
                                    </div>
                                    <div class="multiple form-group">
                                        <label class="col-md-12">Add Skills</label>
                                        <div class="entry input-group col-md-12">
                                            <input type="text" placeholder="Skill" class="form-control form-control-line" style="margin-right:5%" id="skill1">
                                            <input type="number" min="0" max="100" step="0.1" placeholder="0-100" class="form-control form-control-line" id="perc1">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success btn-add" type="button">
                                                        <i class="mdi mdi-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Projects completed</label>
                                        <div class="col-md-12">
                                            <input type="number" min="0" step="1" placeholder="Number" class="form-control form-control-line" id="projects">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Clients</label>
                                        <div class="col-md-12">
                                            <input type="number" min="0" step="1" placeholder="Number" class="form-control form-control-line" id="clients">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="00 St, City, State, Country" class="form-control form-control-line" id="address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="123 456 7890" class="form-control form-control-line" id="phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Facebook</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="www.facebook.com/johndoe" class="form-control form-control-line" id="facebook">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Instagram</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="www.instagram.com/johndoe" class="form-control form-control-line" id="instagram">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Twitter</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="www.twitter.com/johndoe" class="form-control form-control-line" id="twitter">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-md-12">Pinterest</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="www.pinterest.com/johndoe" class="form-control form-control-line" id="pinterest">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
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
        $(function()
        {
            $(document).on('click', '.btn-add', function(e)
            {
                e.preventDefault();
                var controlForm = $('.card-body form:first'),
                    multiple = $('.multiple'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(multiple);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<i class="mdi mdi-minus"></i>');
                
                var set = document.getElementsByClassName("multiple")[0];
                var input_num = set.childElementCount - 1;
                var skill_id = "skill"+input_num;
                var perc_id = "perc"+input_num;
                set.lastElementChild.childNodes[1].id = skill_id;
                set.lastElementChild.childNodes[3].id = perc_id;
            }).on('click', '.btn-remove', function(e)
            {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });
        });

        $("#updateForm").submit(function () {
            // console.log("Hello");
            event.preventDefault();
            var username = document.getElementById("username").value;
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var facebook = document.getElementById("facebook").value;
            var twitter = document.getElementById("twitter").value;
            var title = document.getElementById("title").value;
            var about = document.getElementById("about").value;
            var instagram = document.getElementById("instagram").value;
            var address = document.getElementById("address").value;
            var phone = document.getElementById("phone").value;
            var projects = document.getElementById("projects").value;
            var clients = document.getElementById("clients").value;
            var pinterest = document.getElementById("pinterest").value;

            var skill_num = document.getElementsByClassName("multiple")[0].childElementCount;
            var skill_arr = [];
            var i;
            for(i=1; i < skill_num; i++){
                var id = "skill" + i;
                skill_arr.push(document.getElementById(id).value);
            }
            var skills_jsonString = JSON.stringify(skill_arr);
            var perc_arr = [];
            for(i=1; i < skill_num; i++){
                var id = "perc" + i;
                perc_arr.push(document.getElementById(id).value);
            }
            var percs_jsonString = JSON.stringify(perc_arr);

            document.getElementById("updateForm").reset();
            // var username = document.getElementbyId("username").value();
            $.ajax({
                url: 'backend/profile-update.php',
                type: 'GET',
                data: {
                    username: username,
                    name: name,
                    email: email,
                    facebook: facebook,
                    twitter: twitter,
                    title: title,
                    about: about,
                    instagram: instagram,
                    address: address,
                    phone: phone,
                    projects: projects,
                    clients: clients,
                    pinterest: pinterest,
                    skills: skills_jsonString,
                    percs: percs_jsonString 
                },
                success: function(data) {
                    alert(data);
                    if(data == 'success'){
                        alert("Profile Updated!");
                    }else if(data == 'error'){
                        alert("Profile Update failed!");
                    }
                },
                error:  function() {
                    alert('Request failed!');
                }              
            });
        });
    </script>
</body>

</html>