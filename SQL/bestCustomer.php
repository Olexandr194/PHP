<?php

require_once 'MySQL.php';

$sql = new MySQL;

$sql1 = "SELECT users.name as name, SUM(new_orders.product_qty) as qty
	     FROM new_orders
         INNER JOIN users ON new_orders.user_id = users.id
         GROUP BY users.name
            ORDER BY SUM(new_orders.product_qty) DESC
            LIMIT 1";

$resultQuery = $sql->query($sql1);
if ($resultQuery === false) {
    throw new \Exception('Не вірний SQL запит!');
}

?>
<h1>Вивід даних</h1>
<table border="1">
    <thead>
    <th>name</th><th>qty</th>
    </thead>
    <tbody>
    <?php foreach ($resultQuery as $row){ ?>
        <tr>
            <td><?=$row["name"]?></td><td><?=$row["qty"]?>
        </tr>
    <?php } ?>
    </tbody>

</table>

