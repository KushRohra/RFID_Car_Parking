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
		session_start();
		$_SESSION['username'] = $admin_username;
		$admin = mysqli_fetch_array($run_admin);
		$admin['admin_flag'];
		if($admin['admin_flag']==1)
			echo "<script>window.open('admin_dashboard.php', '_self')</script>";
		else {
?>

<!-- HTML for changing password for the first time -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Change Password</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
 </head>

 <body>
 <div class = "container">
 <h1 class = "jumbotron text-center">Change Password</h1>

  <form method="POST" action="change_pass.php">
  <div class="form-group">

    <label for="newpassword">New Password</label>
    <input type="password" class="form-control" id="newpassword" aria-describedby="emailHelp" placeholder="Enter new password" name = "pass">

  </div>
  <div class="form-group">
    <label for="retypepassword">Re-type Password</label>
    <input type="password" class="form-control" id="retypepassword" placeholder="Retype new password" name = "repass">
  </div>
  <br>
  <button type="submit" name="change_pass" class="btn btn-primary">Change Password</button>
</form>
</div>
 </body>
 </html>

<?php } }?>
