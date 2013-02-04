<?php 
	session_start(); 
	include("db_conn.php");
	$qty = $_POST['qty'];
	$id = $_POST['id'];
	$qq = mysql_query("SELECT * FROM `products` WHERE `id` = '$id'");
	while($row = mysql_fetch_array($qq)){
		$p_qty = $row['quantity'];
	}
	$sum = $p_qty - $qty;
	$q = mysql_query("UPDATE `products` SET `quantity` = '$sum' WHERE `id` = '$id'");

	if($q){
		echo "success";
	}else{
		echo "failed";
	}

?>