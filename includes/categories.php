<?php 
  //  session_start();
  include("db_conn.php");
?>
<table>
    <tr>
        <th> No. </th>
        <th> Category Name </th>
    </tr>
    <?php
        $c_id = 1;
        $count = 0;
        $q = mysql_query("SELECT * FROM `categories` WHERE `company_id` = '$c_id'");
        while($row = mysql_fetch_array($q)){
           $name = $row['name'];
           $count++;
           echo"
                <tr>
                    <td>{$count}</td>
                    <td>{$name}</td>
                </tr>
        ";
        }
    ?>
 </table>