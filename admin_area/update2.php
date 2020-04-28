<!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Vehicle Exit</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   </head>

   <body>
     <div class = "container">
       <h1 class = "jumbotron text-center">VEHCILE EXIT</h1>

        <form method="POST">
          <div class="form-group">
            <label for="rfid">RFID of vehicle</label>
            <input type="text" class="form-control" id="rfid" name="rfid" placeholder="Enter RFID of vehicle" required>
          </div>
        
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
         
        </form>
    </div>
   </body>
 </html>


<?php

  //Create connection
  include("../database/db.php");

  session_start();
  if(isset($_POST['submit']))
  {
      $rfid = $_POST['rfid'];
      $admin_username = $_SESSION['username'];

      $shop_name = strtolower($admin_username);
      $shop_name = $shop_name."_tp";
      $query = "select * from $shop_name where tag_id='$rfid'";
      $run_query = mysqli_query($conn, $query);
      $array = mysqli_fetch_array($run_query);
      $type = $array['type'];
      $time = $array['entrytime'];
      $lot_no = $array['lotno'];
      $currtime = (int)(microtime(true)*1000);
      $diff = $currtime - $time;

      $shop_name = strtolower($admin_username);
      $shop_name = $shop_name."_price";
      $query = "select * from $shop_name where flag='$type'";
      $run_query = mysqli_query($conn, $query);
      $flag = 0;
      $cost = 0;
      while($array = mysqli_fetch_array($run_query))
      {
          $milli = $array['minutes']*3600000;
          $cost = $array['price'];
          if($milli >= $diff)
              $flag = 1;
          if($flag == 1)
            break;
      }

      //jis lot pe parked thi usko available krna hai
      $shop_name = strtolower($admin_username);
      if($type == 0)
        $shop_name = $shop_name."_2";
      else $shop_name = $shop_name."_4";
      $park = 0;
      $lot_update = "update $shop_name set parked='$park' where lot_no='$lot_no'";
      $run_update = mysqli_query($conn, $lot_update);

      //temp parking se details hatani hai
      $shop_name = strtolower($admin_username);
      $shop_name = $shop_name."_tp";
      $query = "delete from $shop_name where tag_id='$rfid'";
      $run_query = mysqli_query($conn, $query);

      //permanent parking me details daalni hai
      $shop_name = strtolower($admin_username);
      $shop_name = $shop_name."_pp";
      $query = "insert into $shop_name(tag_id, entrytime, exittime, cost, type, lotno) values($rfid, $time, $currtime, $cost, $type, $lot_no)";
      $run_query = mysqli_query($conn, $query);
  }
  
?>