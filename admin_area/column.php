<?php
    include("../database/db.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>column</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

    <div class = "container">
      <h1 class = "jumbotron text-center">Enter the following details</h1>
        <form method="post">
            <div class="form-group">
              <label for="integer">Number of price slots for 2 wheelers</label>
              <input type="integer" class="form-control" id="newinteger" aria-describedby="integer" placeholder="Enter number" name="no_of_time_slots_2">
            </div>
            <br>
            <div class="form-group">
              <label for="integer">Number of price slots for 4 wheelers</label>
              <input type="integer" class="form-control" id="newinteger" aria-describedby="integer" placeholder="Enter number" name="no_of_time_slots_4">
            </div>
            <br>
            <div class="form-group">
              <label for="integer">Number of parking spaces for 2 wheelers</label>
              <input type="integer" class="form-control" id="newinteger" aria-describedby="integer" placeholder="Enter number" name="parking_slots_2">
            </div>
            <br>
            <div class="form-group">
              <label for="integer">Number of parking spaces for 4 wheelers</label>
              <input type="integer" class="form-control" id="newinteger" aria-describedby="integer" placeholder="Enter number" name="parking_slots_4">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $no_of_time_slots_2 = $_POST['no_of_time_slots_2'];
        $no_of_time_slots_4 = $_POST['no_of_time_slots_4'];
        $parking_slot_2 = $_POST['parking_slots_2'];
        $parking_slot_4 = $_POST['parking_slots_4'];
        $admin_username = $_SESSION["username"];

        

        $admin_flag = 1;



        $update_time_slots = "update admin set no_of_time_slots_2='$no_of_time_slots_2' where admin_username='$admin_username'";
        $run_time_slots = mysqli_query($conn, $update_time_slots);
        $update_time_slots_1 = "update admin set no_of_time_slots_4='$no_of_time_slots_4' where admin_username='$admin_username'";
        $run_time_slots_1 = mysqli_query($conn, $update_time_slots_1);
        $update_time_slots_2 = "update admin set parking_slots_2='$parking_slot_2' where admin_username='$admin_username'";
        $run_time_slots_2 = mysqli_query($conn, $update_time_slots_2);
        $update_time_slots_3 = "update admin set parking_slots_4='$parking_slot_4' where admin_username='$admin_username'";
        $run_time_slots_3 = mysqli_query($conn, $update_time_slots_3);
        $update_flag = "update admin set admin_flag='$admin_flag' where admin_username='$admin_username'";
        $run_flag = mysqli_query($conn, $update_flag);

        $shop_name = $_SESSION['username'];
        $shop_name = strtolower($shop_name);
        $shop_name = $shop_name."_2"; 
        $create_table = "CREATE TABLE $shop_name (
                            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            lot_no INT(11),
                            parked INT(11)
                            )";
        $run_table = mysqli_query($conn, $create_table);
        for($i=0; $i<$parking_slot_2; $i++)
        {
            $id = $i+1;
            $def = 0; 
            $insert = "insert into $shop_name(lot_no, parked) values('$id', '$def')";
            $run_insert = mysqli_query($conn, $insert);
        }
        
        $shop_name = $_SESSION['username'];
        $shop_name = strtolower($shop_name);
        $shop_name = $shop_name."_4"; 
        $create_table = "CREATE TABLE $shop_name (
                            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            lot_no INT(11),
                            parked INT(11)
                            )";
        $run_table = mysqli_query($conn, $create_table);
        for($i=0; $i<$parking_slot_4; $i++)
        {
            $id = $i+1;
            $def = 0; 
            $insert = "insert into $shop_name(lot_no, parked) values('$id', '$def')";
            $run_insert = mysqli_query($conn, $insert);
        }

        echo "<script>alert('Your details are updated')</script>";
        echo "<script>window.open('pricing_2.php', '_self')</script>";
    }

?>
