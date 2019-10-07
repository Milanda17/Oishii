<?php
SESSION_Start();
unset($_SESSION['una']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <meta charset="UTF-8">
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
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/0002.jpg);">
					<span class="login100-form-title-1">
						Shopping Cart
					</span>
            </div>

            <form class="login100-form validate-form">
                <?php
                if(isset($_POST['cart'])) {
                    $c_name=$_POST['c_name'];
                require_once('config.php');
                    $sql1="SELECT * FROM customer WHERE c_name='$c_name'";
                mysqli_query($con, $sql1) or die(mysqli_error($con));

                    $details = $con->query($sql1);

                    $row = mysqli_fetch_array($details); {

                ?>

                    <div class="grid">
                        <div class="row">
                            <h2>Name :    <small class="text-muted"><?php echo $row['c_name']; ?></small></h2><br/>
                        </div>
                        <div class="row">
                            <h2>Address :    <small class="text-muted"><?php echo $row['address']; ?></small></h2>
                        </div>
                        <div class="row">
                            <h2>Contact :    <small class="text-muted"><?php echo $row['contact']; ?></small></h2>
                        </div>


                <?php } ?>

                        <div class="row">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">Food name</th>
                                            <th scope="col">NO Of Portion</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                                <tbody>

                                                <?php




                                            $sql = "SELECT f_name,o_price,size,o_id FROM orders INNER JOIN food ON orders.f_id=food.f_id WHERE c_name='$c_name' AND o_make='0'";
                                            $sql2="SELECT SUM(o_price)AS t_price,c_name FROM orders WHERE c_name='$c_name' AND o_make='0' GROUP By c_name";

                                            mysqli_query($con , $sql) or die(mysqli_error($con));
                                            mysqli_query($con , $sql2) or die(mysqli_error($con));

                                            $result = $con->query($sql);
                                            $total = $con->query($sql2);
                                            $t_p = mysqli_fetch_array($total);


                                            if ($result->num_rows > 0) {


                                            // output data of each row
                                            while ($row = mysqli_fetch_array($result)) {

                                            ?>
                                                <tr class="table-success">
                                                    <td><?php echo $row['f_name']; ?></td>
                                                    <td><?php echo $row['size']; ?></td>
                                                    <td><?php echo $row['o_price']; ?></td>

                                                      <td>
                                                          <form method="post" action="menu.php">
                                                                <input type="hidden" name="o_id" value="<?php echo $row['o_id']; ?>"/>
                                                                <button type="submit" name="delete" class="btn btn-danger btn-sm" >Delete</button>
                                                            </form>
                                                      </td>
                                                </tr>

                                            <?php
                                            }  }?>

                                                <tr>
                                                    <td colspan="2">Total Price</td>
                                                    <td><?php echo $t_p['t_price']; ?></td>
                                                    <td></td>
                                                </tr>


                                        </tbody>
                                    </table>
                        </div>

                        <div class="row">
                            <img src="img/core-img/visa.png" width="200px" height="50px">
                        </div>

                        <div class="row">
                            <form action="menu.php" method="post">
                                <input type="hidden" name="c_name" value="<?php echo $t_p['c_name']; ?>">
                                <button type="submit" class="btn btn-success btn-lg" name="pay">PAY</button>
                            </form>

                        </div>
                        <?php

                        }  ?>
                    </div>

            </form>





        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>



