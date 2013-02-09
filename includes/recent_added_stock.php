<?php 
  //  session_start();
  include("db_conn.php");
?>
<table>
    <tr>
        <th> No </th>
        <th width="110px"> Date </th>
        <th> Product </th>
        <th width="50px"> Quantity </th>
        <th> Unit </th>
        <th width="10px"> Delete </th>
    </tr>
    <?php
        $c_id = $_GET['c_id'];
        $count = 0;
        $q = mysql_query("SELECT * FROM `products` WHERE `company_id` = '$c_id'");
        while($row = mysql_fetch_array($q)){
           $name = $row['name'];
           $date = $row['name'];
           $quantity = $row['quantity'];
           $unit = $row['unit'];
           //$category_id = $row['category_id'];
           $count++;
           $prod_id = $row['id'];
           
           $date = date("d M Y");
           echo"
            <tr>
                <td>{$count}</td>
                <td>{$date}</td>
                <td>{$name}</td>
                <td align='right'>{$quantity}</td>
                <td>{$unit}</td>
                <td><a class='delete_prod_btn' id='{$prod_id}'><img src='images/icons/delete.png' alt='Delete' /></a></td>
            </tr>";
          
        }
    ?>
 </table>