<?php
    include("../database/db.php");
    session_start();

    $admin_username = $_SESSION['username'];
    $shop_name = $_SESSION['username'];
    $shop_name = strtolower($shop_name);
    $shop_name = $shop_name."_tp";
    $create_table = "CREATE TABLE $shop_name (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        tag_id INT(11),
                        entrytime INT(20),
                        type INT(11),
                        lotno INT(11)
                        )";
    $run_table = mysqli_query($conn, $create_table);

    $shop_name = $_SESSION['username'];
    $shop_name = strtolower($shop_name);
    $shop_name = $shop_name."_pp";
    $create_table = "CREATE TABLE $shop_name (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        tag_id INT(11),
                        entrytime INT(20),
                        exittime INT(20),
                        cost INT(11),
                        type INT(11),
                        lotno INT(11)
                        )";
    $run_table = mysqli_query($conn, $create_table);

    echo "<script>window.open('pricing_2.php', '_self')</script>";

?>