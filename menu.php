<?php
SESSION_Start();
$user="Customer";
if(!(isset($_SESSION['user']) && $_SESSION['user'] != '')){
    $user="Customer";
    $cid='';
    echo"<style>
			#logout{display:none;}
		</style>";
}
else{
    $user=$_SESSION['user'];
    $cid=$_SESSION['cid'];
    echo"<style>
			#signup{display:none;}
		</style>";
}
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Title  -->
    <title>Oishii</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">



</head>

<body onLoad=" jumpScroll()">
<script>
    function  jumpScroll() {

        window.scroll(0,550);
    }</script>


<!-- Preloader Start -->
<div id="preloader">
    <div class="preload-content">
        <div id="world-load"></div>
    </div>
</div>
<!-- Preloader End -->

<!-- ***** Header Area Start ***** -->
<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href="index.html"><img src="img/core-img/logo.png" alt="Logo"></a>
                    <!-- Navbar Toggler -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <!-- Navbar -->
                    <div class="collapse navbar-collapse" id="worldNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php">HOME </a>
                            </li>
                            <!--  <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="index.html">Home</a>
                                      <a class="dropdown-item" href="catagory.html">Catagory</a>
                                      <a class="dropdown-item" href="single-blog.html">Register</a>
                                      <a class="dropdown-item" href="regular-page.html">Regular Page</a>
                                      <a class="dropdown-item" href="contact.html">Contact</a>
                                  </div>
                              </li>-->
                            <li class="nav-item active">
                                <a class="nav-link" href="javascript:jumpScroll()">MENU</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">CONTACT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ABOUT</a>
                            </li>

                            <?php if ($user=="Customer"){?>
                                <li class="nav-item">
                                    <a class="nav-link" href="register.php">SIGNUP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">LOGIN</a>
                                </li>

                            <?php }else{?>

                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php"><?php echo "$user"?>(LOGOUT)</a>
                                </li>
                                <li class="nav-item">
                                    <form action="cart.php" method="post"><input type="hidden" name="c_name" value="<?php echo "$user"; ?>" ><button type="submit" name="cart"><img src="img/core-img/cart.png" width="30px" height="30px" /></button> </form>
                                </li>
                            <?php }?>

                        </ul>
                        <!-- Search Form  -->
                        <div id="search-wrapper">
                            <form action="#">
                                <input type="text" id="search" placeholder="Search something...">
                                <div id="close-icon"></div>
                                <input class="d-none" type="submit" value="">
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<!-- ********** Hero Area Start ********** -->
<div class="hero-area">

    <!-- Hero Slides Area -->
    <div class="hero-slides owl-carousel">
        <!-- Single Slide -->
        <div class="single-hero-slide bg-img background-overlay" style="background-image: url(images/vege.jpg);"></div>
        <!-- Single Slide -->
        <div class="single-hero-slide bg-img background-overlay" style="background-image: url(images/foodbg.jpg);"></div>
        <!-- Single Slide -->
        <div class="single-hero-slide bg-img background-overlay" style="background-image: url(images/fdbg.jpeg);"></div>
        <!-- Single Slide -->
        <div class="single-hero-slide bg-img background-overlay" style="background-image: url(images/0002.jpg);"></div>
    </div>
</div>

    <!-- Hero Post Slide -->

<!-- ********** Hero Area End ********** -->

