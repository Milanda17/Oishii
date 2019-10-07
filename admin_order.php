<?php
/**
 * Created by PhpStorm.
 * User: mila
 * Date: 10/10/2018
 * Time: 11:34 PM
 */


SESSION_Start();
$user="Admin";

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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav"
                            aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <!-- Navbar -->
                    <div class="collapse navbar-collapse" id="worldNav">
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a class="nav-link" href="admin_home.php">FOOD LIST<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin_add_food.php">ADD FOOD</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ORDERS<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php"><?php echo "$user"?>(LOGOUT)</a>
                            </li>

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


<!-- Hero Post Slide -->
</div>
<!-- ********** Hero Area End ********** -->

<div class="main-content-wrapper section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <!-- ============= Post Content Area Start ============= -->
            <div class="col-12 col-lg-12">
                <div class="post-content-area mb-50">


                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Address</th>
                            <th scope="col">Customer Telephone No</th>
                            <th scope="col">Price</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>


                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        require_once('config.php');
                        $sql = "SELECT * FROM customer RIGHT JOIN (SELECT c_name,SUM(o_price) as o_price,date,o_make FROM orders GROUP BY c_name) AS x ON customer.username=x.c_name where o_make='1'";

                        mysqli_query($con , $sql) or die(mysqli_error($con));

                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {


                            // output data of each row
                            while ($row = mysqli_fetch_array($result)) {


                                ?>

                                <tr class="table-active">
                                    <td><?php echo $row['c_name']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
                                    <td><?php echo $row['o_price']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td>
                                        <form method="post" action="admin_make_order.php">
                                            <input type="hidden" name="c_name" value="<?php echo $row['c_name']; ?>"/>

                                            <button type="submit" name="make" class="btn btn-primary btn-sm">Make</button>


                                        </form>

                                    </td>

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

<script>


</script>

</body>

</html>

<?php


if(isset($_POST['all_done'])){

    $c_name=$_POST["c_name"];

    require_once('config.php');
    $sql = "DELETE FROM orders WHERE o_make='1' AND c_name='$c_name'";

    mysqli_query($con , $sql) or die(mysqli_error($con));

    if($sql)
    {
        echo"<script type='text/javascript'>alert('Success!'); window.location.assign('/oishiiTA/admin_order.php')</script>";

    }
    else{
        echo"<script type='text/javascript'>alert('Failed!'); window.location.assign('/oishiiTA/admin_order.php')</script>";

    }


}

?>

<?php
if(isset($_POST['done'])){
    $o_id=$_POST['o_id'];

    if($o_id!=="") {

        require_once('config.php');
        $sql = "DELETE FROM orders WHERE o_make='1' AND o_id='$o_id'";
        mysqli_query($con , $sql) or die(mysqli_error($con));

        if ($sql) {
            echo "<script type='text/javascript'>alert('Deleted!'); window.location.assign('/oishiiTA/admin_order.php')</script>";

        } else {
            echo "<script type='text/javascript'>alert('Failed!'); window.location.assign('/oishiiTA/admin_order.php')</script>";

        }
    }

}

?>

