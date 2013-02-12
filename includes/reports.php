<?php  include("db_conn.php");?>
<table>
    <tr>
        <th></th>
        <th>From:
        <select id="from_date">
            <?php
                $q = mysql_query("SELECT DISTINCT `date` FROM `products` WHERE `company_id` = '1' ORDER BY `date` ASC");
                while($row = mysql_fetch_array($q)){
                    $from_date = $row['date'];
                    echo "<option value='{$from_date}'>{$from_date}</option>";
                }
            ?>
        </select>
        </th>
        <th>To:
        <select id="to_date">
            <?php
                $qq = mysql_query("SELECT DISTINCT `date` FROM `products` WHERE `company_id` = '1' ORDER BY `date` DESC");
                while($row = mysql_fetch_array($qq)){
                    $to_date = $row['date'];
                    echo "<option value='{$to_date}'>{$to_date}</option>";
                }
            ?>
        </select>        
        </th>
    </tr>
</table>
<table>
    </tr>
        <th>No</th>
        <th>Product</th>
        <th>Stock</th>
    </tr>   
    <?php
        echo $from_date.$to_date;
    ?>
</table>
