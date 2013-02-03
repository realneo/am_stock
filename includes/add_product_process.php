<?php
    session_start();
    require_once("db_conn.php");
    //Getting Data from the form
    $name= mysql_real_escape_string(ucfirst($_POST['name']));
    $quantity = mysql_real_escape_string($_POST['quantity']);
    $unit = mysql_real_escape_string($_POST['unit']);
    $category_id = mysql_real_escape_string($_POST['product_category']);
    $c_id = mysql_real_escape_string($_POST['c_id']);
    $user_id = $_SESSION['id'];
    $q = mysql_query("INSERT INTO `products` (`id`, `name`, `quantity`, `price`, `category_id`, `unit`, `user_id`, `company_id`) 
                        VALUES ('NULL', '$name', '$quantity', '0', '$category_id', '$unit', '$user_id', '$c_id')");
    if($q){
            echo "success";
    }else{
            echo "failed";
    }
?>