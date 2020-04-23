<?php

    include("../database/db.php");
    session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Hello</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    </head>
    <body>
        <?php

            $admin_username = $_SESSION['username'];
            $query = "select * from admin where admin_username='$admin_username'";
            $run_query = mysqli_query($conn, $query);
            $row_query = mysqli_fetch_array($run_query);

            $shop_name = $admin_username;
            $shop_name = strtolower($shop_name);
            $shop_name = $shop_name."_price"; 
            $create_table = "CREATE TABLE $shop_name (
                            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            minutes INT(11),
                            price INT(11),
                            flag INT(11)
                            )";
            $run_table = mysqli_query($conn, $create_table);

            $no_of_2 = $row_query['no_of_time_slots_2'];

        ?>

        <form method="post">
            <?php

                echo " <h1 class = 'jumbotron text-center'>Enter the pricing details for 2 wheelers</h1><br>";
                for($i=0; $i<$no_of_2; $i++)
                {
                    $minutes = "minutes_".$i."_0";
                    $price = "price_".$i."_0";
                    echo "
                              Time: <input required type='integer' class = 'form-control' name='$minutes' placeholder='Enter the time in hours'>
                              <br>
                              Price: <input required type='integer' class = 'form-control' name='$price' placeholder='Enter the price in Rupees'>
                              <br>
                              <br>
                         ";
                }
            ?>
            <input type="submit" name="submit" value="Submit">
        </form>

        <?php

            if(isset($_POST['submit']))
            {
                for($i=0; $i<$no_of_2; $i++)
                {
                    $minutes = "minutes_".$i."_0";
                    $price = "price_".$i."_0";
                    $flag = 0 ;
                    $min = $_POST[$minutes];
                    $pri = $_POST[$price];
                    $insert = "insert into $shop_name(minutes, price, flag) values('$min', '$pri', '$flag')";
                    $run_insert = mysqli_query($conn, $insert);
                }
                echo "<script>window.open('pricing_4.php', '_self')</script>";
            }

            ?>

    </body>
</html>