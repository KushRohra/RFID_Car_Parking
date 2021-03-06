<?php

  header("Refresh: 100");
  session_start();
  include("../../database/db.php");

  $shop_name = $_SESSION['username'];
  $shop_name = $shop_name."_2";
  $query = "select * from $shop_name";
  $two = 0;
  $two_parked = 0;
  $run_query = mysqli_query($conn, $query);
  while($array = mysqli_fetch_array($run_query))
  {
      $two = $two + 1;
      if($array['parked'] == 0)
          $two_parked = $two_parked + 1;
  }

  $shop_name = $_SESSION['username'];
  $shop_name = $shop_name."_4";
  $query = "select * from $shop_name";
  $four = 0;
  $four_parked = 0;
  $run_query = mysqli_query($conn, $query);
  while($array = mysqli_fetch_array($run_query))
  {
      $four = $four + 1;
      if($array['parked'] == 0)
          $four_parked = $four_parked + 1;
  }

?>


<!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Parking Lot Status</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   </head>

   <body>
     <div class = "container">
       <h1 class = "jumbotron text-center">Current Parking Slot</h1>

       <table class="table">
        <thead>
          <tr>
            <th scope="col">S.NO</th>
            <th scope="col">Type of Vehicle</th>
            <th scope="col">Total Parking Space Available</th>
            <th scope="col">Current Parking Space Available</th>
            <th>Detailed Info</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>2 Wheeler</td>
            <td><?php echo $two; ?></td>
            <td><?php echo $two_parked; ?></td>
            <td><a href="2parking.php"><button class="btn btn-primary">See details</button></a></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>4 Wheeler</td>
            <td><?php echo $four; ?></td>
            <td><?php echo $four_parked; ?></td>
            <td><a href="4parking.php"><button class="btn btn-primary">See details</button></a></td>
          </tr>
        </tbody>
      </table>
        
      <br>

      <div class="btn-group-vertical">
            <a href="../admin_dashboard.php"><button type="button" class="btn btn-primary">Go to Admin Dashboard</button></a>
            <br>
      </div>

    </div>
   </body>
 </html>
