<?php

require_once 'MySQL.php';

$sql = new MySQL;

$sql1 = "SELECT SUM(new_orders.product_qty) as qty
         FROM new_orders 
         INNER JOIN users ON new_orders.user_id = users.id  
         WHERE users.name IN (SELECT users.name 
                              FROM users 
                              WHERE users.name = \"admin\");";

$resultQuery = $sql->query($sql1);
if ($resultQuery === false) {
    throw new \Exception('Не вірний SQL запит!');
}

?>
<h1>Вивід даних</h1>
<table border="1">
    <thead>
    <th>qty</th>
    </thead>
    <tbody>
    <?php foreach ($resultQuery as $row){ ?>
        <tr>
            <td><?=$row["qty"]?></td>
        </tr>
    <?php } ?>
    </tbody>

</table>

