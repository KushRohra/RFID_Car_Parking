

<!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Vehicle Entry</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   </head>

   <body>
     <div class = "container">
       <h1 class = "jumbotron text-center">VEHCILE ENTRY</h1>

        <form method="POST">
          <div class="form-group">

            <label for="rfid">RFID of vehicle</label>
            <input type="text" class="form-control" id="rfid" name="rfid" placeholder="Enter RFID of vehicle" required>

          </div>
          <div class="form-group">
            <label for="typeofvehicle">Type of vehicle</label>
            <input type="text" class="form-control" id="vehicle" name="vehicle" placeholder="Enter type of vehicle" required>
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
		$admin_username = $_SESSION['username'];

		$id = $_POST['rfid'];
		$time = (int)(microtime(true)*1000);
		$type = $_POST['vehicle'];

		$shop_name = strtolower($admin_username);
		if($type == 0)
			$shop_name = $shop_name."_2";
		else
			$shop_name = $shop_name."_4";

		$query = "select * from $shop_name";
		$run_query = mysqli_query($conn, $query);
		$flag = 0; 
		while($array = mysqli_fetch_array($run_query))
		{
			if($array['parked']==0)
			{
				$index = $array['lot_no'];
				$flag = 1;
				$update_query = "update $shop_name set parked='$flag' where lot_no='$index'";
				$run_upadte_query = mysqli_query($conn, $update_query);
			}
			if($flag==1)
				break;
		}

		if($flag == 1)
		{
			$shop_name = strtolower($admin_username);
			$shop_name = $shop_name."_tp";
			$insert = "insert into $shop_name(tag_id, entrytime, type, lotno) values('$id', '$time', '$type', '$index')";
		    $run_insert = mysqli_query($conn, $insert);
		}	
		else
		{
			echo "<h3>No parking space available</h3>";
			echo "<br>";
		}
	}
	
?>
