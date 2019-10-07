<?php
 SESSION_Start();
 unset($_SESSION['una']);
 SESSION_destroy();
 header('Location:index.php');
 ?>