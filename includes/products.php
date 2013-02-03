<?php 
  //  session_start();
  include("db_conn.php");
?>
<table>
    <?php
        $c_id = 1;
        $count = 0;
        $q = mysql_query("SELECT * FROM `products` WHERE `company_id` = '$c_id'");
        while($row = mysql_fetch_array($q)){
           $name = $row['name'];
           $count++;
           $prod_id = $row['id'];
           echo"
                <tr>
                    <td>{$count}</td>
                    <td>{$name}</td>
                    <td><a class='delete_prod_btn' id='{$prod_id}'>Delete</a></td>
                </tr>
        ";
        }
    ?>
 </table>