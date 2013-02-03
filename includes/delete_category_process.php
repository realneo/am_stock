<?php 
  //  session_start();
  include("db_conn.php");
?>
<table>
    <?php
        $c_id = 1;
        $count = 0;
        $q = mysql_query("SELECT * FROM `categories` WHERE `company_id` = '$c_id'");
        while($row = mysql_fetch_array($q)){
           $name = $row['name'];
           $count++;
           $cat_id = $row['id'];
           echo"
                <tr>
                    <td>{$count}</td>
                    <td>{$name}</td>
                    <td><a href='category_delete_process.php?id={$cat_id}'class='delete_cat_btn' id='{$cat_id}'>Delete</a></td>
                </tr>
        ";
        }
    ?>
 </table>