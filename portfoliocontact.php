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
                #side{font-family: 'Bree Serif', serif;}
                #active{font-family: 'Bree Serif', serif;text-decoration:underline}

            </style>
        </head>
        <body>
            <?php  
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $username=$id;
                    $_SESSION['username'] = $id;

                    require('backend/connect.php');
                    
                    $query="SELECT address,profile_email,pnum FROM public.users_info WHERE email='$username'";
                    $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
                    if(pg_num_rows($result) > 0){
                        $arr=pg_fetch_all($result);
                        $address = $arr[0]['address'];
                        $profile_email = $arr[0]['profile_email'];
                        $pnum = $arr[0]['pnum'];
                    }
                    else {
                        // echo '<script language="javascript">';
                        // echo "alert('User doesn't exist!')";
                        // echo '</script>';
                    }
                }
                if(isset($_GET['message'])){
                    $msg_status = $_GET['message'];
                    if($msg_status == "sent"){
                        echo '<script language="javascript">';
                        echo 'alert("Message successfully sent!")';
                        echo '</script>';
                    }
                }
                pg_close($connection);
            ?>
            <!-- Sidebar with image -->
            <div class="imgnav" >
                <img src="./img/core-img/side.jpg" class="portfolioimg"  height="-webkit-fill-available" />
            </div>
            <div class="sidenav" >
            <?php
              echo  '<a id="side" href="portfolio.php?id=' .$id. '">About</a>' ;
             echo   '<a id="side" href="gallery.php?id=' .$id. '">Gallery</a>' ;
             echo   '<a id="side" href="skills.php?id=' .$id . '">Skills</a>' ;
            echo  '<a  id="active" href="portfoliocontact.php?id=' .$id . '">Contact Me</a>';
            
            ?>  
            </div>            
            <div class="main">
                <!-- Single Blog Area -->
                <div class="w3-padding-32 w3-content w3-text-grey" id="contact" style="margin-bottom:0px;margin-left:180px;width:fit-content;margin-right:50px">

                    <div class="w3-section">
                        <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i><?php echo htmlspecialchars($address);?></p>
                        <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: <?php echo htmlspecialchars($pnum);?></p>
                        <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: <?php echo htmlspecialchars($profile_email);?></p>
                    </div>

                    <!-- Image of location/map -->
                    <img src="./W3.CSS Template_files/map.jpg" class="w3-image w3-greyscale" style="width:100%;margin:32px 0">

                    <p>Lets get in touch. Send me a message:</p>
                    <form id="contactForm">
                        <input class="w3-input w3-padding-16 w3-border" type="hidden"  name="username" id="username" value="<?php echo htmlspecialchars($username); ?>">
                        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required="" name="Name" id="Name"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required="" name="Email" id="Email"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Subject" required="" name="Subject" id="Subject"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required="" name="Message" id="Message"></p>
                        <p>
                            <button class="w3-button w3-light-grey w3-padding-large" type="submit">
                                <i class="fa fa-paper-plane"></i> SEND MESSAGE
                            </button>
                            <!-- <input class="w3-button w3-light-grey w3-padding-large" type="submit" name="submit"value="SEND MESSAGE"><i class="fa fa-paper-plane"></i> -->
                        </p>
                    </form>
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
                                                        <a class="nav-link" href="photographers.php">Photographers</a>
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script>
                $("#contactForm").submit(function () {
                    // console.log("Hello");
                    event.preventDefault();
                    var username = document.getElementById("username").value;
                    var Name = document.getElementById("Name").value;
                    var Email = document.getElementById("Email").value;
                    var Subject = document.getElementById("Subject").value;
                    var Message = document.getElementById("Message").value;
                    document.getElementById("Name").value = "";
                    document.getElementById("Email").value = "";
                    document.getElementById("Subject").value = "";
                    document.getElementById("Message").value = "";
                    // var username = document.getElementbyId("username").value();
                    $.ajax({
                        url: 'backend/contact.php',
                        type: 'GET',
                        data: {
                            username: username,
                            Name: Name,
                            Email: Email,
                            Subject: Subject,
                            Message: Message 
                        },
                        success: function(data) {
                            // alert("Done!");
                            // alert(data);
                            if(data == 'success'){
                                alert("Message Sent!");
                            }else if(data == 'error'){
                                alert("Message sending failed!");
                            }
                        },
                        error:  function() {
                            alert('Request failed!');
                        }              
                    });
                });
            </script>

             <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge" style="margin:-24px;padding-left:160px;">
                <i class="fa fa-facebook-official w3-hover-opacity"></i>
                <i class="fa fa-instagram w3-hover-opacity"></i>
                <i class="fa fa-snapchat w3-hover-opacity"></i>
                <i class="fa fa-pinterest-p w3-hover-opacity"></i>
                <i class="fa fa-twitter w3-hover-opacity"></i>
                <i class="fa fa-linkedin w3-hover-opacity"></i>
                <!-- <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p> -->
            <!-- End footer -->
            </footer>
        </body>
    </html>