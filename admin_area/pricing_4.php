<?php
    
    include("../database/db.php");
    session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Hello</title>
    </head>
    <body>
        <?php

            $admin_username = $_SESSION['username'];
            $query = "select * from admin where admin_username='$admin_username'";
            $run_query = mysqli_query($conn, $query);
            $row_query = mysqli_fetch_array($run_query);

            $shop_name = $row_query['shop_name'];
            $shop_name = strtolower($shop_name);
            $shop_name = $shop_name."_price"; 
            $no_of_4 = $row_query['no_of_time_slots_4'];

        ?>
                    
        <form method="post">
            <?php
                echo "<h3>Enter the pricing details for 4 wheelers</h3><br>";
                for($i=0; $i<$no_of_4; $i++)
                {
                    $minutes = "minutes_".$i."_1";
                    $price = "price_".$i."_1";
                    echo "
                              Time: <input type='integer' name='$minutes' placeholder='Enter the time in minutes'>
                              <br>
                              Price: <input type='integer' name='$price' placeholder='Enter the price in Rupees'>
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
                echo "4 wheelers";
                echo "<br>";
                for($i=0; $i<$no_of_4; $i++)
                {
                    $minutes = "minutes_".$i."_1";
                    $price = "minutes_".$i."_1";
                    $flag = 1;
                    $min = $_POST[$minutes];
                    $pri = $_POST[$price];

                    $insert = "insert into $shop_name(minutes, price, flag) values('$min', '$pri', '$flag')";
                    $run_insert = mysqli_query($conn, $insert);
                }

                echo "<script>window.open('admin_dashboard.php', '_self')</script>";
            }

        ?>

    </body>
</html>