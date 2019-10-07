
<?php
			if(isset($_POST['order'])){

				$f_id=$_POST["f_id"];
				$c_name=$_POST["c_name"];
				$size=$_POST["nop"];
				$date=  date('Y-m-d H:i:s');
				$f_price=$_POST["f_price"];
				$o_price=$size*$f_price;


		if($f_id!=="")
		        {
		            if($c_name!=="") {

                        require_once('config.php');
                        $sql = "INSERT INTO orders (f_id,c_name,size,o_price,date) VALUES('$f_id','$c_name','$size','$o_price','$date')";

                        mysqli_query($con, $sql) or die(mysqli_error($con));

                        if ($sql) {
                            echo "<script type='text/javascript'>window.location.assign('/oishiiTA/menu.php');alert('Added to Cart ');</script>";
                        } else {
                            echo "<script type='text/javascript'>alert('Failed');window.location.assign('/oishiiTA/menu.php')</script>";
                        }

                    }else{

                        echo "<script type='text/javascript'>alert('Please sign in'); window.location.assign('/oishiiTA/menu.php')</script>";
                    }

				}
			}






