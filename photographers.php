            <!DOCTYPE html>
            <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="description" content="">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

                    <!-- Title  -->
                    <title>Studio - Creative Photography Template | Blog</title>

                    <!-- Favicon  -->
                    <link rel="icon" href="img/core-img/favicon.ico">

                    <!-- Core Style CSS -->
                    <link rel="stylesheet" href="css/core-style.css">
                    <link rel="stylesheet" href="style.css">

                    <!-- Responsive CSS -->
                    <link href="css/responsive.css" rel="stylesheet">

                </head>

                <body>
                    <!-- Gradient Background Overlay -->
                    <div class="gradient-background-overlay"></div>

                    <!-- Header Area Start -->
                    <header class="header-area bg-img" style="background-image: url(img/bg-img/14.jpg);">
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
                                                        <a class="nav-link" href="photographers.html">Photographers</a>
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
                                                    <form action="backend/lookup.php">
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
                    <!-- Header Area End -->

                    <!-- Social Sidebar Area Start -->
                    <div class="social-sidebar-area bg-white">
                        <!-- Social Area -->
                        <div class="social-info-area">
                            <a href="#" data-toggle="tooltip" data-placement="right" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i> <span>Facebook</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="right" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i> <span>Twitter</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="right" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i> <span>Pinterest</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="right" title="Behance"><i class="fa fa-instagram" aria-hidden="true"></i> <span>Instagram</span></a>
                        </div>
                        <!-- Message Box -->
                        <div class="message-box">
                            <a href="#" data-toggle="modal" data-target=".contact-modal-lg"><img src="img/core-img/envelope.png" alt=""></a>
                        </div>
                    </div>
                    <!-- Social Sidebar Area End -->

                    <!-- Blog Area Start -->
               <section class="blog-area section_padding_100 mt-100">
                    <div class="container">
                      <div class="row justify-content-center">
                    <?php

                                // <!-- Single Blog Area -->

                                require('./backend/connect.php');
                                $query="SELECT email,fname,lname,designation,about,profilepic FROM public.users_info";
                                $result = pg_query($connection, $query) or  die('Query failed: ' . pg_last_error());
                                $arr=pg_fetch_all($result);
                                if(pg_num_rows($result) > 0){
                                $i=0;
                                $arr=pg_fetch_all($result);
                                while($i < pg_num_rows($result))
                                {
                                $fname=$arr[$i]['fname'];
                                $lname=$arr[$i]['lname'];
                                $tag=$arr[$i]['designation'];
                                $about=$arr[$i]['about'];
                                $id = $arr[$i]['email'];
                                $profilepic = 'profile/'.$arr[$i]['profilepic'];

                                echo '<div class="col-10">';
                                echo '<div class="single-blog-area text-center mb-100 wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1s">';
                                echo   '<div class="blog-thumbnail mb-100">';
                                echo    '<img src='.$profilepic.'  alt="" width="250px" height="320px" width="50%">';
                                echo '</div>';
                                echo '<div class="blog-content">';
                                echo    '<span></span>';
                                echo  '<h2>' .$lname . "," .$fname. '</h2>';
                                echo  '<a href="#" class="post-author">' .$tag. '</a>';
                                echo "<p>" .$about. "</p>";
                                echo '<a href="portfolio.php?id='.$id.'" class="btn studio-btn"><img src="img/core-img/logo-icon.png" alt=""> Visit Portfolio </a>';
                                echo  "</div>";
                                echo "</div>";
                                echo "</div>";
                                $i=$i+1;
                                }
                                }
                               else
                                   echo "lolll maxx";
                            ?>
                              </div>
                                
                            <!-- Pagination -->
                            <div class="row">
                                <div class="col-12">
                                    <nav aria-label="Page navigation" class="pagination-area mb-100">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                            <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                            <li class="page-item"><a class="page-link" href="#">03.</a></li>
                                            <li class="page-item"><a class="page-link" href="#">04.</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Blog Area End -->



                    <!-- jQuery (Necessary for All JavaScript Plugins) -->
                    <script src="js/jquery/jquery-2.2.4.min.js"></script>
                    <!-- Popper js -->
                    <script src="js/popper.min.js"></script>
                    <!-- Bootstrap js -->
                    <script src="js/bootstrap.min.js"></script>
                    <!-- Plugins js -->
                    <script src="js/plugins.js"></script>
                    <!-- Active js -->
                    <script src="js/active.js"></script>

                </body>

            </html>
