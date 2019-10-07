<?php
/**
 * Created by PhpStorm.
 * User: mila
 * Date: 10/10/2018
 * Time: 11:34 PM
 */


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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Title  -->
        <title>Oishii</title>

        <!-- Favicon  -->
        <link rel="icon" href="img/core-img/favicon.ico">

        <!-- Style CSS -->
        <link rel="stylesheet" href="style.css">


        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="style.css">

    </head>




    <body>
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
                        <h1>ADMIN</h1>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <!-- Navbar -->
                        <div class="collapse navbar-collapse" id="worldNav">
                            <ul class="navbar-nav ml-auto">

                                <li class="nav-item">
                                    <a class="nav-link" href="admin_home.php">FOOD LIST</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">ADD FOOD<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">ORDERS<span class="sr-only">(current)</span></a>
                                </li>

                            </ul>
                            <!-- Search Form  -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="hero-area">
        <!-- ***** Header Area End ***** -->
        <div class="hero-slides owl-carousel">
            <!-- Single Slide -->
            <div class="single-hero-slide bg-img background-overlay" style="background-image: url('https://ssmscdn.yp.ca/image/resize/e26cda85-b16c-4879-93dd-f1092294f4d4_pl-landscape.jpg');"></div>

        </div>
        <!-- ********** Hero Area Start ********** -->
    </div>
    <!-- ********** Hero Area End ********** -->



    <div class="main-content-wrapper section-padding-100">
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form-title" style="background-image: url(images/0002.jpg);">
					<span class="login100-form-title-1">
						UPDATE FOOD
					</span>
                    </div>

                    <?php
                    if(isset($_POST['update'])) {

                    $id=$_POST['id'];

                    require_once('config.php');
                    $sql = " SELECT * FROM food where f_id='$id'";

                    mysqli_query($con, $sql) or die(mysqli_error($con));

                    $result = $con->query($sql);

                    $row = mysqli_fetch_array($result); {

                    ?>

                    <form class="login100-form validate-form" action="<?php $PHP_SELF?>" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $row['f_id']; ?>"/>
                        <div class="wrap-input100 validate-input m-b-26" >
                            <span class="label-input100">Name</span>
                            <input class="input100" type="text" name="name" placeholder="Enter Name" value="<?php echo $row['f_name']; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-26" >
                            <span class="label-input100">Description</span>
                            <input class="input100" type="text" name="des" placeholder="Enter Description" value="<?php echo $row['f_des']; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-26" >
                            <span class="label-input100">Price</span>
                            <input class="input100" type="text" name="price" placeholder="Enter Price" value="<?php echo $row['f_price']; ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-26" >
                            <span class="label-input100">Picture</span>
                            <input class="input100" type="file" name="pic" placeholder="Picture" value="<?php echo $row['f_pic']; ?>">

                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="submit">
                                UPDATE
                            </button>
                        </div>
                    </form>

                            <?php
                        }

                    }  ?>
                </div>
            </div>
        </div>
    </div>




    <!---->
    <!-- ***** Footer Area Start ***** -->

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


if(isset($_POST['submit'])){

    $id=$_POST["id"];
    $name=$_POST["name"];
    $des=$_POST["des"];
    $price=$_POST["price"];

    $errors= array();
    $file_name = $_FILES['pic']['name'];
    $file_size =$_FILES['pic']['size'];
    $file_tmp =$_FILES['pic']['tmp_name'];
    $file_type=$_FILES['pic']['type'];
    $temp=explode('.',$_FILES['pic']['name']);
    $file_ext=end($temp);

    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"uploads/".$file_name);
        // header("refresh:1 ; url= ../sites/vd.php ");
    }else{
        print_r($errors);
    }

     $imageFileType =strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($name!=="" && $des!==""&& $price!==""&& $id!=="")
    {

        require_once('config.php');
        $sql = " UPDATE food SET f_name='$name',f_des='$des',f_price='$price',f_pic='$file_name' WHERE f_id='$id'";

        mysqli_query($con , $sql) or die(mysqli_error($con));

        if($sql)
        {
            echo"<script type='text/javascript'>alert('Updated!'); window.location.assign('/oishiiTA/admin_home.php')</script>";

        }
        else{
            echo"<script type='text/javascript'>alert('Failed!'); window.location.assign('/oishiiTA/admin_home.php')</script>";

        }

    }
}

?>

<?php
    if(isset($_POST['delete'])){
        $id=$_POST['id'];

        if($id!=="") {

            require_once('config.php');
            $sql = "DELETE FROM food WHERE f_id='$id'";
            mysqli_query($con , $sql) or die(mysqli_error($con));

            if ($sql) {
                echo "<script type='text/javascript'>alert('Deleted!'); window.location.assign('/oishiiTA/admin_home.php')</script>";

            } else {
                echo "<script type='text/javascript'>alert('Failed!'); window.location.assign('/oishiiTA/admin_home.php')</script>";

            }
        }

    }


?>

