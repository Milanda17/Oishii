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
                                        <a class="nav-link" href="#">FOOD LIST<span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin_add_food.php">ADD FOOD</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin_order.php">ORDERS<span class="sr-only">(current)</span></a>
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
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>


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
                                    <th scope="row"><?php   $target = "uploads/".$row['f_pic']; echo "<img src='$target' height=\"100px\" width=\"100px\"/>"; ?></th>
                                    <td><?php echo $row['f_name']; ?></td>
                                    <td><?php echo $row['f_des']; ?></td>
                                    <td><?php echo $row['f_price']; ?></td>
                                    <td>
                                         <form method="post" action="admin_update_food.php">
                                             <input type="hidden" name="id" value="<?php echo $row['f_id']; ?>"/>
                                             <button type="submit" name="update" class="btn btn-primary btn-sm">Edit</button>
                                             <button type="submit" name="delete" class="btn btn-danger btn-sm" >Delete</button>

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

