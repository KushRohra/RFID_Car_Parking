<?php
  
  session_start();
  include("../../database/db.php");

?>

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
    <div style="margin-top: 20px; margin-bottom: -15px;" class="container d-flex flex-column bd-highlight mb-6">
        <div class="btn-group-vertical">
            <a href="../admin_dashboard.php"><button type="button" class="btn btn-primary">Go to Admin Dashboard</button></a>
        </div>        
    </div>
    <div class="container">
        <table class="table">
            <br>
            <thead>
                <br>
              <tr>
                <th scope="col">RFID of Vehicle</th>
                <th scope="col">Parking Time</th>
                <th scope="col">Exiting Time</th>
                <th scope="col">Cost</th>
                <th scope="col">Lot No.</th>
                <th scope="col">2 or 4 wheeler</th>
              </tr>
            </thead>
            <tbody> 
                <?php 
                    $admin_username = $_SESSION['username'];
                    $shop_name = strtolower($admin_username);
                    $shop_name = $shop_name."_pp";

                    $flag = 0;    
                    $query = "select * from $shop_name";
                    $run_query = mysqli_query($conn, $query);
                    while ($row_query = mysqli_fetch_array($run_query))
                    {
                        $tag_id = $row_query['tag_id'];
                        $entrytime = $row_query['entrytime'];
                        $exittime = $row_query['exittime'];
                        $parking_no = $row_query['lotno'];
                        $cost = $row_query['cost'];
                        if($row_query['type']==0)
                          $type = "2 Wheeler"; 
                        else $type = "4 Wheeler";
                ?>
                  <tr>
                    <td><?php echo $tag_id ?></td>
                    <td><?php date_default_timezone_set("Asia/Calcutta"); echo date('d-m-Y H:i:s', $entrytime/1000); ?></td>
                    <td><?php date_default_timezone_set("Asia/Calcutta"); echo date('d-m-Y H:i:s', $exittime/1000); ?></td>
                    <td><?php echo $cost ?></td>
                    <td><?php echo $parking_no ?></td>   
                    <td><?php echo $type ?></td>
                  </tr>
                <?php } ?>
            </tbody>
          </table>
    </div>    
</body>
