<?php 
  session_start();
  include("db_conn.php");
  $cat_id = $_POST['cat_id'];  
  $q = mysql_query("DELETE FROM `categories` WHERE `id` = '$cat_id'");
  if($q){
      echo 'success';
  }else{
      echo 'failed';
  }
  ?>