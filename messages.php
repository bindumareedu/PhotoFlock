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
            <div class="imgnav" >
                <img src="./img/core-img/side.jpg" class="portfolioimg"  height="-webkit-fill-available" />
            </div>
            <div class="sidenav" >
            <?php
                  echo  '<a id="side" href="newprofile.php?id=' .$id. '">Profile</a>' ;
                  echo  '<a id="active" href="messages.php?id=' .$id. '">Messages</a>' ;
                  echo  '<a  id="side" href="new_photos?id='.$id .'">Photos</a>';
            ?>   
            </div>            
            <div class="main" style="margin-left:300px">
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
        </body>
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
    </html>