<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
 <div class = "container">  
    <form method="POST" action="change_pass2.php">
        <div class="form-group">

          <label for="oldpassword">Old Password</label>
          <input type="password" class="form-control" id="oldpassword" aria-describedby="emailHelp" placeholder="Enter old password" name = "pass">

        </div>
        <div class="form-group">
          <label for="newpassword">New Password</label>
          <input type="password" class="form-control" id="newpassword" placeholder=" New password" name = "repass">
        </div>
        <br>
        <div class="form-group">
            <label for="newpasswordagain">New Password Again</label>
            <input type="password" class="form-control" id="newretypepassword" placeholder="New password again" name = "repass">
      </div>
        
      </form>
  </div>
    
</body>