<div class="main-content-wrapper section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <!-- ============= Post Content Area Start ============= -->
            <div class="col-12 col-lg-8">
                <div class="post-content-area mb-50">
                    <!-- Catagory Area -->
                    <div class="col-12 col-lg-12">
                        <div class="post-content-area mb-50">


                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Portions</th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                require_once('config.php');
                                $sql = " SELECT * FROM food ";

                                mysqli_query($con , $sql) or die(mysqli_error($con));

                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {


                                    // output data of each row
                                    while ($row = mysqli_fetch_array($result)) {


                                        ?>

                                        <tr class="table-active">
                                            <th scope="row"><?php   $target = "uploads/".$row['f_pic']; echo "<img src='$target' height=\"150px\" width=\"150px\"/>"; ?></th>
                                            <td><?php echo $row['f_name']; ?></td>
                                            <td><?php echo $row['f_des']; ?></td>
                                            <td><?php echo $row['f_price']; ?></td>

                                                <form method="post" action="cutomer_order.php">
                                                    <td>    <select class="form-control" id="sel1" name="nop">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        </select></td>
                                                    <input type="hidden" name="f_id" value="<?php echo $row['f_id']; ?>"/>
                                                    <input type="hidden" name="c_name" value="<?php echo "$user"; ?>"/>
                                                    <input type="hidden" name="f_price" value="<?php echo $row['f_price']; ?>"/>


                                                <td><button type="submit" name="order" class="btn btn-primary btn-sm" >ORDER</button> </td>

                                                </form>




                                        </tr>


                                        <?php
                                    }
                                } ?>

                                </tbody>
                            </table>





                        </div>


                    </div>

                </div>
            </div>

            <!-- ========== Sidebar Area ========== -->
            <div class="col-12 col-md-8 col-lg-4">
                <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title">OISHII</h5>
                        <div class="widget-content">
                            <p>Oishii take away providing chinese foods for customers. For a taste of the food you have come to know and love, visit our place or use our online ordering page to enjoy our meals. To our loyal customers, we thank you for your continued patronage and are thrilled that you are a part of the Oishii family.
                            </p>
                        </div>
                    </div>
                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title">Special Menu</h5>
                        <div class="widget-content">
                            <!-- Single Blog Post -->
                            <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="images/schop.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="headline">
                                        <h5 class="mb-0"><font color="#F516F8" size ="4"><b>S-1</b></font> OISHII special chopsuey Rice</h5>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="images/nchop.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="headline">
                                        <h5 class="mb-0"><font color="#F516F8" size ="4"><b>S-2</b></font> OISHII special chopsuey Noodles</h5>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="images/mongolian.JPG" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="headline">
                                        <h5 class="mb-0"><font color="#F516F8" size ="4"><b>S-3</b></font> OISHII special Mongolian Mixed Rice</h5>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="images/mongoliannoodles.jpeg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="headline">
                                        <h5 class="mb-0"><font color="#F516F8" size ="4"><b>S-4</b></font> OISHII special Mongolian Mixed Noodles</h5>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="images/mixchop.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="headline">
                                        <h5 class="mb-0"><font color="#F516F8" size ="4"><b>S-5</b></font> OISHII special Mixed Chopsuey</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <h5 class="title">Stay Connected</h5>
                        <div class="widget-content">
                            <div class="social-area d-flex justify-content-between">
                                <!--<a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-vimeo"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google"></i></a>-->
                            </div>
                        </div>
                    </div>
                    <!-- Widget Area -->
                    <div class="sidebar-widget-area">
                        <!--<h5 class="title">Today’s Pick</h5>-->
                        <div class="widget-content">
                            <!-- Single Blog Post -->
                            <div class="single-blog-post todays-pick">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="images/visitingcard.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content px-0 pb-0">
                                    <a href="#" class="headline">
                                        <h5>Visit Our place to make your meal memorable</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- ========== Single Blog Post ========== -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.2s">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                        <img src="images/balls.jpg" alt="">
                        <!-- Post Content -->
                        <div class="post-content d-flex align-items-center justify-content-between">
                            <!-- Catagory -->
                            <!--<div class="post-tag"><a href="#">travel</a></div>-->
                            <!-- Headline -->
                            <a href="#" class="headline">
                                <h5>An everlasting memorable dining experience we reserve for you</h5>
                            </a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p>Visit our place</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== Single Blog Post ========== -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.4s">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                        <img src="images/balls.jpg" alt="">
                        <!-- Post Content -->
                        <div class="post-content d-flex align-items-center justify-content-between">
                            <!-- Catagory -->
                            <!--<div class="post-tag"><a href="#">travel</a></div>-->
                            <!-- Headline -->
                            <a href="#" class="headline">
                                <h5>An everlasting memorable dining experience we reserve for you</h5>
                            </a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p>Visit our place</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== Single Blog Post ========== -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.6s">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                        <img src="images/balls.jpg" alt="">
                        <!-- Post Content -->
                        <div class="post-content d-flex align-items-center justify-content-between">
                            <!-- Catagory -->
                            <!-- <div class="post-tag"><a href="#">travel</a></div>-->
                            <!-- Headline -->
                            <a href="#" class="headline">
                                <h5>An everlasting memorable dining experience we reserve for you</h5>
                            </a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p>Visit our place</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="world-latest-articles">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="title">
                        <h5>PROMOS</h5>
                    </div>


                    <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">

                        <div class="post-thumbnail">
                            <img src="images/crice.jpg" alt="">
                        </div>

                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>CHICKEN RICE</h5>
                            </a>
                            <p>Buy THREE Large Packs and Get ONE Regular Pack FREE</p>

                            <div class="post-meta">
                                <p>Good Foods, Good Times</p>
                            </div>
                        </div>
                    </div>


                    <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">

                        <div class="post-thumbnail">
                            <img src="images/dchicken.jpg" alt="">
                        </div>

                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>Devilled Chicken</h5>
                            </a>
                            <p>Buy TWO Large packs and Get One regular pack FREE</p>

                            <div class="post-meta">
                                <p>Good Foods, Good Times</p>
                            </div>
                        </div>
                    </div>


                    <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.4s">

                        <div class="post-thumbnail">
                            <img src="images/set.jpg" alt="">
                        </div>

                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>SET MENU</h5>
                            </a>
                            <p>Buy TEN regular Packs and get One Pack FREE</p>

                            <div class="post-meta">
                                <p>Good Foods, Good Times</p>
                            </div>
                        </div>
                    </div>


                    <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.5s">

                        <div class="post-thumbnail">
                            <img src="images/nasi.jpg" alt="">
                        </div>

                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>NASIGURANG</h5>
                            </a>
                            <p>Buy TEN Large Packs and Get One Large Pack FREE</p>

                            <div class="post-meta">
                                <p>Good Foods, Good Times</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="title">
                        <h5> Videos</h5>
                    </div>


                    <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">

                        <div class="post-thumbnail">
                            <img src="img/blog-img/b7.jpg" alt="">


                            <a href="https://www.youtube.com/watch?v=IhnqEwFSJRg" class="video-btn"><i class="fa fa-play"></i></a>
                        </div>

                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>OISHII TAKE AWAY</h5>
                            </a>
                            <p>An Everlasting Dining Experince We Reserve for You</p>

                            <div class="post-meta">
                                <p>Good Foods, Good Times</p>
                            </div>
                        </div>
                    </div>


                    <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.4s">

                        <div class="post-thumbnail">
                            <img src="img/blog-img/b8.jpg" alt="">



                            <a href="https://www.youtube.com/watch?v=IhnqEwFSJRg" class="video-btn"><i class="fa fa-play"></i></a>
                        </div>

                        <div class="post-content">
                            <a href="#" class="headline">
                                <h5>OISHII TAKE AWAY</h5>
                            </a>
                            <p>An Everlasting Dining Experince We Reserve for You</p>

                            <div class="post-meta">
                                <p>Good Foods, Good Times</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="load-more-btn mt-50 text-center">
                    <!--<a href="#" class="btn world-btn">Load More</a>-->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ***** Footer Area Start ***** -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="footer-single-widget">
                    <a href="#"><img src="img/core-img/logo.png" alt=""></a>
                    <div class="copywrite-text mt-30">

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="footer-single-widget">
                    <ul class="footer-menu d-flex justify-content-between">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="register.php">SignUp</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="footer-single-widget">
                    <h5>Subscribe</h5>
                    <form action="#" method="post">
                        <input type="email" name="email" id="email" placeholder="Enter your mail">
                        <button type="button"><i class="fa fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ***** Footer Area End ***** -->

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


<?php
if(isset($_POST['delete'])){
    $o_id=$_POST['o_id'];

    if($o_id!=="") {

        require_once('config.php');
        $sql = "DELETE FROM orders WHERE o_id='$o_id'";
        mysqli_query($con , $sql) or die(mysqli_error($con));

        if ($sql) {
            echo "<script type='text/javascript'>alert('Deleted!'); window.location.assign('/oishiiTA/menu.php')</script>";

        } else {
            echo "<script type='text/javascript'>alert('Failed!'); window.location.assign('/oishiiTA/menu.php')</script>";

        }
    }

}

?>

<?php


if(isset($_POST['pay'])){

    $c_name=$_POST["c_name"];


    require_once('config.php');
    $sql = " UPDATE orders SET o_make='1' WHERE o_make='0' AND c_name='$c_name'";

    mysqli_query($con , $sql) or die(mysqli_error($con));

    if($sql)
    {
        echo"<script type='text/javascript'>alert('Success!'); window.location.assign('/oishiiTA/menu.php')</script>";

    }
    else{
        echo"<script type='text/javascript'>alert('Failed!'); window.location.assign('/oishiiTA/menu.php')</script>";

    }


}

?>
