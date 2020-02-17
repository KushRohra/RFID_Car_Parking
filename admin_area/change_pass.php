<?php

    include("../database/db.php");

 		if(isset($_POST['change_pass']))
		{
            session_start();
        	$new_pass = $_POST['pass'];
        	$new_pass_again = $_POST['repass'];
        	/*echo $new_pass;
        	echo "<br>";
        	echo $new_pass_again;
        	echo "<br>";
        	echo $_SESSION['username'];*/
            if($new_pass != $new_pass_again)
            {
                echo "<script>alert('Passwords do not match')</script>";
                echo "<script>window.open('check_pass.php', '_self')</script>";
                exit();
            }
            else
            {
                $admin_username = $_SESSION["username"];
                $update_pass = "update admin set admin_password='$new_pass' where admin_username='$admin_username'";
                $run_update = mysqli_query($conn, $update_pass);
                echo "<script>alert('Your password was changed successfully')</script>";
                echo "<script>window.open('column.php', '_self')</script>";
            }
		}
 ?>
