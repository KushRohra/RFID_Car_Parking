<?php
	include("../database/db.php");

  $admin_username = $_POST['username'];
  $admin_password = $_POST['password'];

  $sel_admin = "select * from admin where admin_username='$admin_username' AND admin_password='$admin_password'";
  $run_admin = mysqli_query($conn, $sel_admin);
  $check_admin = mysqli_num_rows($run_admin);

  if($check_admin == 0)
  {
    echo "<script>alert('Password or email is incorrect, pls try again!')</script>";
    echo "<script>window.open('index.php', '_self')</script>";
    exit();
  }
  else
  {
		$admin = mysqli_fetch_array($run_admin);
		$admin['admin_flag'];
		if($admin['admin_flag']==1)
			echo "<script>window.open('admin_dashboard.php', '_self')</script>";
		else {
?>

<!-- HTML for changing password for the first time -->
  <h2>Change password</h2>


<?php } }?>
