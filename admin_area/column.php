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
      <h1 class = "jumbotron text-center">XYZ</h1>
        <form method="post">
            <div class="form-group">
              <label for="integer">Integer</label>
              <input type="integer" class="form-control" id="newinteger" aria-describedby="integer" placeholder="Enter number" name="no_of_time_slots">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $no_of_time_slots = $_POST['no_of_time_slots'];
        $admin_username = $_SESSION['username'];
        $admin_flag = 1;

        $update_time_slots = "update admin set no_of_time_slots='$no_of_time_slots' where admin_username='$admin_username'";
        $run_time_slots = mysqli_query($conn, $update_time_slots);
        $update_flag = "update admin set admin_flag='$admin_flag' where admin_username='$admin_username'";
        $run_flag = mysqli_query($conn, $update_flag);
        echo "<script>alert('Your time slots are updated')</script>";
        echo "<script>window.open('pricing.php', '_self')</script>";
    }

?>
