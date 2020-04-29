<!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>2 Wheeler Parking</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   </head>

   <body>
     <div class = "container">
      <h1 class = "jumbotron text-center">2 Wheeler Parking Lot Status</h1>

      <div class="btn-group-vertical">
            <a href="../admin_dashboard.php"><button type="button" class="btn btn-primary">Go to Admin Dashboard</button></a>
            <br>
            <a href="parking.php"><button type="button" class="btn btn-primary">Go to Parking Page</button></a>
            <br>
      </div>

       <table class="table">
        <thead>
          <tr>
            <th scope="col">Lot No</th>
            <th scope="col">Vehicle Parked or Not</th>
          </tr>
        </thead>
        <?php
            header("Refresh: 100");
            session_start();
            include("../../database/db.php");

            $shop_name = $_SESSION['username'];
            $shop_name = $shop_name."_2";
            $query = "select * from $shop_name";
            $run_query = mysqli_query($conn, $query);
            while($array = mysqli_fetch_array($run_query))
            {
        ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $array['lot_no'] ?></th>
            <td><?php if($array['parked']==0) echo "Not Parked"; else echo "Parked"; ?></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
        
      <br>

      

    </div>
   </body>
 </html>
