<?php
 SESSION_Start();
 unset($_SESSION['una']);
 ?>
<?php
			if(isset($_POST['log'])){
				$una=$_POST["una"];
				$pass=$_POST["pass"];
				
				if($una==""||$pass==""){
					echo"<script>alert('Username and Password cannot be empty');</script>";
					return;
				}
				else{
					
					$con=mysqli_connect('localhost','root','','oishii') or die ("Connection Failure");
					$sql="SELECT c_id FROM customer WHERE username='$una' AND password='$pass'";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$count = mysqli_num_rows($result);
					if($una=='admin' && $pass=='admin'){
                        header('Location:admin_home.php');
                    }else if($count == 1) {
						$_SESSION['user'] = $una;
						$id=$row["CustomerID"];
						$_SESSION['cid']=$id;
						 header('Location:index.php');
					}
					else {
						echo "<script>alert('Invalid Username or Password');</script>";
					 }
					
				}
			}
		?>