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
        <!-- get the id from the previous page -->
            <?php
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $_SESSION['username'] = $id; 
                    require('./backend/connect.php');
                        
                    $query="SELECT projects,clients FROM public.users_info WHERE email='$id'";
                    $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
                    // $arr=pg_fetch_all($result);
                    if(pg_num_rows($result) > 0){
                        $arr=pg_fetch_all($result);
                        $projects=$arr[0]['projects'];
                        $clients=$arr[0]['clients'];
                        // $i=0;
                        // $arr=pg_fetch_all($result);
                        // while($i < pg_num_rows($result))
                        // {
                        //     $skill=$arr[$i]['skill_name'];
                        //     $strength=$arr[$i]['strength'];
                    
                        //     echo '<p class="w3-wide">'.ucfirst($skill).'</p>';
                        //     echo '<div class="w3-light-grey">';
                        //     echo '<div class="w3-container w3-center w3-padding-small w3-dark-grey" style="width:'.$strength.'%">'.$strength.'%</div>';
                        //     echo '</div><br/>';
                        //     $i=$i+1;
                        // }
                    }
                    else {
                        echo '<script language="javascript">';
                        echo "alert('No messages!')";
                        echo '</script>';
                    } 
                    pg_close($connection);  
                }
                
            ?>

            <!-- Sidebar with image -->
            <div class="imgnav" >
            <img src="./img/core-img/side.jpg" class="portfolioimg"  height="-webkit-fill-available" />
                       </div>
            <div class="sidenav" >
            <?php
                echo  '<a id="side" href="portfolio.php?id=' .$id. '">About</a>' ;
                echo   '<a id="side" href="gallery.php?id=' .$id. '">Gallery</a>' ;
                echo   '<a id="active" href="skills.php?id=' .$id . '">Skills</a>' ;
                echo  '<a  id="side" href="portfoliocontact.php?id=' .$id . '">Contact Me</a>';
            ?>  
</div>            
<div class="main" style="margin-left:300px;padding-top:150px; ">
            <div class="w3-content w3-justify w3-text-grey w3-padding-32" id="about">
                <?php 
                    session_start();
                    if(isset($_SESSION['username'])){
                        
                        $username = $_SESSION['username'];
                        require('./backend/connect.php');
                        
                        $query="SELECT skill_name,strength FROM public.skills WHERE photographer_id='$username'";
                        $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
                        // $arr=pg_fetch_all($result);
                        if(pg_num_rows($result) > 0){
                            $i=0;
                            $arr=pg_fetch_all($result);
                            while($i < pg_num_rows($result))
                            {
                                $skill=$arr[$i]['skill_name'];
                                $strength=$arr[$i]['strength'];
                        
                                echo '<p class="w3-wide">'.ucfirst($skill).'</p>';
                                echo '<div class="w3-light-grey">';
                                echo '<div class="w3-container w3-center w3-padding-small w3-dark-grey" style="width:'.$strength.'%">'.$strength.'%</div>';
                                echo '</div><br/>';
                                $i=$i+1;
                            }
                        }
                        else {
                            // echo '<script language="javascript">';
                            // echo "alert('No messages!')";
                            // echo '</script>';
                        }
                    }
                    pg_close($connection);
                ?>
                <div class="w3-row w3-center w3-dark-grey w3-padding-16 w3-section">
                <div class="w3-quarter w3-section">
                    <span class="w3-xlarge"></span><br>
                    
                </div>
                <div class="w3-quarter w3-section">
                    <span class="w3-xlarge"><?php echo htmlspecialchars($projects);?></span><br>
                    Projects Done
                </div>
                <div class="w3-quarter w3-section">
                    <span class="w3-xlarge"><?php echo htmlspecialchars($clients);?></span><br>
                    Happy Clients
                </div>
                <div class="w3-quarter w3-section">
                    <span class="w3-xlarge"></span><br>
                    
                </div>
                </div>
                </div>

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