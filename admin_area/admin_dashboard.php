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
      <h1 class = "jumbotron text-center">Welcome to Admin Dashboard</h1>
      <div class="list-group">
        <a href="function/change_pass2.php" class="list-group-item" class = "text-dark">Change password</a>
        <a href="function/parking_lot.php" class="list-group-item" class = "text-dark">See status of parking lot</a>
        <a href="function/details.php" class="list-group-item" class = "text-dark">See all details</a>
        <a href="function/cost.php" class="list-group-item" class = "text-dark">Current cost details</a>
        <a href="function/parking.php" class="list-group-item" class = "text-dark">Current Parking details</a>
      </div>
    	<br>
      <div class="text-center">
        <a href="update.php"><button class="btn btn-lg btn-info">Vehicle Entry</button></a>
        <a href="update2.php"><button class="btn btn-lg btn-info">Vehicle Exit</button></a>
      </div>
      <br>
      <div class="text-center">
          <a href="logout.php"><button type="button" class="btn btn-outline-danger btn-lg text-center">LogOut</button></a>
      </div>

  </div>
    
</body>
