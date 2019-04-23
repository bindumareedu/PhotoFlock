    <!DOCTYPE html>
    <!-- saved from url=(0067)https://www.w3schools.com/w3css/tryw3css_templates_bw_portfolio.htm -->
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>W3.CSS Template</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- Favicon  -->
            <link rel="icon" href="img/core-img/favicon.ico">
            <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

            <!-- Core Style CSS -->
            <link rel="stylesheet" href="css/core-style.css">
            <link rel="stylesheet" href="style.css">
                        <link rel="stylesheet" href="./css/sidebar.css">


            <!-- Responsive CSS -->
            <link href="css/responsive.css" rel="stylesheet">
            <style>
                body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
                .w3-row-padding img {margin-bottom: 12px}
                .bgimg {
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                min-height: 100%;
                }
                .side{font-family: 'Bree Serif', serif;}
                #active{font-family: 'Bree Serif', serif;text-decoration:underline}
              
/* image */
#imgnav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 80px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  overflow-x: hidden; /* Disable horizontal scroll */
}

            </style>
        </head>
        <body>
            
            <?php
                session_start();
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $_SESSION['username'] = $id; 
                    require('backend/connect.php');
                    
                    $query="SELECT fname,lname,about, designation, profilepic FROM public.users_info WHERE email='$id'";
                    $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
                    if(pg_num_rows($result) > 0){
                        $arr=pg_fetch_all($result);
                        $fname = $arr[0]['fname'];
                        $lname = $arr[0]['lname'];
                        $about = $arr[0]['about'];
                        $designation = $arr[0]['designation'];
                        $profilepic = 'profile/'.$arr[0]['profilepic'];
                    }
                    else {
                        echo '<script language="javascript">';
                        echo "alert('User doesn't exist!')";
                        echo '</script>';
                    }
                }
                pg_close($connection);
            ?>
            <!-- Sidebar with image -->
            <div id="imgnav" >
                <img src="./img/core-img/side.jpg" class="portfolioimg"  height="-webkit-fill-available" />
            </div>
            <div class="sidenav" style="width:150px;margin-left:80px;" >
            <?php
                 echo  '<a id="active" href="newprofile.php?id=' .$id. '">Profile</a>' ;
                 echo  '<a class="side" href="messages.php?id=' .$id. '">Messages</a>' ;
                 echo  '<a  class="side" href="new_photos?id='.$id .'">Photos</a>';
            ?>   
            </div>            
            <div class="main" style="margin-left:220px;height=100%;">
            
            <div class="row">
                    <!-- Column -->
                    <!-- <div class="col-lg-8 col-xlg-9 col-md-7"> -->
                    <div class="col-7" >
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" id="updateForm">
                                <input type="hidden" name="username" id="username" value="<?php echo htmlspecialchars($username);?>" >
                                    <div class="form-group">
                                        <label class="col-md-12">First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Johnathan" class="form-control form-control-line" id="fname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Doe" class="form-control form-control-line" id="lname">
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
                                                        <i class="mdi mdi-plus">+</i>
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
                <!-- profile photo -->
                <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                            <?php 
                            session_start();
                            if(isset($_SESSION['username'])){
                                
                                $username = $_SESSION['username'];
                                require('backend/connect.php');
                                
                                $query="SELECT profilepic FROM public.users_info WHERE email='$username'";
                                $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
                                if(pg_num_rows($result) > 0){
                                    $i=0;
                                    $arr=pg_fetch_all($result);
                                    if($arr[0]['profilepic'] != "")
                                    {
                                        $img_file="profile/".$arr[0]['profilepic'];
                                        echo '<img src="'.$img_file.'">';
                                        // $i=$i+1;
                                    }
                                    else{
                                        echo 'No location';
                                    }
                                }
                                else {
                                    // echo "no result";
                                    // echo '<script language="javascript">';
                                    // echo "alert('No images!')";
                                    // echo '</script>';
                                }
                            }
                            pg_close($connection);
                        ?>
                         <form method="post" action="backend/save_profile_photo.php" enctype='multipart/form-data' class="form-horizontal form-material" style="margin-bottom:3%;">
                         <h3 class="side" style="text-align:center"> Profile Photo </h3>
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($username);?>">
                    <input type='file' name='file' />
                    <br/>
                    <input class="btn btn-success" type='submit' value='Upload Photo' name='but_upload'>
                </form>
               
                </div>
                </div>
                </div>
                
                </div>
                
                <!-- Row -->
            </div>
        </div>
    </div>
                </div><br/>
                <br/>
                <br/>
            </div>

            <!-- Hidden Sidebar (reveals when clicked on menu icon)-->
            <nav class="w3-sidebar w3-black w3-animate-right w3-xxlarge" style="display:none;padding-top:150px;right:0;z-index:2" id="mySidebar">
                <a href="javascript:void(0)" onclick="closeNav()" class="w3-button w3-black w3-xxxlarge w3-display-topright" style="padding:0 12px;">
                    <i class="fa fa-remove"></i>
                </a>
                <div class="w3-bar-block w3-center">
                    <a href="https://www.w3schools.com/w3css/tryw3css_templates_bw_portfolio.htm#" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">Home</a>
                    <a href="https://www.w3schools.com/w3css/tryw3css_templates_bw_portfolio.htm#portfolio" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">Portfolio</a>
                    <a href="https://www.w3schools.com/w3css/tryw3css_templates_bw_portfolio.htm#about" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">About</a>
                    <a href="https://www.w3schools.com/w3css/tryw3css_templates_bw_portfolio.htm#contact" class="w3-bar-item w3-button w3-text-grey w3-hover-black" onclick="closeNav()">Contact</a>
                </div>
            </nav>

            <!-- Page Content -->
            <div style="margin-left:40%;padding: 0px,0px;">
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
                                            <a class="navbar-brand" href="index.html"><img src="img/core-img/logo.png"  width="250px" height="100px" alt="Logo"></a>

                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#studioMenu" aria-controls="studioMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                                            <div class="collapse navbar-collapse" id="studioMenu">
                                                <!-- Menu Area Start  -->
                                                <ul class="navbar-nav ml-auto">
                                                    <li class="nav-item active">
                                                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="about-me.html">About</a>
                                                    </li>
                                                    <li class="nav-item">
                                                      <?php echo '<a class="nav-link" href="photographers.php?" '. $id .'> Photographers</a>'; ?>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="contact.html">Contact</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="login.html">Login/Sign Up</a>
                                                    </li>
                                                </ul>
                                                <!-- Search Form -->
                                                <div class="header-search-form ml-auto">
                                                    <form action="search.html">
                                                        <input type="search" class="form-control" placeholder="Input your keyword then press enter..." id="search" name="search">
                                                        <input class="d-none" type="submit" value="submit">
                                                    </form>
                                                </div>
                                                <!-- Search btn -->
                                                <div id="searchbtn">
                                                    <img src="img/core-img/search.png" alt="">
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
            <!-- All SCRIPTS -->
            <!-- ALL JQUERY  -->
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
                    .html('<i class="mdi mdi-minus">-</i>');
                
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
            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;
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
                    fname: fname,
                    lname: lname,
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