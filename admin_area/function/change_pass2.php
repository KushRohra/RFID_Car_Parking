<?php

    include("../../database/db.php");
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Fontawesome CDN-->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
 <div class = "container">  
    <form method="POST">
        <div class="form-group">
          <label for="oldpassword">Old Password</label>
          <input type="password" class="form-control" id="oldpassword" aria-describedby="emailHelp" placeholder="Enter old password" name = "oldpass">
        </div>
        <div class="form-group">
          <label for="newpassword">New Password</label>
          <input type="password" class="form-control" id="newpassword" placeholder=" New password" name = "newpass">
        </div>
<<<<<<< HEAD
=======
        
>>>>>>> dc4b608d76b0c17f2fcd668428a3a06a2e884443
        <div class="form-group">
            <label for="newpasswordagain">New Password Again</label>
            <input type="password" class="form-control" id="newretypepassword" placeholder="New password again" name = "newpasswordagain">
        </div>
        <div>
          <input type="submit" name="change_pass" class="btn btn-success">
        </div>
      </div>
      </form>
  </div>
</body>
</html>

<?php
  $admin_username = $_SESSION['username'];
  if(isset($_POST['change_pass']))
  {
      $oldpassword = $_POST['oldpass'];
      $newpassword = $_POST['newpass'];
      $newpasswordagain = $_POST['newpasswordagain'];

      
      $query = "select * from admin where admin_username='$admin_username'";
      $run_query = mysqli_query($conn, $query);
      $row_query = mysqli_fetch_array($run_query); 

      $oldpass = $row_query['admin_password'];
      if($oldpass!=$oldpassword)
      {
          echo "<script>alert('Password does not match with the one in database!')</script>";
          echo "<script>window.open('change_pass2.php', '_self')</script>";    
      }
      else if($newpasswordagain!=$newpassword)
      {
          echo "<script>alert('New Passwords do not match')</script>";
          echo "<script>window.open('change_pass2.php', '_self')</script>";
      }
      else
      {
          $update_pass = "update admin set admin_password='$newpassword' where admin_username='$admin_username'";
          $run_update = mysqli_query($conn, $update_pass);
          echo "<script>alert('Your password was changed successfully')</script>";
          echo "<script>window.open('../admin_dashboard.php', '_self')</script>";
      }
  }

?>

