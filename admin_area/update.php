<?php

	//Create connection
	include("../database/db.php");

	session_start();
	$admin_username = $_SESSION['username'];

	$id = $_GET['rfid'];
	$time = $_GET['time'];
	$type = $_GET['vehicle'];

	/*$rfid = 56;
	$time = 45565487;
	$type = 0; */

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
		$insert = "insert into $shop_name(tag_id, entrytime, type, lotno) values('$id', '$time', 'type', '$index')";
	    $run_insert = mysqli_query($conn, $insert);
	}

//    json_decode('date':$date);


?>
