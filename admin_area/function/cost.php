<?php
  header("Refresh: 100");
  session_start();
  include("../../database/db.php");

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<style>
.btn{
    height: 35px;
  width: 50%;
}

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
</head>

<body>
    <div class="container">
        <br>
       <div class="d-flex flex-column bd-highlight mb-6">
        <div class="btn-group-vertical">
            <a href="../admin_dashboard.php"><button type="button" class="btn btn-primary">Go to Admin Dashboard</button></a>
            <br>
            <br>
            <a href="cost.php?2_cost"><button type="button" class="btn btn-info btn-sm">2 Wheeler</button></a>
            <br>
            <a href="cost.php?4_cost"><button type="button" class="btn btn-info btn-sm">4 Wheeler</button></a> 
          </div>
      </div>
      
      <div class="d-flex flex-column-reverse bd-highlight">
          <?php

            if(isset($_GET['2_cost']))
            {
              include("2cost.php");
            }
            if(isset($_GET['4_cost']))
            {
              include("4cost.php");
            }

          ?>
      </div>
    </div>
     

  
    
</body>
